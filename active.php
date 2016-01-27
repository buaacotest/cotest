<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/25
 * Time: 15:14
 */
include_once("includes/init.php");
header('Content-Type:text/html;charset=utf-8');
$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();
//print_r($verify."shijian".$nowtime);
$sql = "select id,token_exptime from admin.users where status='0' and `token`='$verify'";
$row = $GLOBALS['db']->getOneRow($sql);
//print_r($row);
if(isset($row)){
    if($nowtime>$row['token_exptime']){ //30min
        $msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
    }else{
        $db->query("update admin.users set status=1 where id=".$row['id']);
       // echo $row['id'];
        if(mysql_affected_rows()!=1) die(0);
        $msg = '激活成功！';
    }
}else{
    $msg = '您已激活该账号';
}

echo $msg;