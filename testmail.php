<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/21
 * Time: 21:54
 */
$send = mail('958919277@qq.com', 'My Subject', 'The test mail');if($send){echo '发送成功';}else{echo '发送失败';}