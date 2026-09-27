<?php

session_start();

// Receive data using $_REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$first_name = $_POST["first_name"] ?? "";
$last_name = $_POST["last_name"] ?? "";
$dob = $_POST["dob"] ?? "";
$gender = $_POST["gender"] ?? "";
$phone = $_POST["phone"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";

// Check for empty data
if (
    empty($first_name) ||
    empty($last_name) ||
    empty($dob) ||
    empty($gender) ||
    empty($phone) ||
    empty($email) ||
    empty($password) ||
    empty($confirm_password)
) {
    header("Location: registration.php");
    exit();
}
}

// Store username and password in Session
$_SESSION["username"] = $email;
$_SESSION["password"] = $password;

// Display submitted data
echo "<h2>Registration Successful</h2>";

echo "First Name: " . htmlspecialchars($first_name) . "<br>";
echo "Last Name: " . htmlspecialchars($last_name) . "<br>";
echo "DOB: " . htmlspecialchars($dob) . "<br>";
echo "Gender: " . htmlspecialchars($gender) . "<br>";
echo "Phone: " . htmlspecialchars($phone) . "<br>";
echo "Email ID: " . htmlspecialchars($email) . "<br>";
echo "Password: " . htmlspecialchars($password) . "<br>";
echo "Confirm Password: " . htmlspecialchars($confirm_password) . "<br>";

// Redirect to login.php
header("Refresh: 5; URL=login.php");

?>