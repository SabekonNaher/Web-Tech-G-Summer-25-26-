<?php
echo "inside form handler <br>";

// form data collection
//var_dump($_GET);
//echo "<br>";
//echo $_GET["fn"]; // key must be equal to field's name attribute
//echo "<br>";
//echo $_GET["email"]; // key must be equal to field's name attribute
//echo "<br>";
//echo $_GET["password"]; // key must be equal to field's name attribute
//echo "<br>";
//echo $_GET["confirm_password"]; // key must be equal to field's name attribute
//echo "<br>";

$fullname = $_POST["fn"];
echo "full name is : " . $fullname . "<br>";

// validation logic

// full name should not be empty
// if ($fullname == "")
if (empty($fullname)) {
	echo "Full name is required";
}

// full name must be at least 3 chars long
if (strlen($fullname) < 3) {
	echo "Full name is too short";
}
?>