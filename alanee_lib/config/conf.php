<?php
class Config {
	private static $conf;
	
	public static function doConfig() {
		$config_file = SERVER_ROOT.'/config/conf.ini';
		self::$conf = parse_ini_file($config_file,true);
	}
/**
 * 
 * Enter description here ...
 * @param unknown_type $confKey
 * @todo : needs to be refactored ... to allow multilevel configuration.
 */	
	public static function read($confKey) {
		$conf_val = self::$conf;
		$conf_key_arr = explode('.', trim($confKey));
		foreach ($conf_key_arr as $conf_key){
			$conf_val = $conf_val[$conf_key];
		}
		return $conf_val;
	}
	
	public static function write($confKey,$value) {
		$conf_val = &self::$conf;
		$conf_key_arr = explode('.', trim($confKey));
		foreach ($conf_key_arr as $conf_key){
			$conf_val = &$conf_val[$conf_key];
		}
	}
	
}
Config::doConfig();
require(SERVER_ROOT.'/alanee_lib/controller/alanee_core.php');
require(SERVER_ROOT.'/controller/alanee_controller.php');
require(SERVER_ROOT.'/alanee_lib/config/database.php');
require(SERVER_ROOT.'/alanee_lib/model/alanee_model.php');
require(SERVER_ROOT.'/alanee_lib/view/alanee_view.php');
/**
 * Class auto loader
 */
    class Autoloader {
    	private $classFolder = '';
        public function __construct($path='') {
        	$this->classFolder = $path;
            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) {
        	$classFile = SERVER_ROOT.'/'.$this->classFolder.'/'.strtolower($className).'_model.php';
           	include_once $classFile;
        }
        public function loadThisClass($classFile) {
        	include_once SERVER_ROOT.'/'.$classFile;
        }
    }

?>