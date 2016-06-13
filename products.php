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
require('./includes/lib_comment.php');
require('./lang/'.$_SESSION['lang'].'/products.php');
/*$product_group=$_GET['id'];
$title=getProductsCat($product_group);
$products=selectProducts($product_group);
$smarty->assign('products',$products);
$smarty->assign('page_title',$title);*/


$project_name=trim($_GET['proj']);
if($project_name=="")
    $project_name='Mobilephones';
$_SESSION['project']=$project_name;
$GLOBALS['db']->changeDB($project_name);

require('data/'.$project_name.'/filterOptions.php');
$json=trim($_GET['labels']);
$sort=trim($_GET['sort']);

$json=str_replace("\\","",$json);

//echo $json;
$labels=json_decode($json,true);

/*生成目录结构*/
$up=$upper=null;
getParentDirectory($project_name,$up,$upper);

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

  //  echo "id".$ids;

    //print_r($ids);

    $products=getProductByIds($ids,$sort);
}else{
    $products=getAllProducts($sort);
}
//print_r($products);

$page_num=ceil(count($products)/35);
$productsNum=count($products);

if(empty($products))
	$productsNum=0;
else
    $productsNum=count($products);
$page_num=ceil($productsNum/35);

$products=array_slice($products,($page-1)*35,35);
//print_r($products);
$smarty->assign('up',$up);
$smarty->assign('upper',$upper);
$smarty->assign('labels',$data);
$smarty->assign('pageNum',$page_num);
$smarty->assign('project',$project_name);
$smarty->assign('title',$project_name);
$smarty->assign('products',$products);
$smarty->assign('productsNum',$productsNum);
$smarty->assign('lang',$_LANG);
$smarty->assign('user',$_SESSION['member']);

if($flag){
    $smarty->display("prolist.tpl");
}
else
    $smarty->display('products.tpl');

/*根据项目名显示不同的引导*/
function getParentDirectory($projectName,&$up,&$upper)
{
    $guideLabels=array('mobilephones'=>array('up'=>'Smartphones','upper'=>'Electronics'),
                        'milk'=>array('up'=>'Milk','upper'=>'Food'));
    $up=$guideLabels[$projectName]['up'];
    $upper=$guideLabels[$projectName]['upper'];
}
