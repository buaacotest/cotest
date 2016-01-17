<?php

/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/1/17
 * Time: 13:23
 */
class mysql_cls
{

    var $serverAddress;
    var $serverUsername;
    var $serverPassword;
    var $selectDBname;
    var $connect;
    function __construct($serveradd='localhost',$serveruser='root',$serverPass='123456',$namein='mydb')
    {
        /*构造函数：数据库基本链接*/
        $this->serverAddress=$serveradd;
        $this->serverUsername=$serveruser;
        $this->serverPassword=$serverPass;
        $this->selectDBname=$namein; /*初始选择的DB*/
    }
    function connect(){
        /*链接数据库*/
        $connect=mysql_connect($this->serverAddress,$this->serverUsername,$this->serverPassword);
        mysql_select_db($this->selectDBname,$connect);
        mysql_query("set names 'utf8'");
    }
    function changeDB($namein){
        /*改变选择的数据库*/
        $this->selectDBname=$namein;
        mysql_select_db($namein);
    }

    function excusql($sql){
        return mysql_query($sql);
    }
    function ec(){
        echo hh;
    }
}
?>