<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/24
 * Time: 20:26
 */
fputs(STDOUT,"输入图片文件夹地址");
$dir=trim(fgets(STDIN));
fputs(STDOUT,"输入项目名");
$proj=trim(fgets(STDIN));
$conn=mysqli_connect("localhost","root","buaascse");
mysqli_select_db($conn,$proj);
if(is_dir($dir)) {

    $filesnames = scandir($dir);
    $sql="delete from products where id_product not in(";
    foreach ($filesnames as $name) {
        if ($name == '.' || $name == '..') continue;
        //echo $name."\n";
       else{
           $match=explode('_',$name);
           $id=$match[0];
           if(preg_match("/^[0-9]+$/",$id))
                $sql.=$id.",";


           //echo $id."\n";
       }
   }
   $sql=substr($sql,0,-1).")";
   echo $sql;
   mysqli_query($conn,$sql);
}