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
	<?php
		if (session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		include '../include/nav-bar.php';
		if(!isset($_SESSION["admin"]) || ($_SESSION["admin"] !== 1))
		{
			header("Location: ../visible/home.php");
		}
	?>
	
	<br/>
	<br/>
	<br/>
	<div class="contact">
		<form action="../process/add_sub_process.php" method="POST">
				<input type="text" name="header" placeholder="Header"></input>
				<br/>
				<input type="text" name="image" placeholder="Image URL"></input>
				<br/>
				<textarea name="content" placeholder="Type content here..." cols="100" rows="15"></textarea>
				<br/>
				<input type="text" name="tags" placeholder="Tags (seperate by commas)" size="35"></input>
				<br/>
				<input type="submit" name="Submit"></input>
		</form>
	</div>
 
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
