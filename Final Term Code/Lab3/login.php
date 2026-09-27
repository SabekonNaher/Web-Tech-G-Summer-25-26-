<?php
session_start();
if (isset($_SESSION['username'])) {
	header("Location: home.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Page Title</title>
	<link rel='stylesheet' href='main.css'>
</head>
<body>
	<form action="login-handler.php" method="post">
		Username: <input type="text" id="username" name="username"> <br>
		Password: <input type="password" id="password" name="password"> <br>
		<br>
		<input type="submit" value="Login">
		<br>
		<?php
			if (isset($_SESSION['error_message'])) {
				echo "<span class='error'>" . $_SESSION['error_message'] . "</span>";
			}
		?>
	</form>	
</body>
</html>