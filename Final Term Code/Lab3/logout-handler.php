<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// unset($_SESSION['username']);
		session_start();
		session_unset();
		session_destroy();

		header("Location: login.php");
		exit();
	}
?>