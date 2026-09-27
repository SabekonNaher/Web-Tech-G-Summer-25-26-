<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <?php
    if (isset($_COOKIE['count'])) {
        echo "You have visited " . $_COOKIE['count']."times.</p>";
    } else {
        echo "Cookie has been reset or not initialized.";
    }
    ?>
    <button><a href="Action.php">Refresh Page </a></button>
    
</body>
</html>