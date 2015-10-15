<?php

    global $db;
    global $debug;

	if ($debug) {
		echo "<p>Now in Connect to Database";
	};


	if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
		$dsn = 'mysql:host=localhost;dbname=tech_support';
		$username = 'ts_user';
		$password = 'pa55word';
		$host_location = "local";
	} else {
		$dsn = 'mysql:host=localhost;dbname=tech_support';
		$username = 'ts_user';
		$password = 'pa55word';
		$host_location = "remote";
	}

	try {
		$db = new PDO($dsn, $username, $password);
		if ($debug) {
			echo "<p>Successfully connected to: " . $host_location;
			echo "<p />";
		}
	}
	catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
		exit();
	}



?>
