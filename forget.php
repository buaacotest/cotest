<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/2
 * Time: 19:59
 */
require('includes/init.php');
include_once 'includes/config.php';
require('lang/'.$_SESSION['lang'].'/user.php');
$smarty->assign('user',$_SESSION['member']);
$smarty->assign('lang',$_LANG);
if(isMobile())
    $smarty->display('found_m.tpl');
else
    $smarty->display('found.tpl');
