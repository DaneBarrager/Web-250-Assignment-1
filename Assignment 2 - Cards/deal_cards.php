<?php
	function deal_cards($deck, $number) {
    	echo "<p><p>";
		echo "Now in function deal_cards";
        echo("<ul>");
        $index = 0;
        $shuffled_deck = $deck;
        shuffle($shuffled_deck);
		foreach ($shuffled_deck as $key =>$value) {
        	++ $index;
			if ($index <= $number ) {
				echo("<br /><li>$value key = $key</li>");
				echo("<br /><img src='$value' src='$value' height='60' width='42'>");
				echo("<br />");
			} else {}
			// do nothing
		};
	}
?>

<!DOCTYPE html>
<html>
	<head>
    	<title>Number of Cards to Deal</title>
    	<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
    	<header>
        	<h1>Pick a Number</h1>
    	</header>
    	<main>
			<?php
				if (isset($_GET['pick'])) {
					$pick = $_GET['pick'];
					echo "The suit you picked was:  ";
					echo $pick;
					echo "<p><p>";
$deck = array("c01.png","c02.png","c03.png","c04.png","c05.png","c06.png","c07.png","c08.png","c09.png","c10.png","c11.png","c12.png","c13.png","d01.png","d02.png","d03.png","d04.png","d05.png","d06.png","d07.png","d08.png","d09.png","d10.png","d11.png","d12.png","d13.png","h01.png","h02.png","h03.png","h04.png","h05.png","h06.png","h07.png","h08.png","h09.png","h10.png","h11.png","h12.png","h13.png","s01.png",
"s02.png","s03.png","s04.png","s05.png","s06.png","s07.png","s08.png","s09.png","s10.png","s11.png","s12.png","s13.png");
 					deal_cards($deck, $pick);
 				}
 				else {
        			echo "<h1>Pick</h1>";
             		echo "<p>Pick a Suit from the Drop Down</p>";
    				echo "<form action='deal_cards.php' method='GET'>";
        				echo "<input type='hidden' name='action' value='pick'>";
        				echo "<label>Suit to Pick:</label>";
        					echo "<select name='pick'>";
            					echo "<option value=''> </option>";
            					echo "<option value='1'>One/option>";
            					echo "<option value='2'>Two</option>";
            					echo "<option value='3'>Three</option>";
             					echo "<option value='4'>Four</option>";
            					echo "<option value='5'>Five</option>";
            					echo "<option value='6'>Six</option>";
            					echo "<option value='7'>Seven</option>";
            					echo "<option value='8'>Eight</option>";
            					echo "<option value='9'>Nine</option>";
        					echo "</select><br>";
						echo "<label>&nbsp;</label>";
						echo "<p><p>";
        				echo "<input type='submit' value='pick'><br>";
	        			echo "<span><?php echo $pick; ?></span><br>";
    				echo "</form>";
    			}
			?>
    	</main>
	</body>
</html>
