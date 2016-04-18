<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/25
 * Time: 15:14
 */
srand((double)microtime()*1000000);
$im=imagecreate(42,16);
$black=imagecolorallocate($im,0,0,0);
$white=imagecolorallocate($im,255,255,255);
$gray=imagecolorallocate($im,200,200,200);
imagefill($im,0,0,$gray);

for($i=0;$i<4;$i++){
    $str=mt_rand(1,3);
    $size=mt_rand(3,6);
    $authnum=substr($_GET[num],$i,1);
    imagestring($im,$size,(2+$i*10),$str,$authnum,imagecolorallocate($im,rand(0,130),rand(0,130),rand(0,130)));
}
for($i=0;$i<200;$i++){
    $randcolor=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagesetpixel($im,rand()%70,rand()%30,$randcolor);
}
ob_clean();

header("Content-type:image/jpeg");
imagepng($im);
imagedestroy($im);