<!DOCTYPE html>
<html lang="en">
	<body>
		<nav class="navbar-fixed-top">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="posts.php">Posts</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<?php
						if (session_status() == PHP_SESSION_NONE)
						{
							session_start();
						}
						if(isset($_SESSION["admin"]))
						{
							if($_SESSION["admin"] == 1)
							{
								?>
								<li>
									<a href="add_sub.php">Add Submission</a>
								</li>
								<?php
							}
						}
					?>
				</ul>
			</div>
		</nav>
	</body>
</html>