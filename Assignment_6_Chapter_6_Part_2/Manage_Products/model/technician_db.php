<?php

    global $debug;

	if ($debug) {
		echo "<p>Now in technician Manager";
	};


	function get_technicians() {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_technicians";
		};
		$query = 'SELECT * FROM technicians;';
		$statement = $db->prepare($query);

		if ($debug) {
			echo "<p>  statement = <p>";
			echo var_dump($statement);
		};

		$statement->execute();

		if ($debug) {
			echo "<p> statement = <p>";
			echo var_dump($statement);
		};

		$technicians = $statement->fetchAll();

		if ($debug) {
			echo "<p> technicians = <p>";
			echo var_dump($technicians);
		};

		$statement->closeCursor();

		if ($debug) {
			echo "<p> technicians = <p>";
			echo var_dump($statement);
		};

		return $technicians;
	};

	function get_technician($technician_id) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function get_technician)";
			echo "<p>$technician_id) = " . $technician_id;
		};
		$query = 'SELECT * FROM technicians
				  WHERE technicianCode = :technician_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":techID", $technician_id);
		$statement->execute();
		$technician = $statement->fetch();
		$statement->closeCursor();
		return $technician;
	}

	function delete_technician($technician_id) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function delete_technician";
			echo "<p>$technician_id =  $technician_id";
		};
		$query = 'DELETE FROM technicians
				  WHERE techID = :technicianCode';
		$statement = $db->prepare($query);
		$statement->bindValue(':technicianCode', $technician_id);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header2.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$technician_id deleted.<p>";
    	echo "<p>";
    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='index.php?action='list_technicians'>View technician List</a>";
	    echo "</p>";
	}

	function add_technician($techID, $firstName, $lastName, $email, $phone, $password) {
		global $db;
		global $debug;

		if ($debug) {
			echo "<p>Now in Function add_technician)";
			echo "<p>techID = " . $techID;
			echo "<p>firstname = " . $firstName;
			echo "<p>lastName = " . $lastName;
			echo "<p>email = " . $email;
			echo "<p>phone = " . $phone;
			echo "<p>password = " . $password;
		};
		$query = 'INSERT INTO technicians
					 (techID, firstName, lastName, email, phone, password)
				  VALUES
					 (:techID, :firstName, :lastName, :email, :phone, :password)';
		$statement = $db->prepare($query);
		$statement->bindValue(':techID', $techID);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':phone', $phone);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$statement->closeCursor();
		echo "<link rel='stylesheet' type='text/css' href='../styles/main.css'>";
		include '../view/header2.php';
		echo "<p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$techID added.<p>";
    	echo "<p>";
    	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='index.php?action='list_technicians'>View technician List</a>";
	    echo "</p>";
	}


function update_technician($code, $name, $version, $release_date) {
    global $db;
	global $debug;

    if ($debug) {
		echo "<p>Now in Function update_technician";
	};

    $query = 'UPDATE technicians
              SET name = :name,
                  version = :version,
                  releaseDate = :release_date
              WHERE technicianCode = :technician_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':release_date', $release_date);
    $statement->bindValue(':technician_code', $code);
    $statement->execute();
    $statement->closeCursor();
}

?>
