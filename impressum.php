<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/7/16
 * Time: 13:53
 */
require('includes/init.php');
include_once 'includes/config.php';
require('lang/'.$_SESSION['lang'].'/user.php');
$smarty->assign('lang',$_LANG);
$smarty->assign('title',"Imprint");
if(isMobile())
    $smarty->display('impressum_m.tpl');
else
    $smarty->display('impressum.tpl');