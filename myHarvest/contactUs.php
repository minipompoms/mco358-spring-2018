<?php include "header.php" ?> 
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="styles.css" type="text/css" />
<head>
<title>Contact Us</title>
</head>
<body>

<form action="mail.php" method="post">
<p>Name</p> <input type="text" name="name">
<p>Email</p> <input type="text" name="email">
<p>Subject</p> <input type="text" name="subject">
<p>Message</p><textarea class ="message" name="message" rows="15" cols="100"></textarea><br />
<input type="submit" value="Send"><input type="reset" value="Clear">
</form>
</body>
<br>
<div>
<br>
<?php include "footer.php";?></div></html>
