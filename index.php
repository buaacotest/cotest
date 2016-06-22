<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/16
 * Time: 16:18
 */
require('./includes/config.php');
require('./includes/init.php');
require('includes/lib_category.php');
//require('includes/lang.php');
require('./lang/'.$_SESSION['lang'].'/index.php');

//$smarty->assign('lang',$_LANG);
//echo $_SESSION['lang'];
$smarty->assign('title','Cotest');

$allNumber=getAllNumber();
$smarty->assign('number',$allNumber);
$smarty->assign('lang',$_LANG);

/*  显示模板  */
if(isMobile())
    $smarty->display('index_m.tpl');
else
    $smarty->display('index.tpl');

