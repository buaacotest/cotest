<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/28
 * Time: 21:40
 */
session_start();
require('includes/init.php');
require('includes/config.php');
require('includes/lib_products.php');
$smarty->display('header.tpl');
require('navigation.php');
$proj=trim($_GET['proj']);
$GLOBALS['db']->changeDB($proj);
$id=trim($_GET['id']);
$details=getDetails($id);
//print_r($details['Pros']);
//print_r($details['Cons']);
$product=array('name'=>$details['name'],'manufacturer'=>$details['manufacturer']);
$smarty->assign('title',$product['name']);
$smarty->assign('product',$product);
$smarty->assign('score',$details['evaluations'][0]['value']);
$smarty->assign('evals',$details['evaluations'][0]);
$smarty->assign('props',$details['property']);
$smarty->assign("Pros",$details['Pros']);
$smarty->assign("Cons",$details['Cons']);
$smarty->display('details.tpl');