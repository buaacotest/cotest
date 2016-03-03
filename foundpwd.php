<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/2
 * Time: 20:02
 */
require('includes/init.php');
require('includes/lib_user.php');
require('includes/smtp.php');
$email=$_POST['email'];
$token=getRandStr(6);
$emailBody="您的验证码为：<br>".$token;
$rs=sendEmail($email,"修改密码",$emailBody);
if($rs){
    echo $token;
}else{
    echo -1;
}