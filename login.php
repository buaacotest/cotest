<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/24
 * Time: 16:55
 */
require('includes/init.php');
include_once 'includes/config.php';
require('lang/'.$_SESSION['lang'].'/user.php');
$smarty->assign('lang',$_LANG);
if(isMobile())
    $smarty->display('login_m.tpl');
else
    $smarty->display('login.tpl');
