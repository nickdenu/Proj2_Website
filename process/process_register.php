<!DOCTYPE html>
<html lang="en">
<?php
var_dump($_POST);
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
	
	unset($_SESSION["error_register"]);
	
	if($_POST["passw"] != $_POST["cpassw"])
	{
		$_SESSION["error_register"] = "Your passwords do not match each other.";
	}
	
	while($row = $return->fetch_assoc())
	{
		if($row["uname"] == $_POST["uname"])
		{
			$_SESSION["error_register"] = "Username already in use.";
			break;
		}
		elseif($row["email"] == $_POST["email"])
		{
			$_SESSION["error_register"] = "Email address already associated with a profile.";
			break;
		}
	}
	if(isset($_SESSION["error_register"]))
	{
		header("Location: register.php");
	}
	else
	{
		$query_add_profile = "INSERT INTO `login`(`uname`, `passw`, `email`, `admin`, `sadmin`) VALUES (\"" . $_POST["uname"] . "\",\"" . $_POST["passw"] . "\",\"" . $_POST["email"] . "\",0,0)";
		echo $query_add_profile;
		if(! $return = $db->query($query_add_profile))
		{
			echo "Didn't add anything.";
		}
		$_SESSION["uname"] = $_POST["uname"];
		$_SESSION["loggedin"] = 1;
		header("Location: ../visible/home.php");
	}
	
	
	
?>
</html>
