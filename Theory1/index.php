<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Title</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <h1>Welcome to PHP</h1>

    <?php

    echo "Hello from PHP <br>";

    // For loop
    for ($i = 1; $i <= 5; $i++) {
        echo $i . "<br>";
    }

    // Different data types
    $i = 5;
    $f = 10.2;
    $b = false;
    $s = "txt";
    $a = [1, 2, 3.4, [1, 2], "string"];
    $n = null;

    // var_dump()
    var_dump($i);
    echo "<br>";

    var_dump($f);
    echo "<br>";

    var_dump($b);
    echo "<br>";

    var_dump($s);
    echo "<br>";

    var_dump($a);
    echo "<br>";

    var_dump($n);
    echo "<br>";

    // Iterate indexed array
    for ($i = 0; $i < count($a); $i++) {

        if (is_array($a[$i])) {
            echo "Array: ";
            var_dump($a[$i]);
            echo "<br>";
        } else {
            echo $a[$i] . "<br>";
        }
    }

    // Associative arrays
    $person = [
        "name" => "ABC",
        "age" => 12,
        "gender" => "male"
    ];

    $ages = [
        "a" => 12,
        "b" => 30
    ];

    // Iterate associative array
    foreach ($person as $k => $v) {
        echo $k . " is " . $v . "<br>";
    }

    foreach ($ages as $name => $age) {
        echo $name . " is " . $age . " years old<br>";
    }

    ?>

    <script>
        var person = {
            name: "ABC",
            age: 12
        };
    </script>

</body>

</html>