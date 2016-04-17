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
	<div class="about-body">
		<?php 
		$db = new mysqli("localhost","root","","denu");
		if ($db->connect_error)
		{
			echo 'Connection failed: ' . $db->connect_error;
		}
		else
		{
				$query = "SELECT * FROM about";
				$return = $db->query($query);
				$data = $return->fetch_assoc();
				echo "<br/>";
				echo "<br/>";
				echo "<br/>";
				echo "<font size=\"3\">" . $data["header"] . "</font>";
				echo "<br/>";
				echo "    <font size=\"2\">" . $data["body"] . "</font>";
		}
	?>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
