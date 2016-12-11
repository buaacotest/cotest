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
require('./includes/lib_user.php');

/*权限检查*/
$permission = permissionCheck();

$project=trim($_GET['proj']);
$db->changeDB($project);
$items=$_SESSION[$project]['idList'];
$lang=$_SESSION['lang'];
$ids=array_keys($items);
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
$smarty->assign('permission',$permission);
if(isMobile())
    $smarty->display('compare_m.tpl');
else
    $smarty->display('compare.tpl');