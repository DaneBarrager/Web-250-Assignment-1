<!DOCTYPE html>
<html>
	<head>
    	<title>Guess</title>
    	<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
    	<header>
        	<h1>Guess a Number</h1>
    	</header>
    	<main>
        	<h1>Guess</h1>
             	<p>Guess a number between and 1 and 10.</p>
             	<?php echo $guess ?>
			<?php
				// Start session management with a persistent cookie
				$lifetime = 60 * 60 * 24 * 14;         // 2 weeks in seconds
				session_set_cookie_params($lifetime, '/');
				session_start();

				if (empty($_SESSION['guess'])) {
					$random = (mt_rand(1, 10));
					$_SESSION['guess'] = $random;
				}
				if (empty($_SESSION['number_of_guesses']) && ($_SESSION['number_of_guesses'] != 0)) {
					echo "number of quesses is empty  ";
					$_SESSION['number_of_guesses'] = $number_of_quesses;
				} elseif ($_SESSION['number_of_guesses'] >= 0) {
					echo "Current guess is:  ";
					$number_of_quesses = ($_SESSION['number_of_guesses']);
					++$number_of_quesses;
					$_SESSION['number_of_guesses'] = $number_of_quesses;
					echo $_SESSION['number_of_guesses'];
				}
				echo "<p><p>  ";
				echo "<p>Session Name:  ";
				echo session_name();
				echo "<p><p>  ";
				if (isset($_POST['guess'])) {
					$guess = $_POST['guess'];
					echo $guess;
					if ($_SESSION['guess'] == $guess) {
						echo "  We have a winner !!!!!!!!!";
				       // Clear session data from memory
        				unset ($_SESSION['guess']);
        				unset ($_SESSION['number_of_guesses']);
				        // Clean up session ID
        				session_destroy();

        				// Delete the cookie for the session
        				$name = session_name();                // Get name of the session cookie
        				$expire = strtotime('-1 year');        // Create expiration date in the past
        				$params = session_get_cookie_params(); // Get session params
        				$path = $params['path'];
        				$domain = $params['domain'];
        				$secure = $params['secure'];
        				$httponly = $params['httponly'];
        				setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
						echo "<p><p>";
        				echo "<form method='post' action='guess.php'>";
    					echo "<button type='submit'>Replay</button>";
						echo "<p><p>";
						echo "</form>";
 					}

					elseif ($_SESSION['guess'] > $guess) {
						echo "  You guessed too low";
					}
					elseif ($_SESSION['guess'] < $guess) {
						echo "  You guessed too high";
					}
				} else {
				$guess = "";
				};
			?>
			<h2>Process Entry</h2>
    		<form action="guess.php" method="post">
        		<input type="hidden" name="action" value="guess">
        		<label>Number to Guess:</label>
        		<select name="guess">
        			<?php for ($i = 1; $i < 11; $i++) : ?>
            			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        			<?php endfor; ?>
        		</select><br>
				<label>&nbsp;</label>
        		<input type="submit" value="guess"><br>
	        	<span><?php echo $guess; ?></span><br>
    		</form>

    	</main>
	</body>
</html>








