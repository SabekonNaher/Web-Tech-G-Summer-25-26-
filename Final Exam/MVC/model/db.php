<?php

$conn = mysqli_connect("localhost", "root", "", "bloodbridge_db");

if (!$conn) {
    die(mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>
