<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/24
 * Time: 16:55
 */
session_start();
include_once 'includes/config.php';
$smarty->display('login.tpl');
