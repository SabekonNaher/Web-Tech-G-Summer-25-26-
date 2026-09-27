output
<?php

$students = ["Alice", "Bob", "Charlie", "David"];

if (isset($_COOKIE['index'])) {

    $i = $_COOKIE['index'];

    echo "Student: " . $students[$i] . "<br>";
    echo "Index: " . $i;

}
else {

    echo "No student selected";

}

?>

<br><br>

<a href="action.php">
    <button>Next Student</button>
</a>