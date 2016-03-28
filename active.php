<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/25
 * Time: 15:14
 */
require("includes/init.php");
$nowtime = time();
if(empty($_SESSION['exptime']))
    die('该链接已失效');
if($nowtime>$_SESSION['exptime']){
    $msg = '您的激活有效期已过，请重新注册';
}else{
    $username=$_SESSION['user'];
    $password= $_SESSION['pass'];
    $email =$_SESSION['mail'];
    $regtime= $_SESSION['regtime'];
    $sql="select id from admin.users where name=".$username;
    $rst = $GLOBALS['db']->getOne($sql);
    if(!empty($rst)){
        $msg='您已激活该账户，无需重复激活！';
    }else{
        $sql = "insert into admin.users(`name`,`password`,`email`,`regtime`)" ;
        $sql .= " values ('$username', '$password','$email','$regtime')";
        $rst = $GLOBALS['db']->query($sql);
        if(mysql_affected_rows()!=1) die(0);
        $msg = '激活成功！';
    }
}
echo $msg;