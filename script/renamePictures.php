<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/18
 * Time: 17:09
 */
fputs(STDOUT,"输入图片文件夹地址");
$dir=trim(fgets(STDIN));
fputs(STDOUT,"输入项目名");
$proj=trim(fgets(STDIN));
$conn=mysqli_connect("localhost","root","buaascse");
mysqli_select_db($conn,$proj);
$dirname="./$proj";
if(!is_dir($dirname)) {
    mkdir($dirname, 0777, true);
}
$count=0;
$names=array();
renamePic($dir,$conn);
echo $count;
function renamePic($dir,$conn){
    //echo $dir."\n";
    if(is_dir($dir)) {
        $filesnames = scandir($dir);
        foreach ($filesnames as $name) {
            if ($name == '.' || $name == '..') continue;
            //echo $name."\n";
            renamePic($dir."\\".$name,$conn);
        }
    }else if(is_file($dir)){

        $order=$code=$target=$id='';
        $name=basename($dir,".jpg");
        preg_match("/[-_]([0-9]{4}-[0-9]{2})|(^[0-9]{4})[-_]/",$name,$match);
        if(empty($match[1]))
            array_splice($match, 1, 1);
        if(empty($match[1])){
            $code="-1";
            echo "Match fail:".$name."\n";
            return;
        }

        else
             $code=$match[1];
       // print_r($match);
        preg_match("/.*?(_0[12][a-z]?)$/",$name,$match);
        if(!empty($match))
            $order=$match[1];
        //print_r($match);

        $sql="select id_product from products where icrt_code like '%$code%'";
        //echo $sql."\n";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        if(!empty($row)){



            //print_r($row);
            $id=$row[0];
            if($order=='_00'||$order=='')
                $order="_01";
            $target=$id.$order;
            //echo $target."\n";
            $num=1;
            $flag=0;
            foreach($GLOBALS['names'] as $v){/*重名时自动自增命名*/
                if($id==$v&&$id!=''){
                    $flag=1;
                    $num++;
                }
            }
            if($flag)
                $target=$id."_".str_pad($num,2,"0",STR_PAD_LEFT);
            $GLOBALS['names'][]=$id;
            //print_r($GLOBALS['names']);
            if($id!=''){
                copy($dir, getcwd() . "\\" . $GLOBALS['proj'] . "\\" . $target . ".jpg");
                echo "Create picture:" . $target . ".jpg done.\n";
                $GLOBALS['count']++;
            }


        }else{
            echo "Cannot find code ".$code."\n";
        }

            //echo $id."\n";
           // copy($dir, getcwd() . "\\" . $GLOBALS['proj'] . "\\" . $target . ".jpg");
            //echo "Create picture:" . $target . ".jpg done.\n";

        //rename($dir,dirname($dir)."\\".$id.$seq.".jpg");
    }
}

