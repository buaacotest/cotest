<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/2
 * Time: 20:57
 */
function sendEmail($addr,$title,$body){
    $smtpserver = "smtp.163.com"; //SMTP服务器
    $smtpserverport =25; //SMTP服务器端口，一般为25
    $smtpusermail = "13141457347@163.com"; //SMTP服务器的用户邮箱
    $smtpuser = "13141457347"; //SMTP服务器的用户帐号
    $smtppass = "yzz4jc"; //SMTP服务器的用户密码
    $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //实例化邮件类
    $emailtype = "HTML"; //信件类型
    $smtpemailto = $addr; //接收邮件方
    $smtpemailfrom = $smtpusermail; //发送邮件方
    $emailsubject = $title;//邮件标题
    $smtp->debug=false;
    //邮件主体内容
    $emailbody =$body;
    //发送邮件
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    if($rs!=""){
        $rst=true;
    }else{
        $rst=false;
    }
    return $rst;
}
function getRandStr($len)
{
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9"
    );
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i=0; $i<$len; $i++)
    {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}