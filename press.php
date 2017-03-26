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
$testprogramme_page_num=trim($_GET['testprogramme_page_num']);
$testreport_page_num = trim($_GET['testreport_page_num']);
$cotestreport_page_num = trim($_GET['cotestreport_page_num']);
$numberPerpage=2;
if(!$testprogramme_page_num){
  $testprogramme_page_num = 1;
}
if(!$testreport_page_num){
  $testreport_page_num = 1;
}
if(!$cotestreport_page_num){
  $cotestreport_page_num = 1;
}

$Testprogramme=getTestprogrammeOnePage($testprogramme_page_num,$numberPerpage);
$Testreports=getTestreportsOnePage($testreport_page_num,$numberPerpage);
$Cotestreports=getCotestreportsOnePage($cotestreport_page_num,$numberPerpage);

//print_r($allTestrepors);
$smarty->assign('testprogramme',$Testprogramme);
$smarty->assign('testreports',$Testreports);
$smarty->assign('cotestreports',$Cotestreports);
if(isMobile())
    $smarty->display('press_m.tpl');
else
    $smarty->display('press.tpl');
