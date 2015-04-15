<?php
require(SERVER_ROOT.'/config/routes.ini');
class Router {
	public static $controllerFile;
	public static $controllerClass;
	public static $controllerName;
	public static $action;
	public static $params;
	public static $query_array;
	public static $viewPath;
	public static $view;
	public static $prefix;
	
	public static function doRoute($in_request,$routes,$prefixes) {
		parse_str($in_request,$request);
		//list($param , $url) = split('=' , $request);
		$url = trim($request['url'],'/');
		unset($request['url']);
		$parsed = explode('/' , $url);
		$page_prefix = '';		
		$page = array_shift($parsed);
		if(in_array($page, $prefixes)) {
			$page_prefix = $page;
			$page = array_shift($parsed);
		}
		$action = array_shift($parsed);
		if($action =='') {
			$action = 'index';
		}
		if($page_prefix != '') {
			$action = $page_prefix.'_'.$action;
		}
		if(array_key_exists($page, $routes)) {
			if(array_key_exists($action, $routes[$page])) {
				$action = $routes[$page][$action]['action'];
				$page = $routes[$page][$action]['controller'];
			}elseif(array_key_exists('*', $routes[$page])) {
				$action = $routes[$page]['*']['action'];
				$page = $routes[$page]['*']['controller'];
			}
		}
		if($page =='') {
			$page = 'home';
		}
		self::$controllerFile = SERVER_ROOT . '/controller/'.$page. '_controller.php';
		self::$controllerClass = ucfirst($page).'Controller';
		self::$controllerName = $page;
		self::$action = $action;
		self::$params = $parsed;
		self::$query_array = $request;
		self::$viewPath = strtolower($page);
		self::$view = $action;
		self::$prefix = $page_prefix;
	}
	public static function redirect($routeParams) {
		
	}
	
}
/*
echo '<pre>';
print_r($_SERVER);
exit;
*/
$request = $_SERVER['QUERY_STRING'];
if(empty($request)) {
	$request = 'url=home/index';
}
Router::doRoute($request,$routes,$prefixes);

if (file_exists(Router::$controllerFile))
{
	include_once(Router::$controllerFile);
	$controllerCls = Router::$controllerClass;
	if (class_exists($controllerCls))
	{
		$controller = new $controllerCls(Router::$controllerName, Router::$action, Router::$params);
	}
	else
	{
		//did we name our class correctly?
		die('controller class does not exist!');
	}

}
else
{
	//can't find the file in 'controllers'! 
	die('page does not exist!');
}

//once we have the controller instantiated, execute the default function
//pass any GET varaibles to the main method
$action = Router::$action;
$params = Router::$params;
$query = Router::$query_array;
$controller->$action($params,$query);
?>