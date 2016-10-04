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
$db->changeDB('whheadphones');
$oriword="Inventory";

$id="5086";
$dicflag=1;
//$result=getManufacturers();
//print_r(QueryInSelfDic($id,$dicflag));
$gtranslation = GetTransLation($oriword,29,3);
print_r( $gtranslation);