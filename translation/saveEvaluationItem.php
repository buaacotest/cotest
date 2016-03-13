<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/3/7
 * Time: 21:36
 */

require ('../sql/mysql_cls.php');
$word=$_GET['name'];
$id=$_GET['id'];
$translation=$_GET['translation'];
if($translation=="")
    echo "translation=null";
else{
    $projectname=$_GET['projname'];
    $idflag=$_GET['idflag'];
    $type=$_GET['type'];
    $db=new mysql_cls();
    $db->connect();
    $serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
    $db->changeDB($projectname);
    $transarr=array('CHN'=>$translation,'Eng'=>"null",'De'=>"null");

    require('../includes/lib_translation.php');
    $result1=0;
    $result2=0;
    $outstr1="";
    $outstr2="";
    if($type=="new")
        $result1=SaveTranslationToAdminDic($word,$transarr);///一旦修改了input，说明是新增的意思
    $result2=SaveTranslationToSelfDic($word,$transarr,$id,$idflag);
    $db->close();
    if($result1)
        $outstr1="saved in admindic!";
    if($result2)
        $outstr2="saved in selfdic!";
    echo "success saved!".$outstr1.$outstr2;
}
