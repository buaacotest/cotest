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
    function __construct($serveradd='localhost',$serveruser='root',$serverPass='root',$namein='mobilephone')
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

    function query($sql){
        return mysql_query($sql);
    }
    function fetch_array($query)
    {
        return mysql_fetch_array($query);
    }
    /*用于获取一行数据的第一个字段*/
    function getOne($sql,$limited=false)
    {
        if ($limited == true)
        {
            $sql = trim($sql . ' LIMIT 1');
        }

        $res = $this->query($sql);
        if ($res !== false)
        {
            $row = mysql_fetch_row($res);

            if ($row !== false)
            {
                return $row[0];
            }
            else
            {
                return '';
            }
        }
        else
        {
            return false;
        }
    }
    /*获取所有查询的数据结果*/
    function getAll($sql)
    {
        $res = $this->query($sql);
        if ($res !== false)
        {
            $arr = array();
            while ($row = $this->fetch_array($res))
            {
                $arr[] = $row;
            }

            return $arr;
        }
        else
        {
            return false;
        }
    }
    /*获取一行数据*/
    function getOneRow($sql,$limited=false){
        if ($limited == true)
        {
            $sql = trim($sql . ' LIMIT 1');
        }

        $res = $this->query($sql);
        if ($res !== false)
        {
            return mysql_fetch_assoc($res);
        }
        else
        {
            return false;
        }
    }
}
?>