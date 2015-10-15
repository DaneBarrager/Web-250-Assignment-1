<?php
	global $db;
	global $debug;

	if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
		$dsn = 'mysql:host=localhost;dbname=users';
		$username = 'mgs_user';
		$password = 'pa55word';
		$host_location = "local";
	} else {
		$dsn = 'mysql:host=localhost;dbname=users';
		$username = 'mgs_user';
		$password = 'pa55word';
		$host_location = "remote";
	}

	try {
		$db = new PDO($dsn, $username, $password);
		if ($debug) {
			echo "Successfully connected to: " . $host_location;
			echo "<p />";
		}
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
        echo $error_message;
		exit();
	}
?>



