
<?php

$names = ["Alice", "Bob", "Charlie", "David"];
$marks = [60, 70, 80, 90];

$i = isset($_COOKIE['index']) ? $_COOKIE['index'] : 0;
$bonus = isset($_COOKIE['bonus']) ? $_COOKIE['bonus'] : 0;
$count = isset($_COOKIE['count']) ? $_COOKIE['count'] : 0;

$total = $marks[$i] + $bonus;

echo "Student: " . $names[$i] . "<br>";
echo "Base Mark: " . $marks[$i] . "<br>";
echo "Bonus: " . $bonus . "<br>";
echo "Total Mark: " . $total . "<br>";
echo "Action Count: " . $count;

?>

<br><br>

<a href="action.php?task=next">
    <button>Next</button>
</a>

<a href="action.php?task=previous">
    <button>Previous</button>
</a>

<a href="action.php?task=bonus">
    <button>Add Bonus</button>
</a>

<a href="action.php?task=reset">
    <button>Reset</button>
</a>