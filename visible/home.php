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
		else
		{
				$query = "SELECT * FROM (SELECT * FROM entries ORDER BY `index` DESC LIMIT 3)as r";
				$return = $db->query($query);
				$i = 0;
				while ($data = $return->fetch_assoc())
				{
					$headers[$i] = $data["header"];
					$images[$i++] = $data["image"];
				}
				
		}
	?>
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
	<div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active" style="height=100px;">
	  <?php
		echo "<img src=\"../images/" . $images[0] . "\" alt=\"...\">";
	  ?>
      <div class="carousel-caption">
          <h3><?php echo $headers[0];?></h3>
		  <form action="posts.php" method="POST">
			<?php
				echo "<input type=\"hidden\" name=\"query\" value=\"" . $headers[0] . "\"></input>";
			?>
			<input type="submit" value="Read Now"></input>
		  </form>
      </div>
    </div>
    <div class="item" style="400px;">
      <?php
		echo "<img src=\"../images/" . $images[1] . "\" alt=\"...\">";
	  ?>
      <div class="carousel-caption">
          <h3><?php echo $headers[1];?></h3>
		  <form action="posts.php" method="POST">
			<?php
				echo "<input type=\"hidden\" name=\"query\" value=\"" . $headers[1] . "\"></input>";
			?>
			<input type="submit" value="Read Now"></input>
		  </form>
      </div>
    </div>
    <div class="item" style="400px;">
      <?php
		echo "<img src=\"../images/" . $images[2] . "\" alt=\"...\">";
	  ?>
      <div class="carousel-caption">
          <h3><?php echo $headers[2];?></h3>
		  <form action="posts.php" method="POST">
			<?php
				echo "<input type=\"hidden\" name=\"query\" value=\"" . $headers[2] . "\"></input>";
			?>
			<input type="submit" value="Read Now"></input>
		  </form>
      </div>
    </div>
  </div>
 
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
<div class = "left-bar">
	<?php include '../include/search.php'; ?>
	<?php 
		$_SESSION["currpage"] = "home.php";
		if (isset($_POST["uname"]))
		{
			$_SESSION["uname"] = $_POST["uname"];
		}
		if(isset($_SESSION["loggedin"]))
		{
			if ($_SESSION["loggedin"] == 1)
			{
				echo "Welcome " . $_SESSION["uname"];
				?>
				<form action="../process/signout.php">
					<input type="submit" value="Sign Out"></input>
				</form>
				<?php
			}
		}
		else
		{
	?>
		<div class="login">
			<form action="../process/process_login.php" method="POST">
				<center>Login</center>
				<div class="error">
					<?php 
						if(isset($_SESSION["error_login"]))
						echo $_SESSION["error_login"];
					?>
				</div>
				<input type="text" name="uname" placeholder="Username"></input>
				<br/>
				<input type="password" name="passw" placeholder="Password"></input>
				<br/>
				<input type="submit" value="Login"></input>
				<br/>
				<a href="register.php"> Don't have a password? Register Here.</a>
			</form>
		</div>
	<?php
		}
	?>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
