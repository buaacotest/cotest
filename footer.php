<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/4/17
 * Time: 15:22
 */

require('./lang/'.$_SESSION['lang'].'/common.php');
$s = new Smarty;
/*  定义各个目录的路径    */
$s->template_dir = BASE_PATH.SMARTY_PATH.'templates/';
$s->compile_dir = BASE_PATH.SMARTY_PATH.'templates_c/';
$s->config_dir = BASE_PATH.SMARTY_PATH.'configs/';
$s->cache_dir = BASE_PATH.SMARTY_PATH.'cache/';

/*  定义定界符  */
$s->left_delimiter = '<{';
$s->right_delimiter = '}>';
$s->assign('lang',$_LANG);
if(isMobile())
    $s->display('footer_m.tpl');
else
    $s->display('footer.tpl');
