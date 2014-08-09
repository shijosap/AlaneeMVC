<?php
/**
 * 
 * Database core class ...
 * Donot edit
 * @author shijo.thomas
 *
 */
class AlaneeDb {
	private $host;
	private $database;
	private $user;
	private $password;
	public $dbCon;
	public function AlaneeDb() {
		$db_config_file = SERVER_ROOT.'/config/database.ini';
		$dbVals = parse_ini_file($db_config_file,true);
		$config = $dbVals[Config::read('environment')];
		$this->host = $config['host'];
		$this->database = $config['database'];
		$this->user = $config['user'];
		$this->password = $config['password'];
	}
	/**
	 * 
	 * To create a connection. This function returns database connection object
	 */
	public function getConnection() {
		$this->dbCon = new mysqli($this->host,$this->user,$this->password,$this->database);
		return $this->dbCon;
	}
	/**
	 * 
	 * Closes a existing database connection
	 */
	public function closeConnection() {
		$this->dbCon->close();		
	}
	
}
?>