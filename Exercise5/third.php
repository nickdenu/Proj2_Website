<!doctype html>
<html>
	<head>
		<title>Exercise 5</title>
		<link href="ex5.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "denu";
		
		$db = mysqli_connect($servername, $username, $password, $dbname);
		
		if (mysqli_connect_errno())
		{
			echo 'Connection failed: ' . $db->connect_error;
		}
		
		$sql = "SELECT `LName`, `FName` FROM `people` WHERE 1";
		$names = mysqli_query($db,$sql);
		$found = FALSE;
		if ($names)
		{	
			while ($result = mysqli_fetch_row($names))
			{
				if (! strcmp(rtrim($result[0]), $_POST["LName"]) && ! strcmp(rtrim($result[1]), $_POST["FName"]))
				{
					$found = TRUE;
				}
			}
		}
		if (! $found)
		{
			$insert = "INSERT INTO `people` (`LName`, `FName`) VALUES ('" . $_POST["LName"] . "', '" . $_POST["FName"] ."')";
			$names = mysqli_query($db,$insert);
			
		}
		else
		{
			echo "It's already in there idiot.<br/>";
		}
		$names = mysqli_query($db,$sql);
			while($result = mysqli_fetch_row($names))
			{
				print_r("First Name: " . $result[1] . "<br/>Last Name: " . $result[0] . "<br/><br/>");
			}
		print_r("Add Another : <br/><br/>");
		
		$db->close();
	?>
		<form method="POST">
			<input type="text" placeholder="Firstname" name="FName">
			<input type="text" placeholder="Lastname" name="LName">
			<input type="submit" value="Submit">
		</form>
	</body>
</html>