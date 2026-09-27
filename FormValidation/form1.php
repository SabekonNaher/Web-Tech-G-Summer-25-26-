<?php
$fullname = "";
$email = "";
$website = "";
$comment = "";
$gender = "";

$fullname_error = "";
$email_error = "";
$website_error = "";
$gender_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST["fn"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];
    $gender = $_POST["gender"] ?? "";

    // Full Name Validation
    if (empty($fullname)) {
        $fullname_error = "Full name is required";
    } elseif (strlen($fullname) < 3) {
        $fullname_error = "Full name is too short";
    }

    // Email Validation
    if (empty($email)) {
        $email_error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }

    // Website Validation
    if (!empty($website)) {
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $website_error = "Invalid website URL";
        }
    }

    // Gender Validation
    if (empty($gender)) {
        $gender_error = "Gender is required";
    }

    // If no errors
    if (
        empty($fullname_error) &&
        empty($email_error) &&
        empty($website_error) &&
        empty($gender_error)
    ) {
        echo "<h2>Submitted Data</h2>";
        echo "Full name is: " . $fullname . "<br>";
        echo "Email is: " . $email . "<br>";
        echo "Website is: " . $website . "<br>";
        echo "Comment is: " . $comment . "<br>";
        echo "Gender is: " . $gender . "<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

<h1>PHP Form Validation Example</h1>

<form action="" method="post">

    Full Name:
    <input type="text" name="fn" value="<?php echo $fullname; ?>">
    <span class="error">
        <?php echo $fullname_error; ?>
    </span>
    <br><br>

    E-mail:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">
        <?php echo $email_error; ?>
    </span>
    <br><br>

    Website:
    <input type="text" name="website" value="<?php echo $website; ?>">
    <span class="error">
        <?php echo $website_error; ?>
    </span>
    <br><br>

    Comment:
    <textarea name="comment" rows="5" cols="50"><?php echo $comment; ?></textarea>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Other"> Other

    <span class="error">
        <?php echo $gender_error; ?>
    </span>

    <br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>