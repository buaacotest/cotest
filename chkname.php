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
$name=trim($_POST['username']);
$sql = "select * from admin.users where name='".$name."'";
$password =trim($_POST['password']);
$email= trim($_POST['email']);
if(!empty($password)){
    $sql .= " and password = '".md5($password)."'";
}else if(!empty($name)){               /*注册时查询用户名是否已被使用*/
    $user=$GLOBALS['db']->getOneRow($sql);
    if(empty($user)){
        $reback='5';               /*该用户名未被使用*/
    }else{
        $reback='6';              /*已被使用*/
    }
    echo $reback;
    return;
}
/*邮箱相关*/
if(!empty($email)){
    $sql2="select * from admin.users where email='".$email."'";
    $emails=$GLOBALS['db']->getAll($sql2);
    if(empty($emails)){           /*注册邮箱未被使用*/
        $reback='3';
    }else{                    /*邮箱已被使用*/
        $reback='4';
    }
    echo $reback;
    return;
}
/*用户名和密码相关*/
$rst=$GLOBALS['db']->getOneRow($sql);
if(!empty($rst)){                    /*登录所用,用户已注册且密码账号均正确*/
    $_SESSION['member'] = $rst['name'];
    $_SESSION['id'] = $rst['id'];
    $reback = '1';
}else{                              /*登录时用户名或者密码错误*/
    $reback = '2';
}
echo $reback;