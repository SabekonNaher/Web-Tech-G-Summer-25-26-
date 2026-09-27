<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <form action="process.php" method="post">

        <label for="fullname">Fullname:</label>
        <input type="text" id="fullname" name="fn">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <br><br>

        <input type="submit" value="Create Account">
        <input type="reset" value="Reset Form">

    </form>

</body>

</html>