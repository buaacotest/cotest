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
$password = md5(trim($_POST['password']));       //加密密码
$email = trim($_POST['email']);             //邮箱
$regtime = time();
$token_exptime = time()+60*60*24;         //过期时间为24小时后
$_SESSION['user']=$username;
$_SESSION['pass']=$password;
$_SESSION['mail']=$email;
$_SESSION['regtime']=$regtime;
$_SESSION['exptime']=$token_exptime;
$emailbody = $_LANG['dear'].$username.":<br/>".$_LANG['clickLink'].
    "<a href='http://localhost/cotest/active.php' target=
'_blank'>http://localhost/cotest/active.php</a><br/>".$LANG['ifCannotClick'];
$rs=sendEmail($email,$_LANG['active'],$emailbody);
if($rs){
    $msg =1;
}else{
    $mag=2;
}

echo $msg;