<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/16
 * Time: 16:18
 */
require('./includes/config.php');
require('./includes/init.php');


if($_POST){
    $GLOBALS['_CFG']['lang']=$_POST['language'];
}
require('./lang/'.$GLOBALS['_CFG']['lang'].'/common.php');
$smarty->assign('lang',$_LANG);
$smarty->assign('title','cotest');
/*  显示模板  */
$smarty->display('index.tpl');
?>