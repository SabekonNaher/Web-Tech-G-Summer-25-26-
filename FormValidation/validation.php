<?php

$errors = [];

$fullname = "";
$email = "";
$password = "";
$confirm_password = "";


// Run validation only when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = $_POST["fn"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";


    // Full name validation
    if (empty($fullname)) {

        $errors['fn'] = "Full name is required";

    } elseif (strlen($fullname) < 3) {

        $errors['fn'] = "Full name is too short";
    }


    // Email validation
    if (empty($email)) {

        $errors['email'] = "Email is required";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors['email'] = "Email pattern is invalid";
    }


    // Password validation
    if (strlen($password) < 6) {

        $errors['password'] = "Password must be at least 6 characters";
    }


    // Confirm password validation
    if ($password != $confirm_password) {

        $errors['confirm_password'] = "Passwords do not match";
    }


    // If there are no errors
    if (empty($errors)) {

        echo "<h2>Account Created Successfully!</h2>";

        echo "Fullname: " . htmlspecialchars($fullname) . "<br>";

        echo "Email: " . htmlspecialchars($email) . "<br>";

        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

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
<form
    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
    method="post"
>
    <!-- Full Name -->

    <label for="fullname">
        Fullname:
    </label>

    <input
        type="text"
        id="fullname"
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


    <!-- Email -->

    <label for="email">
        Email:
    </label>

    <input
        type="email"
        id="email"
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

    <label for="password">
        Password:
    </label>

    <input
        type="password"
        id="password"
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


    <!-- Confirm Password -->

    <label for="confirm_password">
        Confirm Password:
    </label>

    <input
        type="password"
        id="confirm_password"
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


    <input
        type="submit"
        value="Create Account"
    >

    <input
        type="reset"
        value="Reset Form"
    >


</form>


</body>

</html>