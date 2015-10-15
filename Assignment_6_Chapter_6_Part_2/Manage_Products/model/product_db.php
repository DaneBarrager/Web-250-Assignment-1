<?php

	function get_products() {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_products";
		};
		$query = 'SELECT * FROM products;';
		$statement = $db->prepare($query);
		$statement->execute();
		$products = $statement->fetchAll();
		$statement->closeCursor();
		return $products;
	};

	function get_registered_products($email) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_registered_products";
			echo "<p>Customer Email = " . $email;
		};
		$query = 'select products.productCode, products.name from products inner join registrations on products.productCode = registrations.productCode inner join customers on registrations.customerID = customers.customerID where customers.email = :email';
		$statement = $db->prepare($query);
		$statement->bindValue(":email", $email);
		$statement->execute();
		$products = $statement->fetchAll();
		$statement->closeCursor();
		return $products;
	};

	function get_product($product_id) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_product)";
			echo "<p>$product_id) = " . $product_id;
		};
		$query = 'SELECT * FROM products
				  WHERE productCode = :product_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":productCode", $product_id);
		$statement->execute();
		$product = $statement->fetch();
		$statement->closeCursor();
		return $product;
	}

	function delete_product($product_id) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function delete_product";
			echo "<p>$product_id =  $product_id";
		};
		$query = 'DELETE FROM products
				  WHERE productCode = :productCode';
		$statement = $db->prepare($query);
		$statement->bindValue(':productCode', $product_id);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header2.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$product_id deleted.<p>";
    	echo "<p>";
    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='index.php?action='list_products'>View Product List</a>";
	    echo "</p>";
	}

	function add_product($code, $name, $version, $releaseDate) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function add_product)";
			echo "<p>productCode = " . $code;
			echo "<p>name = " . $name;
			echo "<p>releaseDate = " . $releaseDate;
			echo "<p>version = " . $version;

		};
		$query = 'INSERT INTO products
					 (productCode, name, releaseDate, version)
				  VALUES
					 (:productCode, :name, :releaseDate, :version)';
		$statement = $db->prepare($query);
		$statement->bindValue(':productCode', $code);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':releaseDate', $releaseDate);
		$statement->bindValue(':version', $version);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header2.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$code added.<p>";
    	echo "<p>";
    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='index.php?action='list_products'>View Product List</a>";
	    echo "</p>";
	}

function get_products_by_customer($email) {
    global $db;
	global $debug;

    if ($debug) {
		echo "<p>Now in Function get_products_by_customer";
	};


    $query = 'SELECT products.productCode, products.name
              FROM products
                INNER JOIN registrations ON products.productCode = registrations.productCode
                INNER JOIN customers ON registrations.customerID = customers.customerID
              WHERE customers.email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function update_product($code, $name, $version, $release_date) {
    global $db;
	global $debug;

    if ($debug) {
		echo "<p>Now in Function update_product";
	};

    $query = 'UPDATE products
              SET name = :name,
                  version = :version,
                  releaseDate = :release_date
              WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':release_date', $release_date);
    $statement->bindValue(':product_code', $code);
    $statement->execute();
    $statement->closeCursor();
}

function register_product($customerID, $productCode) {
    global $db;
	global $debug;

    if ($debug) {
		echo "<p>Now in Function register_product";
		echo "<p>customer ID = $customerID";
		echo "<p>product Code  = $productCode";
	};

	$date = date("Y-m-d");

  	$query = "INSERT INTO registrations (customerID, productCode, registrationDate) VALUES (:customerID, :productCode, :registrationDate)";
  		$statement = $db->prepare($query);
    	$statement->bindValue(':customerID', $customerID);
    	$statement->bindValue(':productCode', $productCode);
    	$statement->bindValue(':registrationDate', $date);

    	if ($debug) {
  			echo "<p>query = " . $query;
  		};

    	$statement->execute();
    	$statement->closeCursor();

    	echo "<p>Product " . $productCode . " registered to customer " . $customerID;
    	$_GET['action'] = NULL;
    	include "index.php";
}


function create_incident($customerID, $productCode, $title, $description) {
    global $db;
	global $debug;

    if ($debug) {
		echo "<p>Now in Function create incident";
		echo "<p>Customer ID = $customerID";
		echo "<p>Product Code  = $productCode";
		echo "<p>Title  = $title";
		echo "<p>Description  = $description";
	};

	$date = date("Y-m-d");

  	$query =  "INSERT INTO incidents (customerID, productCode, title, description, dateOpened) VALUES (:customerID, :productCode, :title, :description, :dateOpened)";

  		$statement = $db->prepare($query);
    	$statement->bindValue(':customerID', $customerID);
    	$statement->bindValue(':productCode', $productCode);
    	$statement->bindValue(':title', $title);
    	$statement->bindValue(':description', $description);
    	$statement->bindValue(':dateOpened', $date);

    	if ($debug) {
  			echo "<p>query = " . $query;
  		};

    	$statement->execute();
    	$statement->closeCursor();

    	echo "<p>Incident for product " . $productCode . " entered for customer " . $customerID;
    	$_GET['action'] = NULL;
    	include "index.php";
}

?>
