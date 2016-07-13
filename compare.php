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
$items=trim($_SESSION['idList']);
$lang=$_SESSION['lang'];
$items=json_decode($items,true);
$ids=array();
foreach($items as $k=>$v){
    $ids[]=$v['id'];
}
$comProducts=array();
$directory=getDirectoryWithLink($project);
$count=0;
if(!empty($ids)){
    foreach($ids as $k=>$v){
       // echo $v;
        $comProducts[]=getDetails($v,2,$lang);
        $count=count($comProducts);
    }
}

//print_r($comProducts);
$smarty->assign('lang',$_LANG);
$smarty->assign('count',$count);
$smarty->assign('directory',$directory);
$smarty->assign('products',$comProducts);
$smarty->assign('project',$project);
$smarty->assign('title',"Comparison");
if(isMobile())
    $smarty->display('compare_m.tpl');
else
    $smarty->display('compare.tpl');