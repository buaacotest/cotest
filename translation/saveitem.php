<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/3/26
 * Time: 20:36
 */
require ('../sql/mysql_cls.php');

$oriword=$_GET['oriword'];////原始
$id=$_GET['id'];///id
$projectname=$_GET['projname'];////所翻译的数据库
$chn=$_GET['CHN'];///翻译
$flag=$_GET['flag'];////标示是否选择
$type=$_GET['type'];/////翻译的是evaluation还是property
if($chn=="")
    echo "translation null";
else{
    //echo $type;
    $db=new mysql_cls();
    $db->connect();
    $serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
    $db->changeDB($projectname);
    $transarr=array('CHN'=>$chn,'Eng'=>"null",'De'=>"null");///暂时De都为空
    require('lib.php');
    $result1=0;
    $result2=0;
    $outstr1="";
    $outstr2="";
    if($type=="property")
      $dicflag=0;
    if($type=="evaluation")
      $dicflag=1;
    $result1=SaveTranslationToAdminDic($oriword,$transarr);///一旦修改了input，说明是新增的意思
    $result2=SaveTranslationToSelfDic($oriword,$transarr,$id,$dicflag);
    $db->close();
    if($result1)
        $outstr1="saved in admindic!";
    if($result2)
        $outstr2="saved in selfdic!";
    echo "success saved!".$outstr1.$outstr2;
}