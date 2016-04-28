<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	
	$db = new mysqli("localhost","root","","denu");
	
	if ($db->connect_error)
	{
		echo 'Connection failed: ' . $db->connect_error;
	}
	date_default_timezone_set("America/New_York");
	$query = "INSERT INTO `entries`(`header`, `image`, `body`, `tags`, `author`) VALUES (\"" . $_POST["header"] . "\",\"".$_POST["image"]."\",\"".$_POST["content"]."\",\"" . $_POST["tags"] . "\",\"" . $_SESSION["uname"] . "\")";
	if(! $return = $db->query($query))
		{
			echo $db->error;
		}
	header("Location: ../visible/posts.php");
?>