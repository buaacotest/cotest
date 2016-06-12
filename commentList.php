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
$option=$_POST['id_product'];
$comments=showComments($option);
$commentsPageNumber=getPageNumber();
$smarty->assign('comments',$comments);
$smarty->assign('commentsNumber',$commentsPageNumber);
$smarty->display("commentList.tpl");

function showComments($option=''){
    $pageComments=$_POST['commentPage'];
    if(empty($pageComments))
        $pageComments=1;
    $comments=getComments($option,$pageComments);
    return $comments;
}
