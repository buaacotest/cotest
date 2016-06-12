<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/28
 * Time: 20:00
 */
session_start();
require('./includes/init.php');
require('includes/lib_comment.php');
$project=$_POST['project'];
$product=$_POST['product'];
$user=$_SESSION['member'];
$replyer=$_POST['replyer'];
$content=$_POST['content'];
$id_parent=$_POST['id_parent'];
$commentId=$_POST['id_comment'];
$support=$_POST['like'];
$unsupport=$_POST['dislike'];
$db->changeDB($project);

if(!empty($commentId)&&!empty($support)){
    echo supportOrUnsupport($commentId,$support);
    return;

}

if(!empty($commentId)&&!empty($unsupport)){
    echo setUnsupport($commentId,$unsupport);
    return;

}
if(addComment($product,$user,$replyer,$content,$id_parent)){
    echo "success";
}else
    echo "fail";

