<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/28
 * Time: 20:00
 */
require('./includes/init.php');
require('includes/lib_comment.php');
$project=$_POST['project'];
$product=$_POST['product'];
$user=$_POST['user'];
$content=$_POST['content'];
$db->changeDB($project);
if(addComment($product,$user,$content)){
    echo "success";
}else
    echo "fail";

