<?php

$debug = false;
$technicians = array();

if ($debug) {
	echo "<p>Now in Technician Manager";
};

require_once('../model/database.php');
require_once('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_technicians';
        if ($debug) {
        	echo "<p>Action = list technicians";
        }; /* if $debug */
    } /* $action == NULL */
}; /* $action == NULL */

if ($action == 'list_technicians') {
    if ($debug) {
    	echo "<p>action = list technicians";
    };
    $technicians = get_technicians();
    include('../view/technician_list.php');
} /* if $action == list technicians */
else if ($action == 'delete_technician') {
    $techID = $_GET['techID'];
    if ($debug) {
    	echo "<p>action = delete technician";
		echo "<p>technician Code = $techID";
    };
    if ($techID == NULL) {
        $error = "Invalid technician code data. Check all fields and try again.";
        include('../errors/error.php');
	} /* $techID == NULL */
    else {
		if ($debug) {
			echo "<p>$action = delete technician";
		};
    	delete_technician($techID);
    }; /* else */
} /* $action == delete technicians */
else if ($action == 'show_add_form') {
    if ($debug) {
    	echo "<p>action = show add form";
    };
    include('../view/technician_add.php');
} /* $action == show add form" */
else if ($action == 'add_technician') {
    if ($debug) {
    	echo "<p>action = add technician";
    };
    $techID = $_GET['techID'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];
    if ($techID == NULL || $firstName == NULL || $lastName == NULL || $email == NULL  || $phone == NULL || $password == NULL) {
        $error = "Invalid technician data. Check all fields and try again.";
        include('../errors/error.php');
    } /* if $code -- NULL ... */
    else {
        add_technician($techID, $firstName, $lastName, $email, $phone, $password);
    } /* else */
} /*  $action === add technician */
?>
