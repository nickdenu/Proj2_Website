<html>
	<?php
		session_start();
		if (! $_SESSION['logged'])
		{
			$_SESSION['error'] = "You have not yet logged in.";
			header('Location: http://localhost/Exercise4/login.php');
			exit;
		}
		else
		{
			unset($_SESSION['error']);
	?>
	<head>
	<title>Exercise 4</title>
	<link href="myStyleEx4.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="block">
		<h1>
		<?php
			echo "Welcome to the website " . $_SESSION["name"];
		?>
		</h1>
		<p>
		Blah Blah Blah Website Stuff
		</p>
		<div>
	</body>
	
	<?php
		}
	?>
</html>