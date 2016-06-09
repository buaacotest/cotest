<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/23
 * Time: 16:19
 */
require('../sql/mysql_cls.php');
require('lib.php');
error_reporting(0);
$db=new mysql_cls();
$db->connect();
$database=$_GET['project'];
$option=$_GET['option'];
$db->changeDB($database);
$databases=$db->getAllDBnames();
$data=null;
if($database==""){
    $data=$db->getAllDBnames();
}
if($option=="property"){
    $data=getProperty();
}else if($option=="evaluation"){
    set_time_limit(1800);////临时设置超时
    $data=getEvaluations();
    //echo $data;
}else if($option=="manufacturer"){
    $data=getManufacturers();
}
$data=json_encode($data);
echo $data;