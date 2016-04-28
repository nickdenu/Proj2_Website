<html>
	<?php
		session_start();
		$found = FALSE;
		if (! isset($_POST["username"]) || ! isset($_POST["password"]))
		{
			header('Location: http://localhost/Exercise4/login.php');
		}
		else
		{
			$file = fopen("./users.txt", "a+");
			while($fileInfo = fgets($file))
			{
				$fileInfoArray = explode(":",$fileInfo);
				if (! strcmp($_POST["username"],$fileInfoArray[0]) && ! strcmp($_POST["password"],rtrim($fileInfoArray[1])))
				{
					echo $_POST["username"] . " " . $fileInfoArray[0] . " " . $_POST["password"] . " " . $fileInfoArray[1];
					$_SESSION['name'] = $_POST["username"];
					$found = TRUE;
					break;
				}
			}
			if ($found)
			{
				$_SESSION['logged'] = TRUE;
				header('Location: http://localhost/Exercise4/home.php');
			}
			else
			{
				$_SESSION['logged'] = FALSE;
				$_SESSION['error'] = "Your ID and Password didn't match with the records. Please try again.";
				header('Location: http://localhost/Exercise4/login.php');
			}
		}
		exit;
	?>
</html>