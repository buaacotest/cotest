<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/16
 * Time: 16:18
 */
session_start();
require('./includes/config.php');
require('./includes/init.php');
require('includes/lib_category.php');
//require('includes/lang.php');
//require('./lang/'.$GLOBALS['_CFG']['lang'].'/common.php');

//$smarty->assign('lang',$_LANG);

$smarty->assign('title','Cotest');


$smarty->assign('user',$_SESSION['member']);
$num=getProductsCount('mobilephones');
$smarty->assign('number',$num);
/*  显示模板  */
$smarty->display('index.tpl');
?>