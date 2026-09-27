<?php

// step 1.1 check if theme was set (check if cookie isset)
if (isset($_COOKIE['theme'])) {
	if ($_COOKIE['theme'] == 'dark') {
		setcookie("theme", "light", time() + 3600*24*7);
	} else if ($_COOKIE['theme'] == 'light') { 
		setcookie("theme", "dark", time() + 3600*24*7);
	}
} else {
	setcookie("theme", "dark", time() + 3600*24*7);
}

// step 2: redirect to the index page
header("Location: index.php");