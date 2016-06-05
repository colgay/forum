<?php

class Registration {
	private $db = null;
	private $pdo = null;

	public function __construct() {
		$this->db = Database::getInstance();
		$this->pdo = $this->db->getConnection();

		if (isset($_POST["register"])) {
			registerUser($_POST["email"], $_POST["firstname"], $_POST["lastname"], $_POST["nickname"], 
				$_POST["password"], $_POST["birthday"], $_POST["gender"]);
		}
	}


}

?>