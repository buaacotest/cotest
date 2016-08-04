<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/24
 * Time: 20:52
 */
fputs(STDOUT,"输入图片文件夹地址");
$dir=trim(fgets(STDIN));
$address=array();
if(is_dir($dir)) {

    $filesnames = scandir($dir);
    foreach ($filesnames as $name) {
        if ($name == '.' || $name == '..') continue;
        //echo $name."\n";
        else{
           // echo $name."\n";
            $match=explode('_',$name);
            $id=$match[0];
            if(!isset($address[$id])){
                //$address[]=$id;
                $address[$id]=array();
                $address[$id][]=basename($name,".jpg");
            }
            else
                $address[$id][]=basename($name,".jpg");
        }
    }
}
print_r(json_encode($address));