<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/17
 * Time: 15:43
 */
require('./includes/init.php');
require('./includes/lib_category.php');
require('./includes/config.php');
$product_num=getProductsSum();
$smarty->assign('str',$product_num);
$smarty->display('category.tpl');