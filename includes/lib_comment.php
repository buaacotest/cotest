<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/28
 * Time: 19:09
 */
function addComment($id_product,$user,$replyer='',$content,$parent='0'){
    $sql="insert into comments(id_product,user,content, id_parent,replyer) VALUES ($id_product,'$user','$content',$parent,'$replyer')";
    echo $sql;
    $GLOBALS['db']->query($sql);
    if(mysql_affected_rows()!=1)
        return false;
    return true;
}
function getComments($id_product=''){
    if($id_product!=''){
        $sql="select id_comment,user,replyer,create_time  as time,content,id_parent from comments WHERE id_product=$id_product order by time desc ";

    }
    else{
        $sql="select id_comment,user,replyer,create_time  as time,content,id_parent from comments where id_product is null order by time desc ";
    }
    $comments=$GLOBALS['db']->getAll($sql);
    $results=sortComments($comments);
    return $results;

}
/*对评论以及回复排序处理*/
function sortComments($data){
    $parents=array();
    foreach($data as $k=>$v){
        if($v['id_parent']==0){
            $parents[]=$v;
        }
    }
    foreach($parents as $k=>$v){
        foreach($data as $key=>$value){
            if($value['id_parent']==$v['id_comment']){
                $tmp[]=$value;
            }
            foreach($tmp as $k1=>$v1){
                $time[$k1]=$v1['time'];
            }
            array_multisort($time,SORT_NUMERIC,SORT_ASC,$tmp);
            $parents[$k]['childs']=$tmp;
        }
    }
    return $parents;
}