<?php
// var_dump($_SERVER);
echo "<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";

var_dump($_REQUEST);
echo "<br>";

// empty() vs isset()
// isset() returns false if variable does not exist OR variable's value is NULL
// empty() returns true if variable's value is one of the following:
// 0
// 0.0
// "0"
// ""
// NULL
// FALSE
// array()

$s = 0;
if (isset($s)) {
	echo "String is set";
} else {
	echo "String is not set";
}
echo "<br>";
if (empty($s)) { // -> true
	echo "String is empty";
} else {
	echo "String is not empty";
}