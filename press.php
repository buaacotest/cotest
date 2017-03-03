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
require('cms/libnewseditor.php');
$smarty->assign('lang',$_LANG);
$smarty->assign('title',"press");


$numberPerpage=2;

$Testprogramme=getTestprogrammeOnePage(1,$numberPerpage);
$Testreports=getTestreportsOnePage(1,$numberPerpage);
$Cotestreports=getCotestreportsOnePage(1,$numberPerpage);

//print_r($allTestrepors);
$smarty->assign('testprogramme',$Testprogramme);
$smarty->assign('testreports',$Testreports);
$smarty->assign('cotestreports',$Cotestreports);
if(isMobile())
    $smarty->display('press_m.tpl');
else
    $smarty->display('press.tpl');