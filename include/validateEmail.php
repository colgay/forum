<?php
require_once("../config/config.php");
require_once("../classes/Database.php");

if (!empty($_POST["email"])) {
	$db = Database::getInstance();
	$pdo = $db->getConnection();
	$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
	$stmt->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
	$stmt->execute();

	if ($stmt->fetchColumn() == 0) {
		echo "true";
	} else {
		echo "false";
	}
	
} else {
	echo "false";
}
?>