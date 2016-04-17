<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<title>Project</title>
	
	<link href="../css/bootstrap.css" rel="stylesheet">

    <link href="../css/proj.css" rel="stylesheet">
	
</head>

<body>
	<?php include '../include/nav-bar.php'; ?>
	</br>
	</br>
	</br>
	</br>
	<form action="../process/process_register.php" method="POST">
		<?php
			if (session_status() == PHP_SESSION_NONE)
			{
				session_start();
			}
			if(isset($_SESSION["error_register"]))
			{
				echo "<font color=\"red\">" . $_SESSION["error"] . "</font></br>";
			}
		?>
		<input type="text" name="uname" placeholder="User Name" required>
		</br>
		<input type="password" name="passw" placeholder="Password" required>
		</br>
		<input type="password" name="cpassw" placeholder="Confirm Password" required>
		</br>
		<input type="email" name="email" placeholder="Email" required>
		</br>
		<input type="submit" value="Register">
	</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
