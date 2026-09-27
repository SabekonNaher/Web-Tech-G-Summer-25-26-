<!DOCTYPE html>
<html>
    <body>

<?php //1. Area and Perimeter of a Rectangle
$length = 10;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area of Rectangle = " . $area . "<br>";
echo "Perimeter of Rectangle = " . $perimeter;
echo "<br>";
?>

<?php //2. Calculate VAT
$amount = 1000;

$vat = $amount * 15 / 100;

echo "VAT = " . $vat;
echo "<br>";
?>

<?php //3. Find Odd or Even
$num = 25;

if ($num % 2 == 0) {
    echo "$num is Even";
} else {
    echo "$num is Odd";
}
 echo "<br>";
?>

<?php // 4. Find the Largest of Three Numbers
$a = 25;
$b = 40;
$c = 15;

if ($a >= $b && $a >= $c) {
    echo "$a is the largest number";
} elseif ($b >= $a && $b >= $c) {
    echo "$b is the largest number";
} else {
    echo "$c is the largest number";
}
 echo "<br>";
?>

<?php //5. Print All Odd Numbers Between 10 and 100
for ($i = 10; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
?>

</body>
</html>