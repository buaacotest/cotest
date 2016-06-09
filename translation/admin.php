<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/6/9
 * Time: 11:48
 */
//echo ($_POST['name']);
//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="translation.html">登录</a>';
    exit;
}
if(empty($_POST['name'])){
    exit('非法访问!');
}
$username = htmlspecialchars($_POST['name']);
$password = MD5($_POST['password']);

//包含数据库连接文件
require('../sql/mysql_cls.php');
require('lib.php');
//检测用户名及密码是否正确
$db=new mysql_cls();
$db->connect();
$sql="select usertype from `admin`.translationuser where username='$username' and userpwd='$password' limit 1";
//print_r($sql);
$check_query = mysql_query($sql);
if($result = mysql_fetch_array($check_query)){
    //登录成功
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['usertype'] = $result['usertype'];
    echo $username,' 欢迎你！进入 <a href="translation.php">开始翻译</a><br />';
    echo '点击此处 <a href="admin.php?action=logout">注销</a> 登录！<br />';
    exit;
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}


?>