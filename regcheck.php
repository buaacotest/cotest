<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/22
 * Time: 16:53
 */
require('includes/init.php');
require('includes/smtp.php');
require('includes/lib_user.php');
require('lang/'.$_SESSION['lang'].'/user.php');
$username = stripslashes(trim($_POST['username']));         /*过滤的用户名*/
$password = trim($_POST['password']);       //加密密码
$email = trim($_POST['email']);             //邮箱
$regtime = time();

$token="u:".$username."!p:".$password."!e:".$email."!r:".$regtime."!";
$token=autocode($token,'ENCODE',constant('KEY'));
$token=urlencode($token);
$emailbody = $_LANG['dear']." ".$username.":<br/>".$_LANG['clickLink'].
    "<a href='http://localhost/cotest/active.php?token=$token' target=
'_blank'>http://localhost/cotest/active.php?token=$token</a><br/>".$LANG['ifCannotClick'];
$rs=sendEmail($email,$_LANG['active'],$emailbody);
if($rs){
    $msg =1;
}else{
    $mag=2;
}

echo $msg;