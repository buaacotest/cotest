<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/19
 * Time: 14:32
 */
require('./includes/lib_products.php');
require('./includes/config.php');
require('./includes/init.php');
/*$product_group=$_GET['id'];
$title=getProductsCat($product_group);
$products=selectProducts($product_group);
$smarty->assign('products',$products);
$smarty->assign('page_title',$title);*/
$project_name=$_GET['proj'];
//echo $project_name;
$products=getAllProducts($project_name);
//print_r($products);
$smarty->assign('project',$project_name);
$smarty->assign('title',$project_name);
$smarty->assign('products',$products);
$smarty->display('products.tpl');