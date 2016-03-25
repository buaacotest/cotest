<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/25
 * Time: 14:11
 */
header('Content-Type:text/html;charset=utf-8');
require('lib.php');
error_reporting(0);
$word=trim($_GET['q']);
echo translateText($word,'en','zh');