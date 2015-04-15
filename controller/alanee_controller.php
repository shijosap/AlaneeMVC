<?php
class AlaneeController extends AlaneeCore {
	public $httpsRootPath;
	
	public function AlaneeController($controllername='',$action='',$params=''){
		parent::AlaneeCore($controllername,$action,$params);
		$this->httpsRootPath = 'https:'.$this->rootPath;
	}
	
	public function populateLeftMenuLinks() {
		$postCategory = new postCategory();
		$categories = $postCategory->getAllCategory();
		$navigation = new Navigation();
		$left_menu = $navigation->createLeftNavigation($categories);
		$this->renderResultSet['result']['category']['menu'] = $left_menu;
	}
	
	public function isUserLoggedIn() {
		if(isset($_SESSION['user']) && $_SESSION['user']['id'] > 0) {
			return true;
		}else{
			return false;
		}
	}
	
	
}


?>