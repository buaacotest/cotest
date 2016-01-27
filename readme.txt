文件夹结构：
css存放样式代码
images存放图标
pictures暂存项目相关图片
js存放所有的JavaScript程序，包括jquery
Smarty文件夹存放Smarty库，/Smarty/templates存放前端模板
includes文件夹存放库函数
lang文件夹存放语言相关函数
sql存放mysql类
首页存放的php和每个前端模板对应后端php


**********2016.01.26提交用户系统相关功能******************************
新增active.php用于邮箱激活
    chkname.php检查用户名是否已被注册以及登录时该用户是否已注册
	login.php登录部分
	logout.php退出
	regcheck.php注册并填数据库、发送邮件
	register.php显示注册界面
	yzm.php登录或注册时用到的验证码
    相关文件：includes/smtp.php
***********************以上文件暂时不用***************************************
***********************前端双语设置***************************
在lang中en_us以及zh_cn的common.php中添加相应的文本
includes/lang.php:接收前端的POST请求，可用select标签实现
数据格式为：以lang作为标签的name，可选值为en_us或者zh_cn
或者ajax发送请求如 $.post("index.php",{lang:en_us},function(result)...
*****************************************************************