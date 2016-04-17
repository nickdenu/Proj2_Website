<!DOCTYPE html>
<html lang="en">
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
	
	$query = "SELECT * from login";
	
	$return = $db->query($query);
	
	unset($_SESSION["error_login"]);
	
	while($row = $return->fetch_assoc())
	{
		if($row["uname"] == $_POST["uname"])
		{
			if($row["passw"] !== $_POST["passw"])
			{
				$_SESSION["error_login"] = "Incorrect username password combination.";
			}
			else
			{
				$_SESSION["uname"] = $_POST["uname"];
				$_SESSION["email"] = $row["email"];
				$_SESSION["loggedin"] = 1;
			}
			break;
		}
	}
	header("Location: ../visible/home.php");
	
	
?>
</html>
