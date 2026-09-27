<?php
$errors = [];

$fullname = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = $_POST["fn"];
    $email = $_POST["email"];

    // Full name validation
    if (empty($fullname)) {
        $errors['fn'] = "Full name is required";
    } 
    else if (strlen($fullname) < 3) {
        $errors['fn'] = "Full name is too short";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email pattern is invalid";
    }

    // Password validation
    if (strlen($_POST['password']) < 6) {
        $errors['password'] = "Password is too weak";
    }

    // Confirm password validation
    if ($_POST['password'] != $_POST['confirm_password']) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    // If no errors
    if (empty($errors)) {
        echo "<p style='color:green;'>Account created successfully!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Account</title>

    <style>
        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>

<body>

<h2>Create Account</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="fullname">Fullname:</label>

    <input type="text"
           id="fullname"
           name="fn"
           value="<?php echo htmlspecialchars($fullname); ?>">

    <?php
    if (isset($errors['fn'])) {
        echo "<span class='error'>" . $errors['fn'] . "</span>";
    }
    ?>

    <br><br>


    <label for="email">Email:</label>

    <input type="email"
           id="email"
           name="email"
           value="<?php echo htmlspecialchars($email); ?>">

    <?php
    if (isset($errors['email'])) {
        echo "<span class='error'>" . $errors['email'] . "</span>";
    }
    ?>

    <br><br>


    <label for="password">Password:</label>

    <input type="password"
           id="password"
           name="password">

    <?php
    if (isset($errors['password'])) {
        echo "<span class='error'>" . $errors['password'] . "</span>";
    }
    ?>

    <br><br>


    <label for="confirm_password">Confirm Password:</label>

    <input type="password"
           id="confirm_password"
           name="confirm_password">

    <?php
    if (isset($errors['confirm_password'])) {
        echo "<span class='error'>" . $errors['confirm_password'] . "</span>";
    }
    ?>

    <br><br>

    <input type="submit" value="Create Account">
    <input type="reset" value="Reset Form">

</form>

</body>
</html>