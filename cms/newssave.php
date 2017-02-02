<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/2/2
 * Time: 20:36
 */
require('../includes/init.php');
include_once '../includes/config.php';
require('libnewseditor.php');

$txtid=trim($_POST['txtid']);

$category=trim($_POST['category']);
$product=trim($_POST['product']);

$title=trim($_POST['txtTitle']);
$content=trim($_POST['content1']);

$date='2017-01-25';
print_r($txtid);
echo "</br>";

print_r($category);
echo "</br>";
print_r($product);
echo "</br>";

print_r($title);
echo "</br>";
print_r($content);
if($category=='testprogramme'){
    if(!empty($txtid)){
        $result=updateTestprogramme($txtid,$title,$content,$date,$product);
    }

}elseif($category=='testreport'){

}elseif($category=='cotestreport'){

}



