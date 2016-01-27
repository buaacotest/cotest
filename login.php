<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/24
 * Time: 16:55
 */
session_start();
include_once 'includes/config.php';
//$_SESSION['member']=null;
if(empty($_SESSION['member'])){
    $smarty->display('login.tpl');
}else{
   $smarty->assign('member',$_SESSION['member']);
    $smarty->display('info.tpl');
}