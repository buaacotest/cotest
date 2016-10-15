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
$directory=getDirectoryWithLink($project_name);
$up=$directory['up'];
$upper=$directory['upper'];

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
    if($project_name=='milk'||$project_name=='milkpowder')
        $sort='score';
    else
        $sort='time';
}
$productsA = $productsB =array();
/*搜索相关*/
$keyWords=trim($_GET["keyword"]);
if(!empty($keyWords)){
    $keyIds=searchProducts($keyWords);
    $productsA=getProductByIds($keyIds);
}


/*筛选相关*/
$data=showLabels();
if(!empty($labels)){

    $ids=filterProducts($labels);

  //  echo "id".$ids;

    //print_r($ids);

    $productsB=getProductByIds($ids,$sort);
}

if(!empty($keyWords)&&!empty($labels)){
    foreach ($productsA as $value){
        foreach ($productsB as $val){
            if($value==$val){
                $products[]=$value;
            }
        }
    }
    $products = multiSort($products,$sort);
}else if(empty($keyWords)&&empty($labels)){
    $products = getAllProducts($sort);
}else{
    $products = $productsA + $productsB;
    $products = multiSort($products,$sort);
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
$smarty->assign('title',$up['name']);
$smarty->assign('products',$products);
$smarty->assign('productsNum',$productsNum);
$smarty->assign('lang',$_LANG);
$smarty->assign('user',$_SESSION['member']);
$smarty->assign('keyword',$keyWords);

if($flag){
    if(isMobile())
        $smarty->display("prolist_m.tpl");
    else
        $smarty->display("prolist.tpl");
}
else{
    if(isMobile())
        $smarty->display('products_m.tpl');
    else
        $smarty->display('products.tpl');
}


