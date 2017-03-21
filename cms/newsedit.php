<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/2/1
 * Time: 19:54
 */

require('../includes/init.php');
include_once '../includes/config.php';
require('libnewseditor.php');

$newsid=trim($_GET['newsid']);
$category=trim($_GET['category']);
//
//echo $category;
//echo $newsid;
$result=[];
$categories=['testprogramme','testreport','cotestreport'];
if($newsid==null){
  ////新建一篇文章
}else {
    if($category=='testprogramme'){
        $sql="SELECT * FROM cotestcms.testprogramme where id=".$newsid;
        $result=$GLOBALS['db']->getOneRow($sql);
        $categories=['testprogramme','testreport','cotestreport'];
    }else if($category=='testreport'){
        $sql="SELECT * FROM cotestcms.testreports where id=".$newsid;
        $result=$GLOBALS['db']->getOneRow($sql);
        $categories=['testreport','testprogramme','cotestreport'];
    }else if($category=='cotestreport'){
        $sql="SELECT * FROM cotestcms.cotestreports where id=".$newsid;
        //echo $sql;
        $result=$GLOBALS['db']->getOneRow($sql);
        $categories=['cotestreport','testreport','testprogramme'];
    }
}
$title= $result['title'];
$content = $result['content'];
$product = $result['product'];
//echo $title;
//echo $content;
//echo $product;

$allproducts=getProductsNames();
$productselectedNum=0;
$num=count($allproducts);
for($i = 0; $i < $num; $i++){///////取得当前选择项
    if($product==$allproducts[$i]){
        $productselectedNum=$i;
        break;
    }
}

$smarty->assign('textid',$newsid);
$smarty->assign('title',$title);
$smarty->assign('content',$content);
$smarty->assign('category',$categories);
$smarty->assign('product',$allproducts);
$smarty->assign('productselectedNum',$productselectedNum);
$smarty->display('newsedit.tpl');