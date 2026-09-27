<?php

session_start();

$errors = [];

$fullname = "";
$email = "";
$password = "";
$confirm_password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = $_POST["fn"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";


    // Full Name Validation
    if (empty($fullname)) {

        $errors['fn'] = "Full name is required";

    } elseif (strlen($fullname) < 3) {

        $errors['fn'] = "Full name is too short";
    }


    // Email Validation
    if (empty($email)) {

        $errors['email'] = "Email is required";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors['email'] = "Email pattern is invalid";
    }


    // Password Validation
    if (strlen($password) < 6) {

        $errors['password'] = "Password must be at least 6 characters";
    }


    // Confirm Password Validation
    if ($password != $confirm_password) {

        $errors['confirm_password'] = "Passwords do not match";
    }


    // If there are no errors
    if (empty($errors)) {

        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;

        header("Location: display.php");
        exit();
    }
}

?>


<!DOCTYPE html>
<html>

<head>

    <title>PHP Form Validation</title>

    <style>

        .error {
            color: red;
            font-size: smaller;
        }

    </style>

</head>

<body>

<h1>Create Account</h1>

<form action="display.php" method="post">

    Fullname:

    <input
        type="text"
        name="fn"
        value="<?php echo htmlspecialchars($fullname); ?>"
    >

    <span class="error">

        <?php

        if (isset($errors['fn'])) {
            echo $errors['fn'];
        }

        ?>

    </span>

    <br><br>


    Email:

    <input
        type="email"
        name="email"
        value="<?php echo htmlspecialchars($email); ?>"
    >

    <span class="error">

        <?php

        if (isset($errors['email'])) {
            echo $errors['email'];
        }

        ?>

    </span>

    <br><br>


    Password:

    <input
        type="password"
        name="password"
    >

    <span class="error">

        <?php

        if (isset($errors['password'])) {
            echo $errors['password'];
        }

        ?>

    </span>

    <br><br>


    Confirm Password:

    <input
        type="password"
        name="confirm_password"
    >

    <span class="error">

        <?php

        if (isset($errors['confirm_password'])) {
            echo $errors['confirm_password'];
        }

        ?>

    </span>

    <br><br>


    <input type="submit" value="Create Account">

    <input type="reset" value="Reset Form">

</form>

</body>

</html>