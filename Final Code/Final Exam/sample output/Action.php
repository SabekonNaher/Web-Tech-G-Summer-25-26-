
<?php
if (!isset($_COOKIE['count'])) {

        setcookie('count', 1, time() + 3600, "/");
   
     // Cookie valid for 1 hour
} else {
       setcookie('count', 1, time() + 3600, "/");
        setcookie('count', $_COOKIE['count'] + 1, time() + 3*3600, "/");
}
header("Location: display.php");
?>