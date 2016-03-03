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
$email=trim($_POST['email']);
$token=getRandStr(8);
$password=md5($token);
$sql="update admin.users set password='".$password."'where email='".$email."'";
$GLOBALS['db']->query($sql);
$emailBody="您的密码已重置为：$token<br/>请及时修改密码！";
$rs=sendEmail($email,"密码重置",$emailBody);
if($rs){
    echo 1;
}else{
    echo -1;
}