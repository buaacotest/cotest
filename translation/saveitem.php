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
if($type=="manufacturer")
    $dicflag=2;
if($flag==1){/////选择保存
    if($chn=="")//////TODO：取消选择的时候是否需要判断翻译为空不为空？
    {
        echo "翻译为空!";
        $result2=SaveTranslationToSelfDic($oriword,$transarr,$id,$dicflag);
        if($result2)
            echo "存入了项目词典但翻译为空!!";
        if($dicflag==0)
            $result3=SetPropertySelected($id,$flag);
        else if($dicflag==1)
            $result3=SetEvaluationSelected($id,$flag);
        if($result3)
            echo "标注selected成功!";
    }
    else{
        $result1=SaveTranslationToAdminDic($oriword,$transarr);///一旦修改了input，说明是新增的意思
        $result2=SaveTranslationToSelfDic($oriword,$transarr,$id,$dicflag);
        if($result1)
            $outstr1="存入了总词典!";
        if($result2)
            $outstr2="存入了项目词典!";
        echo "成功保存!".$outstr1.$outstr2;
        //////无论是选择保存还是取消都要对selected进行操作
        if($dicflag==0)
            $result3=SetPropertySelected($id,$flag);
        else if($dicflag==1)
            $result3=SetEvaluationSelected($id,$flag);
        if($result3)
            echo "标注selected成功!";
    }
}
else{
    //////无论是选择保存还是取消都要对selected进行操作
    $result4=DeleteTranslationInSelfDic($id,$dicflag);
    if($result4)
        echo "删除词条!";
    if($dicflag==0)
        $result3=SetPropertySelected($id,$flag);
    else if($dicflag==1)
        $result3=SetEvaluationSelected($id,$flag);
    if($result3)
        echo "取消 selected成功!";
}




$db->close();