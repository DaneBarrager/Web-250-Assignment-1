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
    <section>
		<body>
    		<div id="main">
    			<h2>Get Customer</h2>
    			<p>You must enter the customer's email address to select the customer.<p>
				<form action='index.php' method='GET' id="login_form">
					<input type="hidden" name="action" value="validate_email">
					Email Address:<br><br><input type="text" name="email">
					<input type="submit" value="Get Customer">
				</form>
    		</div> <!-- Main -->
		</body>
	</section>
</main>
</html>


