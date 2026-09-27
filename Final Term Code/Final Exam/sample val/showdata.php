<?php

session_start();

$first_name = $_REQUEST["first_name"] ?? "";
$last_name = $_REQUEST["last_name"] ?? "";
$dob = $_REQUEST["dob"] ?? "";
$gender = $_REQUEST["gender"] ?? "";
$phone = $_REQUEST["phone"] ?? "";
$email = $_REQUEST["email"] ?? "";
$password = $_REQUEST["password"] ?? "";
$confirm_password = $_REQUEST["confirm_password"] ?? "";


// Check if any field is empty
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


// Store username and password in Session
$_SESSION["username"] = $email;
$_SESSION["password"] = $password;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Submitted Data</title>
</head>

<body>

<h2>Registration Successful</h2>

<p>
    <strong>First Name:</strong>
    <?php echo htmlspecialchars($first_name); ?>
</p>

<p>
    <strong>Last Name:</strong>
    <?php echo htmlspecialchars($last_name); ?>
</p>

<p>
    <strong>DOB:</strong>
    <?php echo htmlspecialchars($dob); ?>
</p>

<p>
    <strong>Gender:</strong>
    <?php echo htmlspecialchars($gender); ?>
</p>

<p>
    <strong>Phone:</strong>
    <?php echo htmlspecialchars($phone); ?>
</p>

<p>
    <strong>Email ID:</strong>
    <?php echo htmlspecialchars($email); ?>
</p>

<p>
    <strong>Password:</strong>
    <?php echo htmlspecialchars($password); ?>
</p>

<p>
    <strong>Confirm Password:</strong>
    <?php echo htmlspecialchars($confirm_password); ?>
</p>

<?php

header("Refresh: 3; URL=login.php");

?>

<p>You will be redirected to login page...</p>

</body>
</html>