<!doctype html>
<html>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "denu";
		
		$db = new mysqli($servername, $username, $password, $dbname);
		
		if ($db->connect_error)
		{
			echo 'Connection failed: ' . $db->connect_error;
		}
		else
		{
			$table = "CREATE TABLE People(
			LName TEXT,
			FName TEXT)";
			
			if ($db->query($table) === TRUE)
			{
				echo "Table /'Names/' created successfully";
			}
			else
			{
				echo "boooooooooooooo " . $db->error;
			}
		}
		$db->close();
	?>
	<a href="./second.php.">Go to second.php</a>
</html>