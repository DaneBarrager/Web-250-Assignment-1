<link rel="stylesheet" type="text/css" href="../styles/main.css">

<?php
	include '../view/header.php';

	global $lastName;
	global $customer;

	if ($debug) {
		echo "<p>Now in not_found.php";
	};

?>
<main>
    <h1>Customer List</h1>
    <p><p>Customer <?php echo "$lastName Not Found, try again!"; ?>
	<p>
</main>

<?php

    include '../view/footer.php';
?>

