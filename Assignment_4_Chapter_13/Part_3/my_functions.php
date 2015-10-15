<?php

	global $debug;

	function email_exists($email) {
		// Get level for current user
		global $db;
		$query = "SELECT * FROM users
				  WHERE email = :email";
		$result_set = $db->prepare($query);
		$result_set -> bindValue(':email', $email);
		$result_set -> execute();
		$user = $result_set -> fetch();
		if ($debug) {
			echo 'User email:  ' . $user[email];
			echo '<p>';
			echo 'User level:  ' . $user[userLevel];
			echo "<p><p>";
		};
		$result_set -> closeCursor();
		if (!($user[email]) == "") {
			return true;
		}
		else {
			return false;
		};
	}

	function level($email) {
		// Get level for current user
		global $db;
		$query = "SELECT * FROM users
				  WHERE email = :email";
		$result_set = $db->prepare($query);
		$result_set -> bindValue(':email', $email);
		$result_set -> execute();
		$user = $result_set -> fetch();
		if ($debug) {
			echo 'User email:  ' . $user[email];
			echo '<p>';
			echo 'User level:  ' . $user[userLevel];
			echo "<p><p>";
		};
		$result_set -> closeCursor();
		if (!($user[email]) == "") {
			return $user[userLevel];
		}
		else {
			echo "Error occurred";
		};
	}

?>



