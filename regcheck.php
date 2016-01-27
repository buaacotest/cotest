<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/22
 * Time: 16:53
 */
require('./includes/init.php');
require('includes/smtp.php');
header('Content-Type:text/html;charset=utf-8');
$username = stripslashes(trim($_POST['username']));         /*过滤的用户名*/
$password = md5(trim($_POST['password']));       //加密密码
$email = trim($_POST['email']);             //邮箱
$regtime = time();
$token = md5($username.$password.$regtime);       //创建用于激活识别码
$token_exptime = time()+60*60*24;         //过期时间为24小时后
$sql = "insert into admin.users(`name`,`password`,`email`,`token`,`token_exptime`,`regtime`)" ;
$sql .= " values ('$username', '$password','$email','$token','$token_exptime','$regtime')";
$rst = $GLOBALS['db']->query($sql);
if(mysql_insert_id()){
    $smtpserver = "smtp.163.com"; //SMTP服务器
    $smtpserverport =25; //SMTP服务器端口，一般为25
    $smtpusermail = "13141457347@163.com"; //SMTP服务器的用户邮箱
    $smtpuser = "13141457347"; //SMTP服务器的用户帐号
    $smtppass = "yzz4jc"; //SMTP服务器的用户密码
    $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //实例化邮件类
    $emailtype = "HTML"; //信件类型
    $smtpemailto = $email; //接收邮件方
    $smtpemailfrom = $smtpusermail; //发送邮件方
    $emailsubject = "用户帐号激活";//邮件标题
    $smtp->debug=false;
    //邮件主体内容
    $emailbody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
    <a href='http://localhost/test/active.php?verify=".$token."' target=
'_blank'>http://localhost/test/active.php?verify=".$token."</a><br/>
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";
    //发送邮件
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    if($rs==""){
        $msg = "发送错误";
    }else{

        $msg = '恭喜您，注册成功！<br/>请登录到您的邮箱及时激活您的帐号！';
    }
}
echo $msg;