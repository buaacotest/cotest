<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/17
 * Time: 20:17
 */
require('includes/init.php');
require('includes/smtp.php');
require('includes/lib_user.php');
$username=trim($_POST['username']);
$pass=trim($_POST['oldpassword']);
$newPass=trim($_POST['newpassword']);
$pass=md5($pass);
$sql="select * from admin.users where name='".$username."' and password='".$pass."'";

$rst=$db->getAll($sql);
if(!empty($rst)){ /* 修改成功*/
    $sql="update admin.users set password='".md5($newPass)."'where name='".$username."'";
    $db->query($sql);
    $ret=1;
}else{         /*修改失败*/
    $ret=2;
}
echo $ret;