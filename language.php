<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/28
 * Time: 14:47
 */
session_start();
$lang=trim($_GET['language']);
if(!empty($lang)){
    //echo "语言".$_POST['lang'];
    $_SESSION['lang']=$lang;
}