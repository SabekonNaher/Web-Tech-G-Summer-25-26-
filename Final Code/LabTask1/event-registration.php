<?php

if (isset($_POST["not_you"])) {
    setcookie("participant_name", "", time() - 3600);
    header("Location: event-registration.php");
    exit;
}

$events = [
    "Web Development Workshop",
    "Database Workshop",
    "AI Seminar",
    "Cyber Security Seminar"
];

$errors = [];
$success = false;

$name = "";
$email = "";
$phone = "";
$event = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $event = trim($_POST["event"] ?? "");

    if ($name == "") {
        $errors["name"] = "Name must not be empty.";
    } elseif (strlen($name) < 3) {
        $errors["name"] = "Name must contain at least 3 characters.";
    }

    if ($email == "") {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter a valid email address.";
    }

    if ($phone == "") {
        $errors["phone"] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
        $errors["phone"] = "Phone number must contain exactly 11 digits.";
    }

    if ($event == "") {
        $errors["event"] = "Please select an event.";
    } elseif (!in_array($event, $events)) {
        $errors["event"] = "Please select a valid event.";
    }

    if (empty($errors)) {
        setcookie("participant_name", $name, time() + 3600);
        $success = true;
    }
}

$participant_name = $_COOKIE["participant_name"] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Registration</title>
</head>

<body>

<h2>Event Registration Form</h2>

<?php if ($success): ?>

    <h3>Registration successful!</h3>

    <p>
        <strong>Name:</strong>
        <?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>
    </p>

    <p>
        <strong>Email:</strong>
        <?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>
    </p>

    <p>
        <strong>Phone:</strong>
        <?= htmlspecialchars($phone, ENT_QUOTES, "UTF-8") ?>
    </p>

    <p>
        <strong>Event:</strong>
        <?= htmlspecialchars($event, ENT_QUOTES, "UTF-8") ?>
    </p>

<?php endif; ?>


<form action="event-registration.php" method="POST">

    <?php if ($participant_name != ""): ?>

        <label> Name:</label>

        <?= htmlspecialchars($participant_name, ENT_QUOTES, "UTF-8") ?>

        <button type="submit" name="not_you">Not You?</button>

        <br><br>

    <?php else: ?>

        <label for="name"> Name:</label>

        <input
            type="text"
            id="name"
            name="name"
            value="<?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>"
        >

        <?php if (isset($errors["name"])): ?>
            <br>
            <span>
                <?= htmlspecialchars($errors["name"], ENT_QUOTES, "UTF-8") ?>
            </span>
        <?php endif; ?>

        <br><br>

    <?php endif; ?>


    <label for="email">Email:</label>

    <input
        type="email"
        id="email"
        name="email"
        value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>"
    >

    <?php if (isset($errors["email"])): ?>
        <br>
        <span>
            <?= htmlspecialchars($errors["email"], ENT_QUOTES, "UTF-8") ?>
        </span>
    <?php endif; ?>

    <br><br>


    <label for="phone">Phone Number:</label>

    <input
        type="text"
        id="phone"
        name="phone"
        value="<?= htmlspecialchars($phone, ENT_QUOTES, "UTF-8") ?>"
    >

    <?php if (isset($errors["phone"])): ?>
        <br>
        <span>
            <?= htmlspecialchars($errors["phone"], ENT_QUOTES, "UTF-8") ?>
        </span>
    <?php endif; ?>

    <br><br>


    <label for="event">Event Type:</label>

    <select id="event" name="event">

        <option value="">-- Select an Event --</option>

        <?php foreach ($events as $e): ?>

            <option
                value="<?= htmlspecialchars($e, ENT_QUOTES, "UTF-8") ?>"
                <?= ($event == $e) ? "selected" : "" ?>
            >
                <?= htmlspecialchars($e, ENT_QUOTES, "UTF-8") ?>
            </option>

        <?php endforeach; ?>

    </select>

    <?php if (isset($errors["event"])): ?>
        <br>
        <span>
            <?= htmlspecialchars($errors["event"], ENT_QUOTES, "UTF-8") ?>
        </span>
    <?php endif; ?>

    <br><br>

    <button type="submit" name="register">Register</button>

</form>

</body>
</html>