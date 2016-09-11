<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/7/13
 * Time: 20:47
 */
require('./includes/init.php');
$GLOBALS['db']->changeDB($_SESSION['project']);
$option=$_POST['option'];
$list=$_POST['items'];
$_SESSION['idList']=array();
if($option=='add')
    array_merge($_SESSION['idList'],$list);
else if($option=='remove')
    $_SESSION['idList']=array_diff($_SESSION['idList'],$list);
else if($option=='show')
    echo  $_SESSION['idList'];


