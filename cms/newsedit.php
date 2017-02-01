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
if($newsid==null){
  ////新建一篇文章
}else {
    if($category=='testprogramme'){
        $sql="SELECT * FROM cotestcms.testprogramme where id=".$newsid;
        $result=$GLOBALS['db']->getOneRow($sql);
    }else if($category=='testreport'){
        $sql="SELECT * FROM cotestcms.testreports where id=".$newsid;
        $result=$GLOBALS['db']->getOneRow($sql);
    }else if($category=='cotestreport'){
        $sql="SELECT * FROM cotestcms.cotestreports where id=".$newsid;
        $result=$GLOBALS['db']->getOneRow($sql);
    }
}
$title= $result['title'];
$content = $result['content'];
$product = $result['product'];
$category = $result['category'];

$smarty->assign('title',$title);
$smarty->assign('content',$content);
$smarty->display('newsedit.tpl');