<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/3/6
 * Time: 13:48
 */
require('../includes/lib_translation.php');
$word=$_GET['name'];
$translation=getTranslateOnline($word);
$CHN=$translation['CHN'];
echo $CHN;