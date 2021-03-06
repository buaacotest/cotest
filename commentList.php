<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/12
 * Time: 9:36
 */
require('./includes/config.php');
require('./includes/init.php');
require('includes/lib_comment.php');
require('./lang/'.$_SESSION['lang'].'/comment.php');
$project=$_SESSION['project'];
$option=$_POST['id_product'];
$db->changeDB($project);
$comments=showComments($option);
$commentsPageNumber=getPageNumber();
$smarty->assign('project',$project);
$smarty->assign('id_product',$option);
$smarty->assign('comments',$comments);
$smarty->assign('commentsNumber',$commentsPageNumber);
$smarty->assign('lang',$_LANG);
if(isMobile()){
    $smarty->display("commentList_m.tpl");
}
else
    $smarty->display("commentList.tpl");

function showComments($option=''){
    $pageComments=$_POST['commentPage'];
    if(empty($pageComments))
        $pageComments=1;
    $comments=getComments($option,$pageComments);
    return $comments;
}
