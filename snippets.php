        		<select name="?">
        			<?php for ($i = 1; $i < 11; $i++) : ?>
            			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        			<?php endfor; ?>
        		</select><br>


        		//html embedded in php

        		<?php
        		if(test ) {
				//do stuff
				?>
				<!-- end the php section -->

				<!--  html here -->

				<?php }  ?>


// Connect to Database

<?php
	global $db;
	$debug = true;

	if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
		$dsn = 'mysql:host=localhost;dbname=users';
		$username = 'mgs_user';
		$password = 'password';
		$host_location = "local";
	} else {
		$dsn = 'mysql:host=localhost;dbname=users';
		$username = 'mgs_user';
		$password = 'password';
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




<!-- html 5 template
Dane Barrager
Web 250
-->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
    	<header>
        	<h1>Do Some Card Dealing</h1>
    	</header>
    	<main>
			<div class="my_content_container">
				<a href="display_suit.php" class="LinkButton">Display a Single Suit</a>
			</div>
				<p><p><br />
			<div class="my_content_container">
				<a href="deal_cards.php" class="LinkButton">Deal a Single Hand of Cards</a>
			</div>
    		<p><p>
        	<h1>Deal a Sorted Deck of Cards</h1>
 			<?php
	   			// load library functions
    			require('card_functions.php');
				//php code here
				include('display_deck.php');
				//include('display_suit.php');
				//include('deal_cards.php');
				echo "<p>Now back in Index.php";
			?>
    	</main>
	</body>
</html>



