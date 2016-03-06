<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/6
 * Time: 16:17
 */
require('./includes/lib_products.php');
require('./includes/config.php');
require('./includes/init.php');
$ids=trim($_GET['ids']);
$comProducts=array();
if(!empty($ids)){
    foreach($ids as $k=>$v){
        $comProducts[]=getDetails($v);
    }
}
$smarty->assign('products',$comProducts);
$smarty->display('compare.tpl');