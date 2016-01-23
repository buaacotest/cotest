<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/18
 * Time: 14:42
 */
/*初始化数据库类*/
require( '../sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;

/*test for LSJ's functions*/
$dbnumber=$db->getDBnumber();
echo $dbnumber;
$dbnames=$db->getAllDBnames();
print_r($dbnames);
$db->changeDB("microwave");
$dbsename=$db->getNowDB();
echo $dbsename;

require('../includes/lib_common.php');
/*载入Common语言文件*/
$_CFG=load_config();
require('../lang/'.$_CFG['lang'].'/common.php');

/*test some lib_function by lsj*/
require ('../includes/lib_products.php');
$evaluations=getEvalutionsByOneID(1074);
print_r($evaluations);
