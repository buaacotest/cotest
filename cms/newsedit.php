<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/2/1
 * Time: 19:54
 */

require('../sql/mysql_cls.php');
include_once '../includes/config.php';
require('libnewseditor.php');

$newsid=trim($_GET['newsid']);
$category=trim($_GET['category']);

echo $category;
echo $newsid;
$result=[];
if($newsid==null){
  ////新建一篇文章
}else {
    if($category=='testprogramme'){
        $sql="SELECT * FROM cotestcms.testprogramme where id=".$id;
        $result=$GLOBALS['db']->getOneRow($sql);
    }else if($category=='testreport'){
        $sql="SELECT * FROM cotestcms.testreports where id=".$id;
        $result=$GLOBALS['db']->getOneRow($sql);
    }else if($category=='cotestreport'){
        $sql="SELECT * FROM cotestcms.cotestreports where id=".$id;
        $result=$GLOBALS['db']->getOneRow($sql);
    }
}
print_r($result);
echo $result['title'];
echo $result['content'];
echo $result['product'];
