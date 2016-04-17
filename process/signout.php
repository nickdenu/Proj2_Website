<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	unset($_SESSION["uname"]);
	unset($_SESSION["passw"]);
	unset($_SESSION["loggedin"]);
	$temp_location = "Location: ../visible/" . $_SESSION["currpage"];
	header($temp_location);
?>