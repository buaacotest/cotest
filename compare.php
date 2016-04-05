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
$project=trim($_GET['proj']);
$db->changeDB($project);
$ids=trim($_GET['ids']);
$ids=json_decode($ids,true);
$comProducts=array();
if(!empty($ids)){
    foreach($ids as $k=>$v){
       // echo $v;
        $comProducts[]=getDetails($v,2);
    }
}
//print_r($comProducts);
$smarty->assign('products',$comProducts);
$smarty->display('compare.tpl');