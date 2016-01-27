<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/22
 * Time: 16:10
 */
session_start();
require('./includes/init.php');
$reback = '0';
$sql = "select * from admin.users where name='".$_POST['user']."'";
$password = $_POST['password'];
if(!empty($password)){
    $sql .= " and password = '".md5($password)."'";
}
$rst=$GLOBALS['db']->getOneRow($sql);
if(isset($rst)){                    /*登录所用,用户已注册且密码账号均正确*/
    $_SESSION['member'] = $rst['name'];
    $_SESSION['id'] = $rst['id'];
    $reback = '1';
}else{                              /*用户名或者密码错误或者没有注册*/
    $reback = '2';
}
echo $reback;