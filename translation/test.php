<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/23
 * Time: 20:01
 */
require('../sql/mysql_cls.php');
require('lib.php');
//error_reporting(0);
$db=new mysql_cls();
$db->connect();
$db->changeDB('milk');
$oriword="Yili";

$id="3";
$dicflag=2;
//$result=getManufacturers();
print_r(QueryInSelfDic($id,$dicflag));
//$result1=SaveTranslationToAdminDic($oriword,$transarr);///一旦修改了input，说明是新增的意思
//$result2=SaveTranslationToSelfDic($oriword,$transarr,$id,$dicflag);
//if($result1)
//    $outstr1="存入了总词典!";
////if($result2)
//    //$outstr2="存入了项目词典!";
echo $outstr;