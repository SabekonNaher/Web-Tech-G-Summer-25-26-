<?php
// echo $_COOKIE['theme'] . "<br>";
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
	<style>
		div {
			border: 2px solid black;
			padding: 10px 20px;
			width: 300px;
		}

		.dark {
			background-color: black;
			color: white;
		}
	</style>
	<div class="<?php echo $_COOKIE['theme']?>">Current theme: <?php echo isset($_COOKIE['theme']) ? $_COOKIE['theme'] : "light" ?></div>
	<br>
	<form action="theme-switcher.php">
		<input type="submit" value="Change Theme">
	</form>
</body>

</html>