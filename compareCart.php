<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/7/13
 * Time: 20:47
 */
session_start();
$option=$_POST['option'];
$items = json_decode($_POST['items'],true);
if($option=='add')
    addToCart($items);
else if($option=='remove')
    removeFromCart($items);
else if($option=='show')
    echo  json_encode($_SESSION['project']['idList']);

function addToCart($items){
    foreach($items as $k=>$v){
        $_SESSION['project']['idList'][$k] = $v;
    }
}

function removeFromCart($items){
    foreach($items as $k=>$v){
        unset($_SESSION['project']['idList'][$k]);
    }

}

