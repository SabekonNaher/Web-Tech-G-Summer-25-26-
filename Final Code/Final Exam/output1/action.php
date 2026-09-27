<?php

if (!isset($_COOKIE['index'])) {

    setcookie("index", 0, time() + 3600, "/");

}
else {

    $i = $_COOKIE['index'] + 1;

    if ($i >= 4) {
        $i = 0;
    }

    setcookie("index", $i, time() + 3600, "/");

}

header("Location: display.php");

?>