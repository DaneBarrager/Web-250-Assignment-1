
<?php
	global $debug;
	global $customer;
	global $products;

	echo "	<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
	echo "<main>";
	    echo "<h1>Product List</h1>";
    	echo "<section>";
			include '../view/header2.php';
    		echo "<h2>Select Product:</h2>";
    		echo "<p>Customer:&nbsp&nbsp$customer[firstName] $customer[lastName]<p>";
    		echo "<form action='.' method='get' >";
        		echo "<input type='hidden' name='customer' value='$customer[customerID]'>";
        		echo "<label>Product:&nbsp&nbsp</label>";
        		echo "<select name='product'>";
        		foreach($products as $product) {
            		echo "<option value=$product[productCode]>$product[name]";
            		echo "</option>";
        		};
        		echo "</select>";
	    		echo "<br /><br />";
	    		echo "<input type='hidden' name='action' value='Register_Product'/>";
        		echo "<input type='submit' name='button' value='Register Product'/>";
    		echo "</form>";
    		echo "<br><br>";
		echo "</section>";
		include '../view/footer.php';
	echo "</main>";

?>
