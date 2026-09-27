<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Display</title>

</head>

<body>

<h2>Account Created Successfully!</h2>

<?php

echo "Fullname: " . htmlspecialchars($_SESSION['fullname']) . "<br>";

echo "Email: " . htmlspecialchars($_SESSION['email']) . "<br>";

?>

</body>

</html>