<?php
session_start();
//ini_set("display_errors", 0);
//echo substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT'])); 
/**
 * Define document paths
 */
define('SERVER_ROOT' , dirname(__FILE__));
define('SITE_URL' , $_SERVER['HTTP_HOST'].'/');
require SERVER_ROOT.'/alanee_lib/config/conf.php';
require SERVER_ROOT.'/alanee_lib/config/router.php';
?>