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
$smarty->assign('lang',$_LANG);
$smarty->assign('user',$_SESSION['member']);
$smarty->assign('title',"about");
if(isMobile())
    $smarty->display('about_m.tpl');
else
    $smarty->display('about.tpl');