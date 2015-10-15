<!DOCTYPE html>
<html>
	<head>
    	<title>Pick a Suit</title>
    	<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
    	<header>
        	<h1>Pick a Suit</h1>
    	</header>
    	<main>
			<?php
			 	//
 				// load library functions
    			require('card_functions.php');
				if (isset($_GET['pick'])) {
					echo "<div class='my_content_container'>";
					echo "<a href='index.php'>Return to Display All Cards</a>";
					echo "</div>";
					echo "<p>";
					echo "<br />";
					echo "<p>";
					echo "<div class='my_content_container'>";
					echo "<a href='display_suit.php'>Pick a Different Suit</a>";
					echo "</div>";
					echo "<p>";
					$pick = $_GET['pick'];
					echo "The suit you picked was:  ";
					echo $pick;
					echo "<p><p>";
					$deck = create_deck();
 					display_suit($deck, $pick);
 				}
 				else {
        			echo "<h1>Pick</h1>";
             		echo "<p>Pick a Suit from the Drop Down</p>";
    				echo "<form action='display_suit.php' method='GET'>";
        				echo "<input type='hidden' name='action' value='pick'>";
        				echo "<label>Suit to Pick:</label>";
        					echo "<select name='pick'>";
            					echo "<option value=''> </option>";
            					echo "<option value='s'>Spades</option>";
            					echo "<option value='c'>Clubs</option>";
            					echo "<option value='d'>Diamonds</option>";
            					echo "<option value='h'>Hearts</option>";
        					echo "</select><br>";
						echo "<label>&nbsp;</label>";
						echo "<p><p>";
        				echo "<input type='submit' value='Pick'><br>";
	        			echo "<span><?php echo $pick; ?></span><br>";
    				echo "</form>";
    			}
			?>
    	</main>
	</body>
</html>
