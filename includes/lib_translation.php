<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/18
 * Time: 19:51
 */

/*得到在Admin词典中某个单词的个数，用来判断是否是多义词以及是否已经存在于词典*/
function getCountInAdminDic($oriWord){
    $sql="SELECT count(*) FROM admin.dictionary where admin.dictionary.originword="+$oriWord;
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count;
}
/*得到在自身数据库中的count*/
function getCountInSelfDic($oriword){
    $nowdb=$GLOBALS['db']->getNowDB();
    $sql="SELECT count(*) FROM sdictionary where oriword="+$oriword;
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
function GenSelfDicID(){
    $sql="SELECT count(*) FROM sdictionary";
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count+1;
}

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
function GetExistDBs(){
    $sql="SELECT databasesname FROM admin.`databases`";
    $data=$GLOBALS['db']->getAll($sql);
    return $data;
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
function getTranslate($text){
    $arr=array('zh'=>translateText($text,'auto','zh'),'en'=>translateText($text,'auto','en'),'de'=>translateText($text,'auto','de'));
    return $arr;
}