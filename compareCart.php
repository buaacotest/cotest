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
$items = $_POST['items'];
//$items = json_decode($items,true);
if($option=='add'){
    addToCart($items,$project);
    echo "success";
}
else if($option=='remove'){
    removeFromCart($items,$project);
    //print_r($_SESSION[$project]['idList']);
    echo "success";
}
else if($option=='show')
    echo  json_encode($_SESSION[$project]['idList']);
else if($option = 'removeAll'){
    removeAll($project);
    echo "success";
}

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

