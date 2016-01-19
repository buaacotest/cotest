<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/18
 * Time: 14:42
 */
/*初始化数据库类*/
require( './sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;

require('./includes/lib_common.php');
/*载入Common语言文件*/
$_CFG=load_config();
require('./lang/'.$_CFG['lang'].'/common.php');
