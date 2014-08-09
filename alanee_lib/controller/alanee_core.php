<?php
/**
 * 
 * Core class for controller
 * Donot edit
 * @author shijo.thomas
 *
 */
class AlaneeCore {
	private $AddClasses = array();
	public $classes = array();
	protected $viewPath = null;
	protected $renderResultSet = array('pagetitle'=>'',
									   'status'=>1,
									   'message'=>'OK',
									   'result'=>'');
	private $View;
	public $js;
	public $css;
	private $controllername;
	private $action;
	private $params;
	protected $pageTitle;
	public $rootPath;
/**
 * 
 * @todo Add resultset assignments and data setting eg(Ok, Error, Set)
 */	
	/**
	 * 
	 * Constructor function
	 * @param String $controllername
	 * @param String $action
	 * @param Array $params
	 */
	public function AlaneeCore($controllername='',$action='',$params='') {
		$this->controllername = $controllername;
		$this->action = $action;
		$this->params = $params;
		$appPath = Config::read('appication_path') != '' ? trim(Config::read('appication_path'),'/').'/' : '';
		$this->rootPath = '//'.SITE_URL.$appPath;
		$this->View = new AlaneeView(Router::$viewPath,Router::$view);
		$this->View->setJs($this->js);
		$this->View->setCss($this->css);
		$this->View->setRootPath($this->rootPath);
		if (count($this->classes)>0) {
			foreach ($this->classes as $rwClasses) {
				$this->AddClasses[] = $rwClasses;
			}
		}	
		$autoloader = new Autoloader('modal');
		foreach ($this->AddClasses as $adtClass) {
			$autoloader->loadThisClass($adtClass);
		}
		if ($this->viewPath != null) {
			$this->View->setViewPath($this->viewPath);
		}

	}
	/**
	 * 
	 * Handle error 404
	 * @param String $method
	 * @param Array $params
	 */
	public function __call($method,$params){
		/**
		 * @todo: Error page handling 404
		 */
		exit("No handler function exists...");
	}
	/**
	 * 
	 * Set a view template. By default template name will be 'default'
	 * @param String $templateFile
	 */
	public function setTemplate($templateFile = null) {
		if($templateFile != null)
			$this->View->setTemplateFile($templateFile);		
	}
	/**
	 * 
	 * Set a view path. By default view path will be view/{controlername}/{action}.php
	 * @param String $path
	 */
	public function setViewPath($path) {
		$this->View->setViewPath($path);
	}
	/**
	 * 
	 * Render a view file. If no view file name is given,  default view file name will be name of the action function
	 * @param String $viewFile
	 */
	public function renderView($viewFile = null) { 
		if($viewFile != null)
			$this->View->setViewFile($viewFile);
		$this->View->setPageTitle($this->pageTitle);
		$this->View->render($this->renderResultSet,$this->controllername,$this->action,$this->params);		
	}
	/**
	 * 
	 * Render a AJAX view
	 * @param String $type
	 */
	public function renderAjax($type) {
		$this->View->renderAjax($type,$this->renderResultSet,$this->controllername,$this->action,$this->params);
	}
	/**
	 * 
	 * A redirection function for header redirection.
	 * @param String $page
	 * @param Boolean $considerPrefix
	 */
	public function redirect($page,$considerPrefix = false){
		$prefix = $considerPrefix == true ? Router::$prefix.'/' : '';
		$appPath = Config::read('appication_path');
		$appPath = $appPath == '' ? '' : $appPath.'/';
		if (is_array($page)) {
			$prefix = array_key_exists('prefix', $page) ? $page['prefix'].'/' : '';
			$controller = array_key_exists('controller', $page) ? $page['controller'].'/' : 'home/';
			$action = array_key_exists('action', $page) ? $page['action'].'/' : 'index/';
			if(array_key_exists('params', $page)) {
				$params = is_array($page['params']) ? implode('/', $page['params']) : $page['params'];
			}else {
				$params = '';
			}
			header("location: /".$appPath.$prefix.$controller.$action.$params);
		} else{
			header("location: /".$appPath.$prefix.ltrim($page,'/'));
		}
	}
	/**
	 * 
	 * A redirection function for header redirection. This function will support redirection to urls outside the framework.
	 * @param String $url
	 */	
	public function fullRedirect($url){
		header("location: ".$url);
	}
	/**
	 * 
	 * Returns a fully qualifies http url according to the parameter $link. $link can be given as String or Array
	 * @param Mixed $link
	 * @param Boolean $isprefix
	 */
	public function url($link,$isprefix=false) {
		$prefix = $isprefix == true ? Router::$prefix!='' ? Router::$prefix.'/' : '' : '';
		$appPath = Config::read('appication_path');
		$appPath = $appPath == '' ? '' : $appPath.'/';
		if(is_array($link)) {
			$prefix = array_key_exists('prefix', $link) ? $link['prefix'].'/' : '';
			$controller = array_key_exists('controller', $link) ? $link['controller'].'/' : 'home/';
			$action = array_key_exists('action', $link) ? $link['action'].'/' : 'index/';
			if(array_key_exists('params', $link)) {
				$params = is_array($link['params']) ? implode('/', $link['params']) : $link['params'];
			}else {
				$params = '';
			}
			return '//'.SITE_URL.$appPath.$prefix.$controller.$action.$params;
		} else{
			return '//'.SITE_URL.$appPath.$prefix.ltrim($link,'/');
		}		
	}
	/**
	 * 
	 * This function sets a flash message in session. this flash message can be retrived by getFlashMessage() function in View.
	 * @param String $message
	 */
	public function setFlashMessage($message=null) {
		if($message != null) {
			$_SESSION['alanee_flashmessage'] = $message;
		}
	}
	
}


?>