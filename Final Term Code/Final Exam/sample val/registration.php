<?php

$errors = [];

$first_name = "";
$last_name = "";
$dob = "";
$gender = "";
$phone = "";
$email = "";
$password = "";
$confirm_password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $first_name = $_POST["first_name"] ?? "";
    $last_name = $_POST["last_name"] ?? "";
    $dob = $_POST["dob"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";


    // First Name Validation
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required";
    } elseif (strlen($first_name) < 3) {
        $errors['first_name'] = "First name is too short";
    }


    // Last Name Validation
    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required";
    } elseif (strlen($last_name) < 3) {
        $errors['last_name'] = "Last name is too short";
    }


    // DOB Validation
    if (empty($dob)) {
        $errors['dob'] = "Date of birth is required";
    }


    // Gender Validation
    if (empty($gender)) {
        $errors['gender'] = "Gender is required";
    }


    // Phone Validation
    if (empty($phone)) {
        $errors['phone'] = "Phone is required";
    } elseif (!is_numeric($phone)) {
        $errors['phone'] = "Phone must contain numbers only";
    }


    // Email Validation
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email pattern is invalid";
    }


    // Password Validation
    if (empty($password)) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }


    // Confirm Password Validation
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Confirm password is required";
    } elseif ($password != $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }


    // If there are no errors
    if (empty($errors)) {
        header("Location: showdata.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>

    <style>
        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>

<body>

<h1>Registration Form</h1>

<form action="showdata.php" method="post">

    First Name:
    <input type="text" name="first_name"
           value="<?php echo htmlspecialchars($first_name); ?>">

    <span class="error">
        <?php
        if (isset($errors['first_name'])) {
            echo $errors['first_name'];
        }
        ?>
    </span>

    <br><br>


    Last Name:
    <input type="text" name="last_name"
           value="<?php echo htmlspecialchars($last_name); ?>">

    <span class="error">
        <?php
        if (isset($errors['last_name'])) {
            echo $errors['last_name'];
        }
        ?>
    </span>

    <br><br>


    DOB:
    <input type="text" name="dob"
           placeholder="DD-MM-YYYY"
           value="<?php echo htmlspecialchars($dob); ?>">

    <span class="error">
        <?php
        if (isset($errors['dob'])) {
            echo $errors['dob'];
        }
        ?>
    </span>

    <br><br>


    Gender:

    <input type="radio" name="gender" value="Male"
        <?php if ($gender == "Male") echo "checked"; ?>>
    Male

    <input type="radio" name="gender" value="Female"
        <?php if ($gender == "Female") echo "checked"; ?>>
    Female

    <span class="error">
        <?php
        if (isset($errors['gender'])) {
            echo $errors['gender'];
        }
        ?>
    </span>

    <br><br>


    Phone:
    <input type="text" name="phone"
           value="<?php echo htmlspecialchars($phone); ?>">

    <span class="error">
        <?php
        if (isset($errors['phone'])) {
            echo $errors['phone'];
        }
        ?>
    </span>

    <br><br>


    Email ID:
    <input type="text" name="email"
           value="<?php echo htmlspecialchars($email); ?>">

    <span class="error">
        <?php
        if (isset($errors['email'])) {
            echo $errors['email'];
        }
        ?>
    </span>

    <br><br>


    Password:
    <input type="password" name="password">

    <span class="error">
        <?php
        if (isset($errors['password'])) {
            echo $errors['password'];
        }
        ?>
    </span>

    <br><br>


    Confirm Password:
    <input type="password" name="confirm_password">

    <span class="error">
        <?php
        if (isset($errors['confirm_password'])) {
            echo $errors['confirm_password'];
        }
        ?>
    </span>

    <br><br>


    <input type="submit" value="Register">
    <input type="reset" value="Reset">

</form>

</body>
</html>