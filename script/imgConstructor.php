<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/5/15
 * Time: 13:34
 */
/**
 * desription 压缩图片
 * @param sting $imgsrc 图片路径
 * @param string $imgdst 压缩后保存路径
 */
function image_png_size_add($imgsrc,$imgdst){
    list($width,$height,$type)=getimagesize($imgsrc);
    if($height>$width){
        $scale=$width/$height;////宽高比
        $new_width = ($width>600?600*$scale:$width)*0.9;///固定高度
        $new_height =($height>600?600:$height)*0.9;
    }
    else if($width>=$height){
        $scale=$height/$width;////宽高比
        $new_width = ($width>600?600:$width)*0.9;///固定宽度
        $new_height =($height>600?600*$scale:$height)*0.9;
    }
    switch($type){
        case 1:
            $giftype=check_gifcartoon($imgsrc);
            if($giftype){
                header('Content-Type:image/gif');
                $image_wp=imagecreatetruecolor($new_width, $new_height);
                $image = imagecreatefromgif($imgsrc);
                imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($image_wp, $imgdst,75);
                imagedestroy($image_wp);
            }
            break;
        case 2:
            header('Content-Type:image/jpeg');
            $image_wp=imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($imgsrc);
            imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_wp, $imgdst,75);
            imagedestroy($image_wp);
            break;
        case 3:
            header('Content-Type:image/png');
            $image_wp=imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefrompng($imgsrc);
            imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_wp, $imgdst,75);
            imagedestroy($image_wp);
            break;
    }
}
/**
 * desription 判断是否gif动画
 * @param sting $image_file图片路径
 * @return boolean t 是 f 否
 */
function check_gifcartoon($image_file){
    $fp = fopen($image_file,'rb');
    $image_head = fread($fp,1024);
    fclose($fp);
    return preg_match("/".chr(0x21).chr(0xff).chr(0x0b).'NETSCAPE2.0'."/",$image_head)?false:true;
}
/**
 * desription 对文件路径中的图片进行压缩
 * @param sting $image_file图片路径
 * @return boolean t 是 f 否
 */
function compressPic($dir)
{
    if (is_dir($dir)) {
        $filesnames = scandir($dir);
        foreach ($filesnames as $name) {
            if ($name == '.' || $name == '..') continue;
            //echo $name."\n";
            compressPic($dir."\\".$name);
        }
    } else if (is_file($dir)) {
        $name=basename($dir,".jpg");
        $new_name=dirname(dirname($dir))."\\picturesx\\".$name."x.jpg";
        //echo $dir."   ".$new_name."\n";
        image_png_size_add($dir,$new_name);
        echo "conpress:".$name.".jpg";
    }

}


fputs(STDOUT,"输入图片文件夹地址:");
$dir=trim(fgets(STDIN));
mkdir(dirname($dir)."\\picturesx");
compressPic($dir);