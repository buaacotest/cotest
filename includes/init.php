﻿<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/18
 * Time: 14:42
 */
/*初始化数据库类*/
define('KEY','i03jxhuu9.*#@');
/*  定义服务器的绝对路径  */
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']."/cotest");
/*屏蔽错误信息*/
error_reporting(0);
session_start();
require( BASE_PATH.'/sql/mysql_cls.php');
require("lib_common.php");
$db=new mysql_cls();
$db->connect();

if(empty($_SESSION['lang']))
$_SESSION['lang']='en_us';


?>