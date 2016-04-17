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
	include '../include/nav-bar.php'; 
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	?>
	<br/>
	<br/>
	<br/>
	<div class="contact">
		<form action="../process/send-mail.php" method="POST">
			<?php 
			if(! isset($_SESSION["loggedin"]))
			{
			?>
				<input type="text" name="fname" placeholder="First Name"></input>
				<input type="text" name="lname" placeholder="Last Name"></input>
				<input type="email" name="e-address" placeholder="E-Mail Address"></input>
			<?php
			}
			?>
			<input type="text" name="subject" placeholder="Subject"></input>
			<br/>
			<textarea name="content" placeholder="Type content here..." rows="10" cols="50"></textarea>
			<br/>
			<input type="submit" value="send"></input>
		</form>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
