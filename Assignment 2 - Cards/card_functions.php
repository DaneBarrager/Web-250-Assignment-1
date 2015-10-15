<?php
    // create a function
    function create_deck() {
		echo "Now in function create_deck";
// load the deck
global $deck;
$deck = array("c01.png","c02.png","c03.png","c04.png","c05.png","c06.png","c07.png","c08.png","c09.png","c10.png","c11.png","c12.png","c13.png","d01.png","d02.png","d03.png","d04.png","d05.png","d06.png","d07.png","d08.png","d09.png","d10.png","d11.png","d12.png","d13.png","h01.png","h02.png","h03.png","h04.png","h05.png","h06.png","h07.png","h08.png","h09.png","h10.png","h11.png","h12.png","h13.png","s01.png",
"s02.png","s03.png","s04.png","s05.png","s06.png","s07.png","s08.png","s09.png","s10.png","s11.png","s12.png","s13.png");
		return $deck;

    };

    function display_deck($deck) {
    	echo "<p>";
		echo "Now in function display_deck";
        echo("<ul>");
        foreach ($deck as $key =>$value) {
			echo("<li>$value key = $key</li>");
			echo("<img src='$value' src='$value' height='60' width='42'>");
			echo("<br />");
			echo "<p></p>";
		};
		echo "</ul>";
	}

	function display_suit($deck, $suit) {
    	echo "<p><p>";
		echo "Now in function display_suit";
		echo "<p>";
		echo "Suit = ";
		echo $suit;
        $index = '';
        echo("<ul>");
		foreach ($deck as $key =>$value) {
        	$index = substr($value, 0, 1);
			if ($index == $suit) {
				echo("<br /><li>$value key = $key</li>");
				echo("<br /><img src='$value' src='$value' height='60' width='42'>");
				echo("<br />");
				$j ++;
			} else {}
			// do nothing
		} // foreach
	} // function

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
				echo("<li>$value key = $key</li>");
				echo("<br /><img src='$value' src='$value' height='60' width='42'>");
			} else {}
			// do nothing
		};
        echo("</ul>");
	}
?>

