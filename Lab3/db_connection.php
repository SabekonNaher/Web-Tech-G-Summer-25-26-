<?php
// 4 parameters required for establishing DB connection | 1 optional parameter
// 1. DB server's address
$db_host = 'localhost';
// 2. DB username and 3. DB password
$db_username = 'root';
$db_password = '';
// 4. DB Name
$db_name = 'wtg';
// OPTIONAL 5. Port
// $port = 3306;

$conn = mysqli_connect(
	$db_host,
	$db_username,
	$db_password,
	$db_name
);