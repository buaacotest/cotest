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
$projectname=$_GET['projname'];
$idflag=$_GET['idflag'];
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
$db->changeDB($projectname);
$transarr=array('CHN'=>$translation,'Eng'=>"null",'De'=>"null");

require('../includes/lib_translation.php');
$result1=SaveTranslationToAdminDic($word,$transarr);///一旦修改了input，说明是新增的意思
$result2=SaveTranslationToSelfDic($word,$transarr,$id,$idflag);
$db->close();
echo $result1." ".$result2;