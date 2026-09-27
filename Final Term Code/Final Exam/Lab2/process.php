<?php

$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = $_POST["fn"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

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
    if (strlen($password) < 6) {
        $errors['password'] = "Password is too weak";
    }

    // Confirm password validation
    if ($password != $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    // Display result
    if (empty($errors)) {
        echo "Account created successfully!";
    } 
    else {
        echo "<h3>Validation Errors:</h3>";

        foreach ($errors as $error) {
            echo "<span style='color:red;'>$error</span><br>";
        }
    }

} else {
    echo "Form was not submitted";
}

?>