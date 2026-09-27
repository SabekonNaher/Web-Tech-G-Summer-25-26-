<!DOCTYPE html>
<html>
    <body>
        <h1> My first PHP page </h1>

        <?php
        echo "Hello World";
        ?>

<?php
$txt1 = "Learn PHP"; 
$txt2 = "W3Schools.com"; 
echo "<h2>$txt1</h2>"; 
echo "<p>Study PHP at $txt2</p>";
echo '<h2>' . $txt1 . '</h2>'; 
echo '<p>Study PHP at ' . $txt2 . '</p>';
?>

<?php 
 $txt = "Hello world!"; 
 $x = 5;
 $y = 10.5;
 echo"I love " . $txt . "!<br>";
 echo $x + $y ."<br>";
?>

<?php /* another way to write break <br>
echo "I love " . $txt . "!<br>";
echo $x + $y;
echo "<br>";
 */ ?>

// Normal array with it's value
<?php 
$cars = array("Volvo","BMW","Toyota");
  var_dump($cars);
  echo "<br>";
?>
// var_dump() funtion use
<?php 
 $i=5; 
 $f = 10.2;
 $b = false;
 $s = "txt";
 $a = [1,2,3.4 ,[1,2],"string"];
 var_dump($a);
 var_dump($i);
 var_dump($f);
 var_dump($b);
 var_dump($s);
 echo "<br>";
?>
 
//associative array
<?php
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
echo $car["model"];
echo "<br>";

foreach ($car as $x => $y) {
 echo "$x: $y <br>";
}
?>

<?php
$person = array("name" => "ABC", "Age" => "12");

foreach ($person as $key => $value) {
    echo "$key = $value <br>";
}
?>

<?php 
$student = array(
    "name" => "Seya",
    "age" => 20,
    "department" => "CSE"
);

echo $student["name"] . "<br>";
echo $student["age"] . "<br>";
?>

<?php
class Car {
    function __construct() {
        $this->model = "VW";
    }
}
// Create an object
$herbie = new Car();

// Show object property
echo $herbie->model;
echo "<br>";
?>

//if else condition
<?php
$a =20;
$b = 30; 
if ($a >$b)
{
    echo"a is bigger than b";
}
elseif
($a == $b)
     {
    echo "a is equal to b";
    }
else
    {
        echo "a is smaller than b";
    }
    echo "<br>";
?>

//switch case 
<?php
$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;

    case "green":
        echo "Your favorite color is green!";
        break;

    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>



</body>
</html>