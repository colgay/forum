<?php
if (!empty($_POST["birthday"])) {
	$end = new DateTime("now");
	$start = new DateTime("now");
	$start->modify("-130 years");
	$date = DateTime::createFromFormat("Y/m/d", $_POST["birthday"]);

	if ($date >= $start && $date <= $end) {
		echo "true";
	} else {
		echo "false";
	}
} else {
	echo "false";
}
?>