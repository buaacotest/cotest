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
require('./lang/'.$_SESSION['lang'].'/compare.php');
$project=trim($_GET['proj']);
$db->changeDB($project);
$ids=trim($_GET['ids']);
$lang=$_SESSION['lang'];
$ids=json_decode($ids,true);
$comProducts=array();

if(!empty($ids)){
    foreach($ids as $k=>$v){
       // echo $v;
        $comProducts[]=getDetails($v,2,$lang);
    }
}
$project_name=trim($_GET['proj']);
if($project_name=="")
    $project_name='Mobilephones';
$GLOBALS['db']->changeDB($project_name);
//print_r($comProducts);
$smarty->assign('products',$comProducts);
$smarty->assign('project',$project_name);
$smarty->display('compare.tpl');