<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form onsubmit="return true" action="form-handler.php" method="post">
		<label for="fullname">Fullname:</label>
		<input type="text" id="fullname" name="fn" required />
		<span class="error" id="fullname_error"></span>
		<br />
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required />
		<span class="error" id="email_error"></span>
		<br />
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required />
		<span class="error" id="password_error"></span>
		<br />
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" required />
		<span class="error" id="confirm_password_error"></span>
		<br />
		<input type="submit" value="Create Account" />
		<input type="reset" value="Reset Form" />
	</form>
</body>

</html>