<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/7/13
 * Time: 20:47
 */
session_start();
$project = $_SESSION['project'];
$option=$_POST['option'];
$items = json_decode($_POST['items'],true);
if($option=='add')
    addToCart($items,$project);
else if($option=='remove')
    removeFromCart($items,$project);
else if($option=='show')
    echo  json_encode($_SESSION[$project]['idList']);
else if($option = 'removeAll')
    removeAll($project);

function addToCart($items,$project){
    foreach($items as $k=>$v){
        $_SESSION[$project]['idList'][$k] = $v;
    }
}

function removeFromCart($items,$project){
    foreach($items as $k=>$v){
        unset($_SESSION[$project]['idList'][$k]);
    }

}

function removeAll($project){
    $_SESSION[$project]['idList']=array();
}

