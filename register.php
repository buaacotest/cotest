<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/22
 * Time: 16:58
 */
require('includes/init.php');
include_once 'includes/config.php';
require('lang/'.$_SESSION['lang'].'/user.php');
$smarty->assign('lang',$_LANG);
$smarty->display('register.tpl');