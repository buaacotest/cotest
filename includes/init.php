<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/18
 * Time: 14:42
 */
/*初始化数据库类*/
session_start();
require( './sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
if(empty($_SESSION['lang']))
$_SESSION['lang']='en_us';
/*屏蔽错误信息*/
//error_reporting(0);
?>