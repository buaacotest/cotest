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
require('lang/'.$_SESSION['lang'].'/user.php');
$email=trim($_POST['email']);
$token=getRandStr(8);
$password=md5($token);
$sql="update admin.users set password='".$password."'where email='".$email."'";
$GLOBALS['db']->query($sql);
$emailBody=$_LANG['reset'].":$token<br/>".$_LANG['modify']."!";
$rs=sendMail($email,$_LANG['NewPass'],$emailBody);
if($rs){
    echo 1;
}else{
    echo -1;
}