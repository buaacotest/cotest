<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/1/25
 * Time: 20:57
 */

/************************************************************增加新闻***********************************************************/
/*添加一条Testprogramme
 * @title:标题
 * @content:内容
 * @date:时间，格式"YY-MM-DD"
 * @product:文章描述产品分类
 * */
function addTestprogramme($title,$content,$date,$product)
{
    $sql="INSERT INTO `cotestcms`.`testprogramme` (`title`, `content`, `date`, `product`) VALUES ( \"".$title."\", \"".$content."\", \"".$date."\" ,\"".$product."\")";
    $result = $GLOBALS['db']->query($sql);
    return $result;
}

/*添加一条Testreports*/
function addTestreport($title,$content,$date,$product)
{
    $sql="INSERT INTO `cotestcms`.`testreports` (`title`, `content`, `date`, `product`) VALUES ( \"".$title."\", \"".$content."\", \"".$date."\" ,\"".$product."\")";
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
    //echo $sql;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

/*通过id删除1条testprogramme*/
function deleteTestreportByID($id)
{
   $sql="DELETE FROM `cotestcms`.`testreports` WHERE `id` = ".$id;
   //echo $sql;
   $result=$GLOBALS['db']->query($sql);
   return $result;
}
/*通过id删除1条testprogramme*/
function deleteCotestreportByID($id)
{
   $sql="DELETE FROM `cotestcms`.`cotestreports` WHERE `id` = ".$id;
    //echo $sql;
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
function updateTestprogramme($id,$title,$content,$date,$product)
{
    $sql="UPDATE `cotestcms`.`testprogramme` SET `title` = \"".$title."\", `content` = \"".$content."\",`date` = \"".$date."\",`product` = \"".$product."\" WHERE `id` = ".$id;
    $result=$GLOBALS['db']->query($sql);
    return $result;
}

function updateTestreports($id,$title,$content,$date,$product)
{
    $sql="UPDATE `cotestcms`.`testreports` SET `title` = \"".$title."\", `content` = \"".$content."\",`date` = \"".$date."\",`product` = \"".$product."\" WHERE `id` = ".$id;
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
    $sql="SELECT * FROM cotestcms.testprogramme where id=".$id;
    $result=$GLOBALS['db']->getOneRow($sql);
    return $result;
}
/*根据title查询一篇testprogramme新闻*/
function getOneTestprogrammeByTitle($title)
{

    $sql="SELECT * FROM cotestcms.testprogramme where `title`=\"".$title."\"";
    $result=$GLOBALS['db']->getOneRow($sql);
    return $result;
}
/*查询所有时间在$date之内的testprogramme新闻*/
function getTestprogrammesBeforeDate($date)
{
    $sql="SELECT * FROM cotestcms.testprogramme where `date`<=''".$date."''";
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有时间在$date之后的testprogramme新闻*/
function getTestprogrammesAfterDate($date)
{
    $sql="SELECT * FROM cotestcms.testprogramme where `date`>''".$date."''";
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有product为$product的testprogramme新闻,默认按最新排序*/
function getTestprogrammesByCategory($product,$datedesc=true)
{
    if($datedesc){
        $sql="SELECT * FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date desc";
    }
    else{
        $sql="SELECT * FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date";
    }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有testprogramme新闻,默认按date从最近的开始排序*/
function getTestprogrammesAll($datedesc=true){
    if($datedesc){
        $sql="SELECT * FROM cotestcms.testprogramme order by date desc";
    }else{
        $sql="SELECT * FROM cotestcms.testprogramme order by date";
    }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*
 * 分页查找products的testprogramme新闻
 * 如果products为空,表示查询所有
 * 默认按date从最近的开始排序
 * pageNumber：页号
 * nPagePer:每页最多的条数
 * */
function getTestprogrammeOnePage($pageNumber,$nPagePer,$datedesc=true,$product=""){
    $start=($pageNumber-1)*$nPagePer;
    $limitN=$nPagePer;
    if(empty($product)||is_null($product)){
        if($datedesc){
            $sql="SELECT * FROM cotestcms.testprogramme order by date desc limit ".$start." ,".$limitN;
        }else{
            $sql="SELECT * FROM cotestcms.testprogramme order by date limit ".$start." ,".$limitN;
        }
    }else{
        if($datedesc){
            $sql="SELECT * FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date desc limit ".$start." ,".$limitN;
        }else{
            $sql="SELECT * FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date limit ".$start." ,".$limitN;
        }
    }
    //echo $sql;
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}



/*根据id查询一篇testreports新闻*/
function getOneTestreportByID($id)
{
    $sql="SELECT * FROM cotestcms.testreports where id=".$id;
    $result=$GLOBALS['db']->getOneRow($sql);
    return $result;
}
/*根据title查询一篇testreports新闻*/
function getOneTestreportByTitle($title)
{
    $sql="SELECT * FROM cotestcms.testreports where `title`=\"".$title."\"";
    $result=$GLOBALS['db']->getOneRow($sql);
    return $result;
}
/*查询所有时间在$date之内的testreports新闻*/
function getTestreportsBeforeDate($date)
{
    $sql="SELECT * FROM cotestcms.testreports where `date`<=''".$date."''";
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有时间在$date之后的testreports新闻*/
function getTestreportsAfterDate($date)
{
    $sql="SELECT * FROM cotestcms.testreports where `date`>''".$date."''";
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有product为$product的testreports新闻,默认按最新排序*/
function getTestreportsByCategory($product,$datedesc=true)
{
    if($datedesc){
        $sql="SELECT * FROM cotestcms.testreports where `product`=\"".$product."\" order by date desc";
    }
    else{
        $sql="SELECT * FROM cotestcms.testreports where `product`=\"".$product."\" order by date";
    }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有testreport新闻,默认按date从最近的开始排序*/
function getTestreportsAll($datedesc=true){
    if($datedesc){
        $sql="SELECT * FROM cotestcms.testreports order by date desc";
    }else{
        $sql="SELECT * FROM cotestcms.testreports order by date";
    }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}


/*
 * 分页查找products的testreport新闻
 * @products:为空,表示查询所有
 * @datedesc:默认按date从最近的开始排序
 * @pageNumber:页号
 * @nPagePer:每页最多的条数
 * */
function getTestreportsOnePage($pageNumber,$nPagePer,$datedesc=true,$product=""){
    $start=($pageNumber-1)*$nPagePer;
    $limitN=$nPagePer;
    if(empty($product)||is_null($product)){
        if($datedesc){
            $sql="SELECT * FROM cotestcms.testreports order by date desc limit ".$start." ,".$limitN;
        }else{
            $sql="SELECT * FROM cotestcms.testreports order by date limit ".$start." ,".$limitN;
        }
    }else{
        if($datedesc){
            $sql="SELECT * FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date desc limit ".$start." ,".$limitN;
        }else{
            $sql="SELECT * FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date limit ".$start." ,".$limitN;
        }
    }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}




/*根据id查询一篇cotestreports新闻*/
function getOneCotestreportByID($id)
{
    $sql="SELECT * FROM cotestcms.cotestreports where id=".$id;
    $result=$GLOBALS['db']->getOneRow($sql);
    return $result;
}
/*根据title查询一篇cotestreports新闻*/
function getOneCotestreportByTitle($title)
{
    $sql="SELECT * FROM cotestcms.cotestreports where `title`=\"".$title."\"";
    $result=$GLOBALS['db']->getOneRow($sql);
    return $result;
}
/*查询所有时间在$date之内的cotestreports新闻*/
function getCotestreportsBeforeDate($date)
{
    $sql="SELECT * FROM cotestcms.cotestreports where `date`<=''".$date."''";
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}
/*查询所有时间在$date之后的testreports新闻*/
function getCotestreportsAfterDate($date)
{
    $sql="SELECT * FROM cotestcms.cotestreports where `date`>''".$date."''";
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}

/*查询所有cotestreports新闻,默认按date从最近的开始排序*/
function getCotestreportsAll($datedesc=true){
    if($datedesc){
        $sql="SELECT * FROM cotestcms.cotestreports order by date desc";
    }else{
        $sql="SELECT * FROM cotestcms.cotestreports order by date";
    }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}

function getCotestreportsOnePage($pageNumber,$nPagePer,$datedesc=true){
    $start=($pageNumber-1)*$nPagePer;
    $limitN=$nPagePer;
    if($datedesc){
            $sql="SELECT * FROM cotestcms.cotestreports order by date desc limit ".$start." ,".$limitN;
    }else{
            $sql="SELECT * FROM cotestcms.cotestreports order by date limit ".$start." ,".$limitN;
        }
    $result=$GLOBALS['db']->getAll($sql);
    return $result;
}


/************************************************************其他功能函数***********************************************************/
/*
 * 得到所有的productsx小类
 * */
function getProductsNames()
{
    $result=$GLOBALS['db']->getAllDBnames();
    return $result;
}
/*
 *获得testprogramme总页数，perPage表示每页的页数，products表示筛选的分类预留项，默认为null（因为现在暂时都不分类显示）
 * */
function getTestprogrammeTotalPage($perPage,$datedesc=true,$products=null)
{
    $totalpage=0;
    if(empty($product)||is_null($product)){////默认不分类显示
        if($datedesc){
            $sql="SELECT count(*) FROM cotestcms.testprogramme order by date desc";
        }else{
            $sql="SELECT count(*) FROM cotestcms.testprogramme order by date";
        }

        $result=$GLOBALS['db']->getOne($sql);
        if(!empty($result)){
            $moditem=$result%$perPage;
            $totalpage=floor($result/$perPage);
            if ($moditem!=0){
                $totalpage+=1;
            }
        }else{
            $totalpage=0;
        }
    }else{
        /////添加查找在products分类里的语句,以下代码可能需要重构
        $itemcount=0;
        foreach($products as $product){
            $sql="SELECT count(*) FROM cotestcms.testprogramme where `product`=\"".$product."\" order by date";
            $temp=$GLOBALS['db']->getOne($sql);
            if(!empty($temp)){
                $itemcount+=$temp;
            }
        }
        $moditem=$itemcount%$perPage;
        $totalpage=floor($itemcount/$perPage);
        if($moditem!=0){
            $totalpage+=1;
        }
    }
    return $totalpage;
}
/*
 *获得testreports总页数
 * @perPage:表示每页的页数
 * @products:表示分类，默认为null（因为现在暂时都不分类显示）
 * @datedesc:是否
 * */
function getTestreportsTotalPage($perPage,$datedesc=true,$products=null)
{
    $totalpage=0;
    if(empty($product)||is_null($product)){////默认不分类显示
        if($datedesc){
            $sql="SELECT count(*) FROM cotestcms.testreports order by date desc";
        }else{
            $sql="SELECT count(*) FROM cotestcms.testreports order by date";
        }

        $result=$GLOBALS['db']->getOne($sql);
        if(!empty($result)){
            $moditem=$result%$perPage;
            $totalpage=floor($result/$perPage);
            if ($moditem!=0){
                $totalpage+=1;
            }
        }else{
            $totalpage=0;
        }
    }else{
        /////添加查找在products分类里的语句,以下代码可能需要重构
        $itemcount=0;
        foreach($products as $product){
            $sql="SELECT count(*) FROM cotestcms.testreports where `product`=\"".$product."\" order by date";
            $temp=$GLOBALS['db']->getOne($sql);
            if(!empty($temp)){
                $itemcount+=$temp;
            }
        }
        $moditem=$itemcount%$perPage;
        $totalpage=floor($itemcount/$perPage);
        if($moditem!=0){
            $totalpage+=1;
        }
    }
    return $totalpage;
}
/*
 *获得cotestreports总页数，perPage表示每页的页数，datedesc默认按时间从近到远
 * */
function getCotestreportsTotalPage($perPage,$datedesc=true)
{
    $totalpage=0;
        if($datedesc){
            $sql="SELECT count(*) FROM cotestcms.cotestreports order by date desc";
        }else{
            $sql="SELECT count(*) FROM cotestcms.cotestreports order by date";
        }

        $result=$GLOBALS['db']->getOne($sql);
        if(!empty($result)){
            $moditem=$result%$perPage;
            $totalpage=floor($result/$perPage);
            if ($moditem!=0){
                $totalpage+=1;
            }
        }else{
            $totalpage=0;
        }
    return $totalpage;
}

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