<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/23
 * Time: 16:07
 */
if(isset($_POST['lang'])){
    //echo "语言".$_POST['lang'];
    $GLOBALS['_CFG']['lang']=$_POST['lang'];
}
?>