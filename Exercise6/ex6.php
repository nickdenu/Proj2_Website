<html>
	<head>
		<title>Excericse 6</title>
		<link href="ex6.css" type="text/css" rel="stylesheet">
	</head>
	<body>			
		<form method="POST" class="myForm">
			Enter CS Course : 
			<input type="text" id="course" name="course" placeholder="CS course ..." />
			<input type="hidden" id="hidden" name="hidden" value="nada"/>
			<input type="submit" value="SUBMIT COURSE" id="submit">
		</form>		
		<?php 
		if(isset($_POST['hidden']))
		{
			if($_POST['hidden'] == 'correct')
			{
				print_r("Accepted");
			}
		}
		?>
	</body>		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="ex6.js"></script>
</html>
