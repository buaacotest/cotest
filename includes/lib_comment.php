<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/28
 * Time: 19:09
 */
function addComment($id_product,$user,$content){
    $sql="insert into comments(id_product,user,content) VALUES ($id_product,'$user','$content')";
   // echo $sql;
    $GLOBALS['db']->query($sql);
    if(mysql_affected_rows()!=1)
        return false;
    return true;
}
function getComments($id_product){
    $sql="select user,create_time  as time,content from comments WHERE id_product=$id_product order by time desc ";
    $comments=$GLOBALS['db']->getAll($sql);
    return $comments;
}