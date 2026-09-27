<?php

session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (
        $username == $_SESSION["username"] &&
        $password == $_SESSION["password"]
    ) {
        $message = "Login Successful!";
    } else {
        $message = "Invalid Username or Password!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
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

<br>

<?php

if (!empty($message)) {
    echo "<strong>" . $message . "</strong>";
}

?>

</body>
</html>