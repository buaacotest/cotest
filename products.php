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
$project_name=trim($_GET['proj']);
$flag=0;
if(empty($_GET['page'])){
    $page=1;
}else{
    $page=trim($_GET['page']);
    $flag=1;
}
//echo $project_name;
$products=getAllProducts($project_name);
$page_num=count($products)/9;

$products=array_slice($products,($page-1)*9,$page*9);
//print_r($products);
$smarty->assign('pageNum',$page_num);
$smarty->assign('project',$project_name);
$smarty->assign('title',$project_name);
$smarty->assign('products',$products);
if($flag){
    $smarty->display("prolist.tpl");
}
else
    $smarty->display('products.tpl');