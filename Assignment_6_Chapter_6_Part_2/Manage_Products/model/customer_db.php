<?php

    global $debug;

	if ($debug) {
		echo "<p>Now in Customer Database Manager";
	};


	function get_customers() {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_customers";
		};
		$query = 'SELECT * FROM customers;';
		$statement = $db->prepare($query);

		if ($debug) {
			echo "<p>  statement = <p>";
			echo var_dump($statement);
		};

		$statement->execute();
		$customers = $statement->fetchAll();
		$statement->closeCursor();
		return $customers;
	}; /* function get_customers */

	function get_customers_by_last_name($lastName) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_customers_by_last_name";
			echo "<p>Last Name = $lastName";
		};
		$query = "SELECT * FROM customers
				  WHERE lastName LIKE '{$lastName}%'";
		$statement = $db->prepare($query);
		$statement->bindValue(":lastName", $lastName);
		$statement->execute();
		$customers = $statement->fetchAll();
		$statement->closeCursor();
		if ($debug) {
			echo "<p>  statement = <p>";
			echo var_dump($statement);
			echo "<p> customers = <p>";
			echo var_dump($customer);
		};
		return $customers;
	}; /* function get_customers_by_last_name */


	function get_customer($customer_id) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_customer";
			echo "<p>$customer_id = $customer_id";
		};
		$query = 'SELECT * FROM customers
				  WHERE customerID = :customer_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":customer_id", $customer_id);
		$statement->execute();
		$customer = $statement->fetch();
		$statement->closeCursor();
		if ($debug) {
			echo "<p> customer = <p>";
			echo var_dump($customer);
		};

		return $customer;
	} /* function get_customer */

	function delete_customer($customer_id) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function delete_customer";
			echo "<p>$customer_id =  $customer_id";
		};
		$query = 'DELETE FROM customers
				  WHERE customerID = :customerCode';
		$statement = $db->prepare($query);
		$statement->bindValue(':customerCode', $customer_id);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$customer_id deleted.<p>";
    	echo "<p>";
    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='index.php?action='list_customers'>View customer List</a>";
	    echo "</p>";
	} /* function delete_customer */

	function add_customer($firstName, $lastName, $email, $phone, $address, $city, $state, $postalCode, $countryCode, $password) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function add_customer)";
			echo "<p>firstname = " . $firstName;
			echo "<p>lastName = " . $lastName;
			echo "<p>email = " . $email;
			echo "<p>phone = " . $phone;
			echo "<p>password = " . $password;
		};
		$query = 'INSERT INTO customers
					 (firstName, lastName, email, phone, address, city, state, postalCode, countryCode, password)
				  VALUES
					 (:firstName, :lastName, :email, :phone, :address, :city, :state, :postalCode, :countryCode, :password)';
		$statement = $db->prepare($query);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':phone', $phone);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':city', $city);
		$statement->bindValue(':state', $state);
		$statement->bindValue(':postalCode', $postalCode);
		$statement->bindValue(':countryCode',$countryCode);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$firstName $lastName added.<p>";
    	echo "<p>";
    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='index.php?action='list_customers'>View customer List</a>";
	    echo "</p>";
	} /* function add_customer */


	function update_customer($customerID, $firstName, $lastName, $email, $phone, $address, $city, $state, $postalCode, $countryCode, $password) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function update_customer";
			echo "<p>customer ID = $customerID";
			echo "<p>First Name = $firstName";
		};

		$query = 'UPDATE customers
				  SET firstName = :firstName,
				  lastName = :lastName,
				  email = :email,
				  phone = :phone,
				  address = :address,
				  city = :city,
				  state = :state,
				  postalCode = :postalCode,
				  countryCode = :countryCode,
				  password = :password
				  WHERE customerID = :customerID';
		$statement = $db->prepare($query);
		$statement->bindValue(':customerID', $customerID);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':phone', $phone);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':city', $city);
		$statement->bindValue(':state', $state);
		$statement->bindValue(':postalCode', $postalCode);
		$statement->bindValue(':countryCode', $countryCode);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$firstName $lastName updated.<p>";
		echo "<p>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='index.php?action='list_customers'>View customer List</a>";
		echo "</p>";
	} /* function update_customer */


	function lookup_email($email) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function lookup_email";
		}; /* debug */

		$query = "SELECT * FROM customers
				  WHERE email = :email";
		$result = $db->prepare($query);
		$result -> bindValue(':email', $email);
		$result -> execute();
		$customer = $result -> fetch();
		if ($debug) {
			echo '<p>';
			echo 'User email:  ' . $customer[email];
			echo '<p>';
			echo 'User First Name:  ' . $customer[firstName];
			echo "<p><p>";
			echo 'User Last Name:  ' . $customer[lastName];
			echo "<p><p>";
		};
		$result -> closeCursor();

		if ($debug) {
			echo "<p> customer = <p>";
			echo var_dump($customer);
		}; /* customer */

		return $customer;

	}; /* function lookup_email */


?>
