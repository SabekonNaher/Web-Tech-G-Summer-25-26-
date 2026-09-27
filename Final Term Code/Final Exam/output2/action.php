<?php

$i = isset($_COOKIE['index']) ? $_COOKIE['index'] : 0;
$bonus = isset($_COOKIE['bonus']) ? $_COOKIE['bonus'] : 0;
$count = isset($_COOKIE['count']) ? $_COOKIE['count'] : 0;

// Every action increases count
$count++;

if ($_GET['task'] == "next") {

    $i++;

    if ($i >= 4) {
        $i = 0;
    }

}
else if ($_GET['task'] == "previous") {

    $i--;

    if ($i < 0) {
        $i = 3;
    }

}
else if ($_GET['task'] == "bonus") {

    $bonus = $bonus + 5;

}
else if ($_GET['task'] == "reset") {

    $i = 0;
    $bonus = 0;
    $count = 0;

}

setcookie("index", $i, time() + 3600, "/");
setcookie("bonus", $bonus, time() + 3600, "/");
setcookie("count", $count, time() + 3600, "/");

header("Location: display.php");

?>