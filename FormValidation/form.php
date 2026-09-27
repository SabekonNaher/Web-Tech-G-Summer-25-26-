<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>
</head>

<body>

<h1>PHP Form Validation Example</h1>

<form onsubmit="return true" action="validate.php" method="post">

    Full Name:
    <input type="text" name="fn">
    <span class="error" id="fullname_error"></span>
    <br><br>

    E-mail:
    <input type="text" name="email">
    <span class="error" id="email_error"></span>
    <br><br>

    Website:
    <input type="text" name="website">
    <br><br>

    Comment:
    <textarea name="comment" rows="5" cols="50"></textarea>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Other"> Other
    <span class="error" id="fullname_error"></span>
    <br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>