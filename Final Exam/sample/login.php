<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>

<h2>Login Page</h2>

<form method="post">

    Username:
    <input type="text" name="username">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Login">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (
        $username == $_SESSION["username"] &&
        $password == $_SESSION["password"]
    ) {
        echo "<p>Login Successful!</p>";
    } else {
        echo "<p>Invalid Username or Password</p>";
    }
}

?>

</body>
</html>