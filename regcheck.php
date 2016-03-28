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
header('Content-Type:text/html;charset=utf-8');
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
$emailbody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
    <a href='http://localhost/cotest/active.php' target=
'_blank'>激活账号</a><br/>
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";
$rs=sendEmail($email,"用户账号激活",$emailbody);
if($rs){
    $msg =1;
}else{
    $mag=2;
}

echo $msg;