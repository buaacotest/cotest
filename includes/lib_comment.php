<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/28
 * Time: 19:09
 */
define('LINE',2);
$pageNumber=0;
function addComment($id_product,$user,$replyer='',$content,$parent='0'){
    $sql="insert into comments(id_product,user,content, id_parent,replyer) VALUES ($id_product,'$user','$content',$parent,'$replyer')";

    //echo $sql;
    $GLOBALS['db']->query($sql);
    if(mysql_affected_rows()!=1)
        return false;
    return true;
}
function getComments($id_product='',$page){
    if($id_product!=''){
        $sql="select * from comments WHERE id_product=$id_product order by create_time desc ";

    }
    else{
        $sql="select * from comments order by  create_time desc ";
    }
    $comments=$GLOBALS['db']->getAll($sql);
    $results=sortComments($comments,$page);
    return $results;
}
/*对评论以及回复排序处理*/
function sortComments($data,$page){
    $user=$_SESSION['member'];
    $parents=array();
    foreach($data as $k=>$v){
        $sql="select `like` from commentusers where user='".$user."'and id_comment=".$v['id_comment'];
        $data[$k]['likeStatus']= $v['likeStatus']=$GLOBALS['db']->getOne($sql);
        $sql="select `dislike` from commentusers where user='".$user."'and id_comment=".$v['id_comment'];
        $data[$k]['dislikeStatus']=  $v['dislikeStatus']=$GLOBALS['db']->getOne($sql);
        if($v['id_parent']==0){
            $id=$v['id_product'];
            $sql="select completename from products where id_product=".$id;
            $v['product']=$GLOBALS['db']->getOne($sql);
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

    $productsNum=count($parents);
    $GLOBALS['pageNumber']=ceil($productsNum/LINE);

    $results=array_splice($parents,($page-1)*LINE,LINE);

    return $results;
}

function getPageNumber(){
    return $GLOBALS['pageNumber'];
}

/*点赞或取消赞*/
function supportOrUnsupport($id,$option){
    $status=getSupportStatus('support',$id);
    if($option=='yes'){
        $sql="update comments set support=support+1 where id_comment=".$id;

        if($status=='')
            setSupportStatus('support',$id);
        else if($status==0)
            updateSupportStatus('support',$id,$option);
    }
    else if($option=='no'){
        $sql="update comments set support=support-1 where id_comment=".$id;
        if($status==0)
            updateSupportStatus('support',$id,$option);

    }

    $GLOBALS['db']->query($sql);
    if(mysql_affected_rows()==1){
        return "success";
    }
    return "fail";
}

/*不喜欢或者喜欢*/
function setUnsupport($id,$option){
    $status=getSupportStatus('unsupport',$id);
    if($option=='yes'){
        $sql="update comments set unsupport=unsupport+1 where id_comment=".$id;
        if($status=='')
            setSupportStatus('unsupport',$id);
        else if($status==0)
            updateSupportStatus('unsupport',$id,$option);
    }
    else if($option=='no'){
        $sql="update comments set unsupport=unsupport-1 where id_comment=".$id;
        if($status==0)
            updateSupportStatus('unsupport',$id,$option);
    }

    $GLOBALS['db']->query($sql);
    if(mysql_affected_rows()==1){
        return "success";
    }
    return "fail";
}
/*获取是否已点赞*/
function getSupportStatus($option,$id){
    $user=$_SESSION['member'];
    if($option=='support'){
        $sql="select `like` from commentusers where user='".$user."' and id_comment=$id";
    }
    else{
        $sql="select `dislike` from commentusers where user='".$user."' and id_comment=$id";
    }
    $status=$GLOBALS['db']->getOne($sql);
    return $status;
}

function setSupportStatus($option,$id){
    $user=$_SESSION['member'];
    if($option=='support'){
        $sql="insert into commentusers(id_comment,user,`like`) values(".$id.",'".$user."',1)";
    }
    else{
        $sql="insert into commentusers(id_comment,user,`dislike`) values(".$id.",'".$user."',1)";
    }
    $GLOBALS['db']->query($sql);
}

function updateSupportStatus($option,$id,$addition){
    $user=$_SESSION['member'];
    if($option=='support'){
        if($addition=='yes')
            $sql="update commentusers set `like`=1 where id_comment=$id and user='".$user."'";
        else
            $sql="update commentusers set `like`=0 where id_comment=$id and user='".$user."'";
    }
    else{
        if($addition=='yes')
            $sql="update commentusers set `dislike`=1 where id_comment=$id and user='".$user."'";
        else
            $sql="update commentusers set `dislike`=0 where id_comment=$id and user='".$user."'";
    }
    $GLOBALS['db']->query($sql);
}

