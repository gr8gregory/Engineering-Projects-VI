<?php
$submitted = !empty($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Handler</title>
	</head>
	<body>
		<p>Your login information:</p>
		<p>Username: <?php echo $_POST['username']; ?> </p>
		<p>Password: <?php echo $_POST['password']; ?> </p>
	</body>
	<a href="../login.html">Go Back</a>
</html>