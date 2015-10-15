<link rel="stylesheet" type="text/css" href="../styles/main.css">
<?php

	include '../view/header2.php';

	// set debugging mode and other global variables
	global $debug;
	global $db;

    // Get email

    $email = $_GET['email'];

	if ($debug) {
		echo "email = " . $email . "<p><p>";
	}; /* debug */

?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<main>
    <h1>Login</h1>
    <section>
		<body>
    		<div id="main">
    			<h2>Customer Login</h2>
    			<p>You must login before you can register a product.<p>
				<form action='index.php' method='GET' id="login_form">
					<input type="hidden" name="action" value="validate_email">
					Email Address:<br><br><input type="text" name="email">
					<input type="submit" value="Login">
				</form>
    		</div> <!-- Main -->
		</body>
	</section>
</main>
</html>


