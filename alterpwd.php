<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/17
 * Time: 20:08
 */
require('includes/init.php');
include_once 'includes/config.php';
require('lang/'.$_SESSION['lang'].'/user.php');
$smarty->assign('lang',$_LANG);
if(isMobile())
    $smarty->display('alterpwd_m.tpl');
else
    $smarty->display('alterpwd.tpl');