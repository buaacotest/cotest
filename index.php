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
//require('includes/lang.php');
//require('./lang/'.$GLOBALS['_CFG']['lang'].'/common.php');

//$smarty->assign('lang',$_LANG);
require('includes/lib_category.php');
require('navigation.php');
$num=getProductsCount('mobilephones');
$smarty->assign('user',$_SESSION['member']);
$smarty->assign('number',$num);
/*  显示模板  */
$smarty->display('index.tpl');
?>