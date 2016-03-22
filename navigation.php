<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/22
 * Time: 16:07
 */
$smarty->assign('user',$_SESSION['member']);
$smarty->display("navigation.tpl");