<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
		<title><?= isset($PageTitle) ? $PageTitle : "HKGSE"?></title>
		<?php if (function_exists("customPageHeader")) customPageHeader(); ?>
	</head>
	<body>