<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/28
 * Time: 15:41
 */
require('../includes/lib_common.php');
require('../sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
require('../includes/lib_translation.php');
//$lang=getTranslate("互动");
//print_r($lang);
$databases=GetExistDBs();
$json_databases=json_encode($databases);
echo $json_databases;
