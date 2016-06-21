<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/25
 * Time: 15:14
 */
require("includes/init.php");
require('includes/lib_user.php');
require('lang/'.$_SESSION['lang'].'/user.php');
$nowtime = time();
$token=rawurldecode($_GET['token']);
$token=autocode($token,'DECODE',constant('KEY'));
preg_match_all("/:([^:!]+)!/",$token,$match);
$username=$match[1][0];
$password= md5($match[1][1]);
$email =$match[1][2];
$regtime=$match[1][3];
$token_exptime = $regtime+60*60*24;         //过期时间为24小时后
if($nowtime>$token_exptime){
    $msg = $_LANG['overTime'];
}else{
    $sql="select id from admin.users where name='".$username."'";
    echo $sql;
    $rst = $GLOBALS['db']->getOne($sql);
    print_r($rst);
    if(!empty($rst)){
        $msg=$_LANG['alreadyActive'];
    }else{
        $sql = "insert into admin.users(`name`,`password`,`email`,`regtime`)" ;
        $sql .= " values ('$username', '$password','$email','$regtime')";
       // echo $sql;
        $rst = $GLOBALS['db']->query($sql);
        if(mysql_affected_rows()!=1) die(0);
        $msg = $_LANG['ActiveSuccess'];

    }
}
echo $msg."\n";
echo $_LANG['wait'];
header("refresh:3;url=login.php");
