<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/28
 * Time: 21:40
 */
require('includes/init.php');
require('includes/config.php');
require('includes/lib_products.php');
require('includes/lib_comment.php');
$lang=$_SESSION['lang'];
$user=$_SESSION['member'];
require('./lang/'.$_SESSION['lang'].'/details.php');
$proj=trim($_GET['proj']);
$_SESSION['project']=$proj;
$GLOBALS['db']->changeDB($proj);
$id=trim($_GET['id']);
$details=getDetails($id,3,$lang);
/*获取目录*/
$directory=getDirectoryWithLink($proj);

//print_r($comments);
//print_r($details['Pros']);
//print_r($details['Cons']);
$product=array('name'=>$details['name'],'manufacturer'=>$details['manufacturer'],'id'=>$id);
$smarty->assign('title',$product['manufacturer'].$product['name']);
$smarty->assign('product',$product);
$smarty->assign('project',$proj);
$smarty->assign('score',$details['evaluations'][0]['value']);
$smarty->assign('evals',$details['evaluations'][0]);
$smarty->assign('props',$details['property']);
$smarty->assign("Pros",$details['Pros']);
$smarty->assign("Cons",$details['Cons']);
$smarty->assign("id",$id);
$smarty->assign("user",$user);
$smarty->assign('lang',$_LANG);
$smarty->assign('directory',$directory);
if(isMobile())
    $smarty->display('details_m.tpl');
else
    $smarty->display('details.tpl');


