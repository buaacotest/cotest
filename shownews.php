<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/3/5
 * Time: 15:20
 */

require('includes/init.php');
include_once 'includes/config.php';
require('cms/libnewseditor.php');

$newsid=trim($_GET['newsid']);
$category=trim($_GET['category']);

$result=[];

if($category=='testprogramme'){
        $result=getOneTestprogrammeByID($newsid);
}else if($category=='testreport'){
        $result=getOneTestreportByID($newsid);
}else if($category=='cotestreport'){
        $result=getOneCotestreportByID($newsid);
}

$title= $result['title'];
$content = $result['content'];
$date=$result['date'];
$content=htmlspecialchars_decode($content,ENT_QUOTES);
//echo $content;
//print_r($result);
$smarty->assign('title',$title);
$smarty->assign('date',$date);
$smarty->assign('content',$content);
$smarty->display('pressdetail.tpl');
