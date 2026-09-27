<?php
require __DIR__ . '/db_connection.php';
// require 'wtg/final/lab3/db_connection.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check againsts DB
	$sql = "SELECT * FROM users WHERE username = '$username';";
	// $sql = "SELECT * FROM users;";
	// echo $sql;
	$result = $conn->query($sql);
	// var_dump($result);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row['password'] == $password) {
				// login succesful	
				unset($_SESSION['error_message']);
				$_SESSION['username'] = $row['username'];
				// $_SESSION['role'] = $users[$i]['role'];
				header("Location: home.php");
				exit();
			} else {
				$_SESSION['error_message'] = "Username or Password is invalid";
				header("Location: login.php");
				exit();
			}
		}
	} else {
		$_SESSION['error_message'] = "Username or Password is invalid";
		header("Location: login.php");
		exit();
	}

} else {
	header("Location: login.php");
}