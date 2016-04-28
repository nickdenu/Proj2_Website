<html>
	<head>
	<title>Exercise 4</title>
	<link rel="stylesheet" type="text/css" href="myStyleEx4.css">
		<h1>
		Welcome to the Login Page
		</h1>
		<h2>
	<?php
		session_start();
		
		if (isset($_SESSION['error']))
		{
			echo $_SESSION['error'];
		}
	?>
		</h2>
	</head>
	<div class="block">
		<link rel="stylesheet" type="text/css" href="myStyle.css">
		<form  method = "post" action = "process.php">
			<br/>
			<input type="text" placeholder="Username" name="username">
			<br/>
			<input type="password" placeholder="Password" name="password">
			<br/>
			<input type="submit" value="Login" >
		</form>
	</div>
</html>
