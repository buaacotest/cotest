<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/7/13
 * Time: 20:47
 */
session_start();
$option=$_POST['option'];
$item = json_decode($_POST['items'],true);
if($option=='add')
    addToCart($item);
else if($option=='remove')
    removeFromCart($item);
else if($option=='show')
    echo  json_encode($_SESSION['idList']);

function addToCart($item){
    $id = $item['id'];
    $_SESSION['idList'][$id] = $item['name'];
}

function removeFromCart($item){
    $id = $item['id'];
    unset($_SESSION['idList'][$id]);
}

