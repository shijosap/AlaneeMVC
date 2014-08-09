<?php
/**
 * 
 * Core configuration class for AlaneeMVC
 * Donot edit this file
 * @author shijo.thomas
 *
 */
class Config {
	private static $conf;
	
	public static function doConfig() {
		$config_file = SERVER_ROOT.'/config/conf.ini';
		self::$conf = parse_ini_file($config_file,true);
	}
/**
 * 
 * Reading a configuration item ...
 * @param String $confKey
 */	
	public static function read($confKey) {
		$conf_val = self::$conf;
		$conf_key_arr = explode('.', trim($confKey));
		foreach ($conf_key_arr as $conf_key){
			$conf_val = $conf_val[$conf_key];
		}
		return $conf_val;
	}
/**
 * 
 * writing a configuration item ...
 * @param String $confKey
 * @param String $value
 */		
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
require(SERVER_ROOT.'/alanee_lib/modal/alanee_modal.php');
require(SERVER_ROOT.'/alanee_lib/view/alanee_view.php');

/**
 * 
 * Autoloader class.
 * @author shijo.thomas
 *
 */
    class Autoloader {
    	private $classFolder = '';
        public function __construct($path='') {
        	$this->classFolder = $path;
            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) {
            require SERVER_ROOT.'/'.$this->classFolder.'/'.strtolower($className).'_modal.php';
        }
        public function loadThisClass($classFile) {
        	require SERVER_ROOT.'/'.$classFile;
        }
    }

?>