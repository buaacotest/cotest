<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/3/7
 * Time: 21:36
 */
require('../includes/lib_translation.php');
require ('../sql/mysql_cls.php');
$word=$_GET['name'];
$id=$_GET['id'];
echo $word." ".$id;