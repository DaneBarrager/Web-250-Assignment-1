<?php

$debug = false;
$customers = array();

if ($debug) {
	echo "<p>Now in Customer Manager";
};

require_once('../model/database.php');
require_once('../model/customer_db.php');

$action =  $_GET['action'];
if ($debug) {
	echo "<p>action = $action <p><p>";
};


$lastName = $_GET['lastName'];
if ($debug) {
	echo "<p>Last Name = $lastName <p><p>";
};

if (($action == NULL) && ($lastName == NULL)) {
	$action ='list_customers';
}; /* action == NULL ... */

if (($action == NULL) && (!($lastName == NULL))) {
	$action ='list_customers_by_last_name';
}; /* action == NULL ... */


if ($action == 'list_customers') {
    if ($debug) {
    	echo "<p>action = list customers";
    };
    $customers = get_customers();
    include('../view/customer_list.php');
} /* if $action == list customers */
else if ($action == 'list_customers_by_last_name') {
    if ($debug) {
    	echo "<p>action = list customers by last name";
    };
    if ($lastName == '') {
    	echo "Last Name is empty, try again!";
    } else {
    	$customers = get_customers_by_last_name($lastName);
    	if ($customers == NULL) {
    		include '../view/not_found.php';
    	} else {
	    	include('../view/customer_list.php');
		}; /* else */
	} /* else */
}	/* else if $action == list customers  by last name*/
else if ($action == 'delete_customer') {
    $customerID = $_GET['customerID'];
    if ($debug) {
    	echo "<p>action = delete customer";
		echo "<p>customer Code = $customerID";
    };
    if ($customerID == NULL) {
        $error = "Invalid customer code data. Check all fields and try again.";
        include('../errors/error.php');
	} /* $customerID == NULL */
    else {
		if ($debug) {
			echo "<p>$action = delete customer";
		};
    	delete_customer($customerID);
    }; /* else */
} /* else if $action == delete customers */
else if ($action == 'select_customer') {
    if ($debug) {
    	echo "<p>action = select customer";
		echo "<p>customer Code = $customerID";
    };
    $customerID = $_GET['customerID'];
    if ($customerID == NULL) {
        $error = "Invalid customer code data. Check all fields and try again.";
        include('../errors/error.php');
	} /* $customerID == NULL */
    else {
		if ($debug) {
			echo "<p>action = select customer";
		};
    	$customer =  get_customer($customerID);

    	if ($debug) {
			echo "<p> statement = <p>";
			echo var_dump($customer);
		};
    	include('../view/customer_edit.php');
    }; /* else */
} /* else if $action == select customer" */
else if ($action == 'update_customer_form') {
    if ($debug) {
    	echo "<p>action = update_customer_form";
    };

    $customerID = $_GET['customerID'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];
    $address = $_GET['address'];
    $city  = $_GET['city'];
    $state = $_GET['state'];
    $postalCode = $_GET['postalCode'];
    $countryCode = $_GET['countryCode'];

    if ($firstName == NULL || $lastName == NULL || $email == NULL  || $phone == NULL || $password == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } /* if $code -- NULL ... */
    else {
        update_customer($customerID, $firstName, $lastName, $email, $phone, $address, $city, $state, $postalCode, $countryCode, $password);
        $customers = get_customers_by_last_name($lastName);
    	include('../view/customer_list_alternate.php');
    } /* else */
} /* else if  action = update customer form */
else if ($action == 'show_add_form') {
    if ($debug) {
    	echo "<p>action = show add form";
    };
    include('../view/customer_add.php');
} /* else if $action == show add form" */
else if ($action == 'add_customer') {
    if ($debug) {
    	echo "<p>action = add customer";
    };
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];
    $address = $_GET['address'];
    $city  = $_GET['city'];
    $state = $_GET['state'];
    $postalCode = $_GET['postalCode'];
    $countryCode = $_GET['countryCode'];


    if ($firstName == NULL || $lastName == NULL || $email == NULL  || $phone == NULL || $password == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } /* if $code -- NULL ... */
    else {
        add_customer($firstName, $lastName, $email, $phone, $address, $city, $state, $postalCode, $countryCode, $password);
    } /* else */
} /*  else if $action === add customer */
?>
