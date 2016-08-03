<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/24
 * Time: 17:53
 */
$orders=array("01","03");
fputs(STDOUT,"输入图片文件夹地址");
$dir=trim(fgets(STDIN));
$dirname="./camerasPart";
if(!is_dir($dirname)) {
    mkdir($dirname, 0777, true);
}
filterOrders($dir,$orders);
function filterOrders($dir,$orders){
    //echo $dir."\n";
    if(is_dir($dir)) {
        $filesnames = scandir($dir);
        foreach ($filesnames as $name) {
            if ($name == '.' || $name == '..') continue;
            //echo $name."\n";
            filterOrders($dir."\\".$name,$orders);
        }
    }else if(is_file($dir)) {

        $name = basename($dir, ".jpg");
        foreach ($orders as $order) {
            if (strstr($name, "_".$order)){
                copy($dir, getcwd() . "\\" . $GLOBALS['dirname'] . "\\" . $name . ".jpg");
                echo "Copy $name done.\n";
            }

        }
    }
}