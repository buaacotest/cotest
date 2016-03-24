<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/23
 * Time: 20:01
 */
require('sql/mysql_cls.php');
require('lib.php');
//error_reporting(0);
$db=new mysql_cls();
$db->connect();
$db->changeDB('mobilephones');
print_r(json_encode(getEvaluations()));
