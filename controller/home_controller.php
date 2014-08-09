<?php
class HomeController extends AlaneeController {
	public $classes = array('alanee_classes/common/alaneecommon_class.php');
	public function index() {
		$this->pageTitle = "Alanee MVC";

		$this->renderView();
	}
	
	public function admin_index() {
		$this->renderView();
	}
	
}

?>