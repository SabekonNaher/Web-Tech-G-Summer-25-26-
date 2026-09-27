<?php

$fullname = $_POST["fn"];
$email = $_POST["email"];
$website = $_POST["website"];
$comment = $_POST["comment"];
$gender = $_POST["gender"];

// Display submitted data
echo "Full name is : " . $fullname . "<br>";
echo "Email is : " . $email . "<br>";
echo "Website is : " . $website . "<br>";
echo "Comment is : " . $comment . "<br>";
echo "Gender is : " . $gender . "<br><br>";


// ===============================
// Full Name Validation
// ===============================

// Full name should not be empty
if (empty($fullname)) {
    echo "Full name is required<br>";
}

// Full name must be at least 3 characters long
if (strlen($fullname) < 3) {
    echo "Full name is too short<br>";
}


// ===============================
// Email Validation
// ===============================

// Email should not be empty
if (empty($email)) {
    echo "Email is required<br>";
}

// Email must be valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format<br>";
}


// ===============================
// Website Validation
// ===============================

// Website is optional
if (!empty($website)) {

    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        echo "Invalid website URL<br>";
    }
}


// ===============================
// Gender Validation
// ===============================

// Gender should not be empty
if (empty($gender)) {
    echo "Gender is required<br>";
}

?>