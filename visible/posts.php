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
	<div class = "left-bar">
		<?php include '../include/search.php'; ?>
	</div>
	<?php
		$db = new mysqli("localhost","root","","denu");
		if ($db->connect_error)
		{
			echo 'Connection failed: ' . $db->connect_error;
		}
		if(isset($_POST["query"]))
		{
			$query_string = "SELECT * FROM entries WHERE `header` = '" . $_POST["query"] ."' ORDER BY `index` DESC";
			unset($_POST["query"]);
		}
		else if(!isset($_POST["search"]))
		{
			$query_string = "SELECT * FROM entries ORDER BY `index` DESC";
		}
		else
		{
			$query_string = "SELECT * FROM entries WHERE `tags` LIKE '%" . strtolower($_POST["search"]) . "%' ORDER BY `index` DESC;";
		}
		$return = $db->query($query_string);
		if($return == false)
		{
			echo "Well this sucks, you didn't find anything with your search.";
		}
		else
		{
			while($row = $return->fetch_assoc())
			{
				$header = $row["header"];
				$image = $row["image"];
				
				$body_array = explode("\t",$row["body"]);
				for($i = 0, $body = "    "; $i < sizeof($body_array) ; $i++)
				{
					$temp_body_array = explode("\n",$body_array[$i]);
					for($j = 1, $temp_body = $temp_body_array[0]; $j < sizeof($temp_body_array) ; $j++)
					{
						$temp_body = $temp_body . "<br/>" . $temp_body_array[$j];
					}	
					$body = $body . "&nbsp;&nbsp;&nbsp;&nbsp;" . $temp_body;
				}	
				$date = $row["date"];
				$tags = $row["tags"];
				$author = $row["author"];
			?>
			<div class = "entries">
			
				<div class = "headers">
					<?php echo $header;?>
				</div>
				<div class = "date">
					<?php echo $date;?>
				</div>
				<div class = "body">
					<?php echo $body . "<br/><br/>" ;?>
				</div>
				<div class="author">
					<?php echo $author ;?>
				</div>
			</div>
    <?php
			}
			if(!isset($header))
			{
				echo "Well I'm sorry you didn't find anything you were looking for.";
			}
		}
    ?>
 
 
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
