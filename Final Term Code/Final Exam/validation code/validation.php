<?php

$errors = [];

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";


// Sanitize function
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


// Receive data using $_REQUEST

$name = $_REQUEST["name"] ?? "";
$email = $_REQUEST["email"] ?? "";
$website = $_REQUEST["website"] ?? "";
$comment = $_REQUEST["comment"] ?? "";
$gender = $_REQUEST["gender"] ?? "";


// Validate Name

if (empty($name)) {

    $errors["name"] = "Name is required";

} else {

    $name = sanitizeInput($name);

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {

        $errors["name"] = "Name can only contain letters and spaces";
    }
}


// Validate Email

if (empty($email)) {

    $errors["email"] = "Email is required";

} else {

    $email = sanitizeInput($email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors["email"] = "Invalid email format";
    }
}


// Validate Website

if (!empty($website)) {

    $website = sanitizeInput($website);

    if (!filter_var($website, FILTER_VALIDATE_URL)) {

        $errors["website"] = "Invalid website URL";
    }
}


// Comment

if (!empty($comment)) {

    $comment = sanitizeInput($comment);
}


// Validate Gender

if (empty($gender)) {

    $errors["gender"] = "Gender is required";

} else {

    $gender = sanitizeInput($gender);
}


// If there are errors

if (!empty($errors)) {

    echo "<h2>Form has errors</h2>";

    foreach ($errors as $error) {

        echo "<p style='color:red;'>$error</p>";
    }

    echo "<a href='registration.php'>Go back to Registration</a>";

    exit();
}


// If no errors, display data

?>

<!DOCTYPE html>
<html>

<head>
    <title>Submitted Data</title>
</head>

<body>

<h2>Submitted Data</h2>

<p>
    <strong>Name:</strong>
    <?php echo $name; ?>
</p>

<p>
    <strong>Email:</strong>
    <?php echo $email; ?>
</p>

<p>
    <strong>Website:</strong>
    <?php echo $website; ?>
</p>

<p>
    <strong>Comment:</strong>
    <?php echo $comment; ?>
</p>

<p>
    <strong>Gender:</strong>
    <?php echo $gender; ?>
</p>

</body>

</html>