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
$emailBody="您的密码已重置为：000000<br/>请及时修改密码！";
$rs=sendEmail($email,"密码重置",$emailBody);
if($rs){
    echo 1;
}else{
    echo -1;
}