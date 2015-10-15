
<?php
	echo "Now in file display_deck.php";
	echo "<p><p>";
	$deck = create_deck();
	$return = display_deck($deck);
	echo $return;
?>
