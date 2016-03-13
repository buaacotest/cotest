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
if($project_name=="")
    $project_name='Mobilephones';
$GLOBALS['db']->changeDB($project_name);
require('data/'.$project_name.'/filterOptions.php');
$json=trim($_GET['labels']);
$sort=trim($_GET['sort']);
$json=str_replace("\\","",$json);
$labels=json_decode($json,true);
//$labels=json_decode($labels,true);



/*分页相关*/
$flag=0;
if(empty($_GET['page'])){
    $page=1;
}else{
    $page=trim($_GET['page']);
    $flag=1;
}
/*排序相关*/
if(empty($sort)){
   $sort='time';
}
/*筛选相关*/
$data=getLabels();
if(!empty($labels)){
    $ids=filterProducts($labels);
    $products=getProductByIds($ids,$sort);
}else{
    $products=getAllProducts($sort);
}
//print_r($products);
$page_num=ceil(count($products)/9);

$products=array_slice($products,($page-1)*9,9);
//print_r($products);
$smarty->assign('labels',$data);
$smarty->assign('pageNum',$page_num);
$smarty->assign('project',$project_name);
$smarty->assign('title',$project_name);
$smarty->assign('products',$products);
if($flag){
    $smarty->display("prolist.tpl");
}
else
    $smarty->display('products.tpl');