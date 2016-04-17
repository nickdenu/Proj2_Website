<?php
	require('../PHPMailer-master/PHPMailerAutoload.php');
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	$mail = new PHPMailer();
	$body = $_POST["content"];
	if(! isset($_SESSION["loggedin"]))
	{
		$body = "First Name: " . $_POST["fname"] . " \nLast Name: " . $_POST["lname"] . "\n" . $body;
		$mail->SetFrom($_POST["e-address"]);
	}
	else
	{
		$mail->SetFrom($_SESSION["email"]);
	}
	$subject = "Website: " . $_POST["subject"];
	$mail->Body = $body;
	$mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets tls authentication
    $mail->Host = "smtp.pitt.edu"; // sets Pitt as the SMTP server
    $mail->Port = 587; // set the SMTP port for the Pitt server
    $mail->Username = "ndd13"; // Pitt username
    $mail->Password = 'nddp1tt$burGH'; // Pitt password
	$mail->addAddress("denunick@gmail.com");
	$mail->Subject = $subject;
	if (!$mail->Send())
	{
		echo "Mailer didn't work." . $mail->ErrorInfo;
	}
	$temp_location = "Location: ../visible/home.php";
	header($temp_location);
?>