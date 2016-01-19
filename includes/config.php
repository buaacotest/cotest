<?php
/*  定义服务器的绝对路径  */
define('BASE_PATH','.');
/*  定义Smarty目录的绝地你路径  */
define('SMARTY_PATH','/Smarty/');/*test 是项目名字*/

/*  加载Smarty类库文件    */
require BASE_PATH . SMARTY_PATH . 'Smarty.class.php';
/*  实例化一个Smarty对象  */

$smarty = new Smarty;
/*  定义各个目录的路径    */
$smarty->template_dir = BASE_PATH.SMARTY_PATH.'templates/';
$smarty->compile_dir = BASE_PATH.SMARTY_PATH.'templates_c/';
$smarty->config_dir = BASE_PATH.SMARTY_PATH.'configs/';
$smarty->cache_dir = BASE_PATH.SMARTY_PATH.'cache/';
?>