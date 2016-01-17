<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/16
 * Time: 16:18
 */
include 'config.php';
/*  使用Smarty赋值方法将一对儿名称/方法发送到模板中  */
$smarty->assign('title','第一个Smarty');
$smarty->assign('content','Hello,Welcome to study \'Smarty\'!');
/*  显示模板  */
$smarty->display('index.tpl');
?>