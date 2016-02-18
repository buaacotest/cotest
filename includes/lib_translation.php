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
                $v['id_parent'] = getGrade($data, $v['id_evaluation']);
                $tree[] = $v;
            }
        }
        return $tree;
}
