<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/18
 * Time: 19:51
 */

/*得到在Admin词典中某个单词的个数，用来判断是否是多义词以及是否已经存在于词典*/
function getCountInAdminDic($oriWord){
    $sql="SELECT count(*) FROM admin.dictionary where admin.dictionary.originword= '".$oriWord."'";
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count;
}
/*得到在自身数据库中的count*/
function getCountInSelfDic($oriword){
    $nowdb=$GLOBALS['db']->getNowDB();
    $sql="SELECT count(*) FROM ".$nowdb.".sdictionary where oriword='".$oriword."'";
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count;
}
/*产生一个用于存储在总词典中的ID*/
function GenAdminDicID(){
    $sql="SELECT count(*) FROM admin.dictionary";
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count+1;
}
function QueryInSelfDic($oriword){
    $count=getCountInSelfDic($oriword);
   //echo $oriword;
    if($count==0)
        return null;
    else{
        $sql="SELECT * FROM sdictionary where oriword='".$oriword."'";
        //echo $sql;
        //echo "\n";
        $results=$GLOBALS['db']->getAll($sql);
        return $results;
    }
}
function QueryInAdminDic($oriword){
    $count=getCountInAdminDic($oriword);
    if($count==0)
        return null;
    else{
        $sql="SELECT * FROM admin.dictionary where originword='".$oriword."'";
       // echo $sql;
        //echo "\n";
        $results=$GLOBALS['db']->getAll($sql);
        return $results;
    }
}
/*调用翻译API*/
/**
 * 执行文本翻译
 * @param string $text 要翻译的文本
 * @param string $from 原语言语种 默认:英文
 * @param string $to 目标语种 默认:中文
 * @return boolean string 翻译失败:false 翻译成功:翻译结果
 */
function translateText($text, $from, $to) {

    $url = "http://fanyi.baidu.com/v2transapi";
    $data = array (
        'from' => $from,
        'to' => $to,
        'query' => $text
    );
    $data = http_build_query ( $data );
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_REFERER, "http://fanyi.baidu.com" );
    curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0' );
    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
    $result = curl_exec ( $ch );
    curl_close ( $ch );

    $result = json_decode ( $result, true );

    if (!isset($result ['trans_result'] ['data'] ['0'] ['dst'])){
        return false;
    }
    return $result ['trans_result'] ['data'] ['0'] ['dst'];
}
/*调用翻译函数exec，输出中英德文*/
function getTranslateOnline($text){
    $arr=array('CHN'=>translateText($text,'auto','zh'),'Eng'=>translateText($text,'auto','en'),'De'=>translateText($text,'auto','de'));
    return $arr;
}


function GetTransLation($oriword){
    ///step1:query in the self dictionary
    $Translation=QueryInSelfDic($oriword);
    if($Translation==null){
        $Translation=QueryInAdminDic($oriword);
        //step2:query in the admin dictionary
        if($Translation==null){
            ///step 3:query online
//            $Translation=getTranslateOnline($oriword); ////may be time_out
            return $Translation;
        }
        else
            return $Translation;
    }
    else
        return $Translation;
}

/*TODO:realize save translation functions*/

function SaveTranslationToAdminDic($oriword,$translationArray,$id=null){
    if($id==null){
        //id==null in save admin dic means insert a new translation,default null
        //step1:generate one id
        $id=GenAdminDicID();
        $deword=$translationArray["De"];
        $chnword=$translationArray["CHN"];
        $engword=$translationArray["Eng"];
        $sql="INSERT INTO `admin`.`dictionary` (`wordid`,`originword`,`De`,`Eng`,`CHN`) VALUES (".$id.",'".$oriword."','".$deword."','".$engword."','".$chnword."')";
        //step2:insert into admin.dictionary table
        $result=$GLOBALS['db']->query($sql);
        return $result;
    }
    else{/////按初始设计来，大词典中的单词只允许添加单词，不允许修改。所以else应该永远不会调用
        //id!=null means change the meaning of one word
        echo "change the admin dic oriword= ".$oriword."and id=".$id;
        $sql="SELECT count(*) FROM admin.dictionary where wordid=".$id;
        $results=$GLOBALS['db']->query($sql);
        $countarray=mysql_fetch_array($results);
        $count=$countarray[0];
        ///if count==0,means there is no such id
        if($count==0)
            return false;
        else{
            $deword=$translationArray["De"];
            $chnword=$translationArray["CHN"];
            $engword=$translationArray["Eng"];
            $sql="UPDATE `admin`.`dictionary` SET `originword`= '".$oriword."',`De`= '".$deword."',`Eng`= '".$engword."',`CHN`= '".$chnword."'where `wordid`=".$id;
            $result=$GLOBALS['db']->query($sql);
            return $result;
        }
    }
}
function SaveTranslationToSelfDic($oriword,$translationArray,$id,$idflag){
    //step1:query in selfdic to see if the id and the flag is conflict
    $sql="SELECT count(*) FROM sdictionary where wordid=".$id." and `flag`= ".$idflag;
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    $deword=$translationArray["De"];
    $chnword=$translationArray["CHN"];
    $engword=$translationArray["Eng"];
    if($count!=0){///如果已经有了 ，说明是修改。
        $sql="UPDATE `sdictionary` SET `oriword`= '".$oriword."',`De`= '".$deword."',`Eng`= '".$engword."',`CHN`= '".$chnword."' where `wordid`= '".$id."' and `flag`= ".$idflag;
        $result=$GLOBALS['db']->query($sql);
        return $result;
        //echo $sql;
    }

    else{
        //step2:insert

        $sql="INSERT INTO `sdictionary`(`wordid`,`oriword`,`De`,`Eng`,`CHN`,`flag`)VALUES(".$id.",'".$oriword."','".$deword."','".$engword."','".$chnword."',".$idflag.")";
        $result=$GLOBALS['db']->query($sql);
        return $result;
    }

}

function SetEvaluationSelected($evaluationid){
    $sql="UPDATE `evaluations` SET selected=1 where id_evaluation=".$evaluationid;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}
function GetEvaluationName($evaluationid){
    $sql="SELECT name FROM evaluations where id_evaluation=".$evaluationid;
    //echo $sql;
    $result=$GLOBALS['db']->getOne($sql);
    return $result;
}


///**may be not right*//
function GenSelfDicID(){
    $sql="SELECT count(*) FROM sdictionary";
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count+1;
}
///**get evaluation trees*///
function GetEvaluationTree(){
    $sql="select A.`id_evaluation`,`name`,id_parent from evaluations as A";
    $data=$GLOBALS['db']->getAll($sql);
    $gradeTree=GetEvalautionLayers($data,0);
    return $gradeTree;
}

function GetEvalautionLayers($data, $pId,$dbname="smartphone"){
    $conn=mysql_connect("localhost","root","buaascse");
    mysql_selectdb($dbname);

    $sql="select A.`id_evaluation`,`name`,id_parent from evaluations as A,results as B where A.id_evaluation=B.id_evaluation group by name ";
    $rst=mysql_query($sql);
    while($row=mysql_fetch_array($rst)){
        $arr[]=$row;
    }
        $tree = '';
        foreach($data as $v)
        {
            if($v['id_parent'] == $pId)
            {
                $v['id_parent'] = GetEvalautionLayers($data, $v['id_evaluation']);
                $tree[] = $v;
            }
        }
        return $tree;
}


/*other functions*/
function GetExistDBs(){
    $sql="SELECT databasesname FROM admin.`databases`";
    $data=$GLOBALS['db']->getAll($sql);
    return $data;
}
