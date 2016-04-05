<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/25
 * Time: 15:14
 */
require("includes/init.php");
require('lang/'.$_SESSION['lang'].'/user.php');
$nowtime = time();
if(empty($_SESSION['exptime']))
    die($_LANG['invalid']);
if($nowtime>$_SESSION['exptime']){
    $msg = $_LANG['overTime'];
}else{
    $username=$_SESSION['user'];
    $password= $_SESSION['pass'];
    $email =$_SESSION['mail'];
    $regtime= $_SESSION['regtime'];
    $sql="select id from admin.users where name=".$username;
    $rst = $GLOBALS['db']->getOne($sql);
    if(!empty($rst)){
        $msg=$_LANG['alreadyActive'];
    }else{
        $sql = "insert into admin.users(`name`,`password`,`email`,`regtime`)" ;
        $sql .= " values ('$username', '$password','$email','$regtime')";
        $rst = $GLOBALS['db']->query($sql);
        if(mysql_affected_rows()!=1) die(0);
        $msg = $_LANG['ActiveSuccess'];
    }
}
echo $msg;