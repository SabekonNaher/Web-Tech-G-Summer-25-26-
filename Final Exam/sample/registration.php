<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>

<body>

<h2>Registration Form</h2>

<form method="post" action="showdata.php">

    First Name:
    <input type="text" name="first_name">
    <br><br>

    Last Name:
    <input type="text" name="last_name">
    <br><br>

    DOB:
    <input type="text" name="dob" placeholder="DD-MM-YYYY">
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    Phone:
    <input type="text" name="phone">
    <br><br>

    Email ID:
    <input type="text" name="email">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    Confirm Password:
    <input type="password" name="confirm_password">
    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>