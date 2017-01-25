<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/1/25
 * Time: 20:57
 */

/************************************************************增加新闻***********************************************************/
/*添加一条Testprogramme*/
function addTestprogramme($title,$content,$date,$category)
{
    $sql="INSERT INTO `cotestcms`.`testprogramme` (`title`, `content`, `date`, `category`) VALUES ( \"".$title."\", \"".$content."\", \"".$date."\" ,\"".$category."\")";
    $result = $GLOBALS['db']->query($sql);
    return $result;
}

/*添加一条Testreports*/
function addTestreport($title,$content,$date,$category)
{
    $sql="INSERT INTO `cotestcms`.`testreports` (`title`, `content`, `date`, `category`) VALUES ( \"".$title."\", \"".$content."\", \"".$date."\" ,\"".$category."\")";
    $result = $GLOBALS['db']->query($sql);
    return $result;
}
/*添加一条Cotestreports*/
function addCotestreport($title,$content,$date)
{
    $sql="INSERT INTO `cotestcms`.`cotestreports` (`title`, `content`, `date`) VALUES ( \"".$title."\", \"".$content."\", \"".$date."\")";
    //echo $sql;
    $result = $GLOBALS['db']->query($sql);
    return $result;
}

/************************************************************删除新闻***********************************************************/
function deleteTestprogrammeByID($id)
{

    $sql="DELETE FROM `cotestcms`.`testprogramme` WHERE `id` = ".$id;
    $result=$GLOBALS['db']->query($sql);

}

/*通过id删除1条testprogramme*/
function deleteTestreportByID($id)
{
   $sql="DELETE FROM `cotestcms`.`testreports` WHERE `id` = ".$id;
   $result=$GLOBALS['db']->query($sql);
}
/*通过id删除1条testprogramme*/
function deleteCotestreportByID($id)
{
   $sql="DELETE FROM `cotestcms`.`cotestreports` WHERE `id` = ".$id;
   $result=$GLOBALS['db']->query($sql);
    return $result;
}

/*通过title删除一条testprogramme*/
function deleteTestprogrammeByTitle($title)
{
    $sql="DELETE FROM `cotestcms`.`testprogramme` WHERE `title` = \"".$title."\"";
    //echo $sql;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

/*通过title删除一条testreport*/
function deleteTestreportByTitle($title)
{
    $sql="DELETE FROM `cotestcms`.`testreports` WHERE `title` = \"".$title."\"";
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

/*通过title删除一条cotestreport*/
function deleteCotestreportByTitle($title)
{
    $sql="DELETE FROM `cotestcms`.`cotestreports` WHERE `title` = \"".$title."\"";
    //echo $sql;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}



/*通过id删除多条testprogramme*/
function deleteTestprogrammeByIDs($ids)
{
    $flag=1;
    foreach ($ids as $id){
        $sql="DELETE FROM `cotestcms`.`testprogramme` WHERE `id` = ".$id;
        $result=$GLOBALS['db']->query($sql);
        if($result!=1){
            $flag=0;
        }
    }
    return $flag;
}

/*通过id删除多条testreports*/
function deleteTestreportByIDs($ids)
{
    $flag=1;
    foreach ($ids as $id){
        $sql="DELETE FROM `cotestcms`.`testreports` WHERE `id` = ".$id;
        $result=$GLOBALS['db']->query($sql);
        if($result!=1){
            $flag=0;
        }
    }
    return $flag;
}
/*通过id删除多条cotestreports*/
function deleteCotestreportByIDs($ids)
{
    $flag=1;
    foreach ($ids as $id){
        $sql="DELETE FROM `cotestcms`.`cotestreports` WHERE `id` = ".$id;
        $result=$GLOBALS['db']->query($sql);
        if($result!=1){
            $flag=0;
        }
    }
    return $flag;
}

/************************************************************修改新闻***********************************************************/
function updateTestprogramme($id,$title,$content,$date,$category)
{
    $sql="UPDATE `cotestcms`.`testprogramme` SET `title` = \"".$title."\", `content` = \"".$content."\",`date` = \"".$date."\",`category` = \"".$category."\" WHERE `id` = ".$id;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

function updateTestreports($id,$title,$content,$date,$category)
{
    $sql="UPDATE `cotestcms`.`testreports` SET `title` = \"".$title."\", `content` = \"".$content."\",`date` = \"".$date."\",`category` = \"".$category."\" WHERE `id` = ".$id;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

function updateCotestreports($id,$title,$content,$date)
{
    $sql="UPDATE `cotestcms`.`cotestreports` SET `title` = \"".$title."\", `content` = \"".$content."\",`date` = \"".$date."\" WHERE `id` = ".$id;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

/************************************************************查询新闻***********************************************************/
/*根据id查询一篇testprogramme新闻*/
function getOneTestprogrammeByID($id)
{

}
/*根据title查询一篇testprogramme新闻*/
function getOneTestprogrammeByTitle($title)
{

}
/*查询所有时间在$date之前的testprogramme新闻*/
function getTestprogrammesBeforeData($date)
{

}
/*查询所有时间在$date之后的testprogramme新闻*/
function getTestprogrammesAfterDate($date)
{

}
/*查询所有category为$category的testprogramme新闻*/
/*查询所有testprogramme新闻,按date从最近的开始排序*/
/*查询所有testprogramme新闻，按date从最远的开始排序*/



/************************************************************其他功能函数***********************************************************/
/*重新将testprogramme的ID从1排序，因为在多次添加删除了中间的某篇文章后，可能id会乱*/
function updateTestprogrammeIDs()
{
    $sql="alter table cotestcms.testprogramme AUTO_INCREMENT= 1";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.testprogramme drop id";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.testprogramme add id int(11) not null first";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.testprogramme modify column id int(11) not null auto_increment, add primary key (id)";
    $result = $GLOBALS['db']->query($sql);
    return $result;
}

/*重新将testreports的ID从1排序，因为在多次添加删除了中间的某篇文章后，可能id会乱*/
function updateTestreportsIDs()
{
    $sql="alter table cotestcms.testreports AUTO_INCREMENT= 1";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.testreports drop id";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.testreports add id int(11) not null first";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.testreports modify column id int(11) not null auto_increment, add primary key (id)";
    $result = $GLOBALS['db']->query($sql);
    return $result;
}

/*重新将cotestreports的ID从1排序，因为在多次添加删除了中间的某篇文章后，可能id会乱*/
function updateCotestreportsIDs()
{
    $sql="alter table cotestcms.cotestreports AUTO_INCREMENT= 1";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.cotestreports drop id";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.cotestreports add id int(11) not null first";
    $result = $GLOBALS['db']->query($sql);
    $sql="alter table cotestcms.cotestreports modify column id int(11) not null auto_increment, add primary key (id)";
    $result = $GLOBALS['db']->query($sql);
    return $result;
}