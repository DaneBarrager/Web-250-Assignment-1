<?php
	// set debugging mode and other global variables
	$debug = false;
	global $db;

	// connect to database
    require_once('database.php');
	require_once('my_functions.php');

    // Get email
    $email = $_GET['email'];
	if ($debug) {
		echo "email = " . $email . "<p><p>";
	};
	if (!($email == "")) {
		if (email_exists($email)) {
			if ($debug) {
				echo "<p><p>email exists<p>";
			};
			$level = level($email);
		if ($debug) {
			echo "<p>Level = " . $level . "<p>";
		};
			echo "<h1>Welcome</h1>";
			echo "<p>The email address you are logged in as is:  " . $email;
			if ($level == 'A') {
				echo "<p>You are logged in as Admin<p>";
			}
			else {
				echo "<p>You are logged in as Member<p>";
			};
		} /* then */
		else {
			echo "<p><p>Email does not exist, please try again<p>";
		} /* else */
	} /* then */
	else {
		echo "Email is empty, please enter: <p>";
	} /* else */
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Users</h1>
    </div>

    <div id="main">
        <h1>Enter Email Address</h1>
    		<form action='login.php' method='GET'>
				Email Address: <input type="text" name="email"></br></br></br>
  				<input type="submit" value="Submit">
			</form>
    </div> <!-- Main -->

    </div><!-- end page -->
</body>
</html>
