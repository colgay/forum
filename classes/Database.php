<?php
class Database {
	private $connection;
	private static $instance; //The single instance
	private $host = CONFIG["dbHost"];
	private $username = CONFIG["dbUser"];
	private $password = CONFIG["dbPass"];
	private $database = CONFIG["dbName"];

	public static function getInstance() {
		if(!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {
		$this->connect();
	}

	public function connect() {
		try {
			$this->connection = new PDO("mysql:host=". $this->host .";dbname=". $this->database .";charset=utf8", $this->username, $this->password);
		} catch(PDOException $e) {
			die("Failed to connect to MySQL: " . $e->getMessage());
		}
	}

	private function __clone() {}

	public function getConnection() {
		return $this->connection;
	}
}
?>