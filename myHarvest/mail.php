<?php 
session_start();
include "header.php";

$name = $_POST['name'];
$email =  $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$mailheader = "From: $name \r\n\t".$email;
?>
<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'paigek.apple@gmail.com';
$mail->Password = 'herringT!ger';
$mail->setFrom = 'paigek.apple@gmail.com';
$mail->addAddress('paigek.apple@gmail.com');
$mail->Subject = $subject;
$mail->Body = $mailheader ."\r\n\t". $message;


//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>
<html>
<link rel="stylesheet" href="styles.css" type="text/css" />
<head>
<title>We appreciate your feedback!</title>
</head>
<p><canvas style=height:150px;></canvas>
<br>
	<blockquote>
		<b> Thank you for your feedback! We appreciate your business. </b>
	</blockquote>
<body>
<p><canvas style=height:150px;></canvas>

</body>
<?php include "footer.php"; ?>