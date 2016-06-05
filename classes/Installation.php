<?php
require_once("classes/Database.php");

class Installation {
	private $db = null;
	private $pdo = null;

	public function __construct() {
		$this->db = Database::getInstance();
		$this->pdo = $this->db->getConnection();
	}

	public function isTableExists($table) {
		try {
			$result = $this->pdo->query("SELECT 1 FROM $table LIMIT 1");
		} catch (Exception $e) {
			return false;
		}

		return $result != false;
	}

	public function showTableStatus($table) {
		echo '<tr>';
		if ($this->isTableExists($table)) {
			echo '<td>'. $table .'</td>
				  <td class="text-center"><span class="glyphicon glyphicon-ok text-success"></span></td>';
		} else {
			echo '<td>'. $table .'</td>
				  <td class="text-center"><span class="glyphicon glyphicon-remove text-danger"></span></td>';
		}
		echo '</tr>';
	}

	public function createTables() {
		$sql = "CREATE TABLE IF NOT EXISTS users (
					id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					firstname VARCHAR(32) NOT NULL,
					lastname VARCHAR(32) NOT NULL,
					nickname VARCHAR(32) NOT NULL,
					email VARCHAR(64) NOT NULL,
					password VARCHAR(64) NOT NULL,
					birthday DATE NOT NULL,
					gender ENUM('male', 'female', 'other')
				);";

		$this->pdo->exec($sql);
	}
}
?>