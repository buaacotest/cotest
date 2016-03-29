<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/29
 * Time: 16:28
 */
require('../sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$database=$_GET['project'];
$db->changeDB($database);
$sql="select wordid from sdictionary";
$res=$db->getAllValues($sql);
$data=json_encode($res);
echo $data;