<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>

    <style>
        .error {
            color: red;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<h2>Contact Form</h2>

<form method="post" action="validation.php">

    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name">
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email">
    </div>

    <div class="form-group">
        <label>Website:</label>
        <input type="text" name="website">
    </div>

    <div class="form-group">
        <label>Comment:</label>
        <textarea name="comment" rows="5" cols="40"></textarea>
    </div>

    <div class="form-group">

        <label>Gender:</label><br>

        <input type="radio" name="gender" value="female">
        Female

        <input type="radio" name="gender" value="male">
        Male

        <input type="radio" name="gender" value="other">
        Other

    </div>

    <input type="submit" value="Submit">

</form>

</body>
</html>