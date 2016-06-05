<?php
require_once('config/config.php');
require_once("classes/Installation.php");

$install = new Installation();

if (isset($_POST["submitButton"])) {
	$install->createTables();
}

include_once("views/install.php");
?>