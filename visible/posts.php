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
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<script>
	window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);
		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};
		return t;
	}(document, "script", "twitter-wjs"));
	</script>
	<?php 
		if (session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		include '../include/nav-bar.php'; 
	?>
	</br>
	</br>
	</br>
	</br>
	<div class="left-bar">
		<div class="search">
			<center>Search Post Tags</center>
			<input type="search" name="search" placeholder="Search Text" id="search_text"></input>
			<br/>
			<input type="submit" value="Search" id="search_button"></input>
		</div>
		</br>
		<div class="fb-like" data-href="https://www.nickdenuswebsite.com" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		<!-- This facebook like button will point elsewhere once a URL is purchased -->
		<!-- This also doesn't work from localhost currently, facebook doesn't allow it. It will work from an actual URL -->
		<br/>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="NickDenu">Tweet</a>
		<a href="https://twitter.com/NickDenu" class="twitter-follow-button" data-show-count="false">Follow @NickDenu</a>
		<script>
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
		</script>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="../js/search.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
