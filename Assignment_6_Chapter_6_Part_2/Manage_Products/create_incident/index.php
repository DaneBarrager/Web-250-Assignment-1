<?php

$debug = false;
$products = array();

if ($debug) {
	echo "<p>Now in Register Product";
}; /* debug */

require_once('../model/database.php');
require_once('../model/customer_db.php');
require_once('../model/product_db.php');

$action =  $_GET['action'];

if ($debug) {
	echo "<p>action = $action <p><p>";
}; /* debug */


$email = $_GET['email'];
$product = $_GET['product'];
$customer = $_GET['customer'];
$title = $_GET['title'];
$description = $_GET['description'];

if ($debug) {
	echo "<p>Email = $email";
	echo "<p>product = $product";
	echo "<p>customer = $customer";
}; /* debug */

if (($action == NULL) && ($email == NULL)) {
	$action = 'lookup_email';
}; /* action == NULL ... */

if (($action == NULL) && (!($email == NULL))) {
	$action ='lookup_email';
}; /* action == NULL ... */


if ($action == 'lookup_email') {
    if ($debug) {
    	echo "<p>action =  lookup_email";
    }; /* debug */
    include('../view/get_email.php');
} /* if $action == loookup email */
else if ($action == 'validate_email') {
    if ($debug) {
    	echo "<p>action = validate_email";
    }; /* $debug */

    $customer = lookup_email($email);

	if ($customer == NULL) {
		$error = 'Email not found';
		include('../errors/error.php');
	} else {
		if ($debug) {
			echo "<p>Customer Found ";
		}; /* debug */

		$products = get_registered_products($email);

		if ($debug) {
			echo "<p>Registered Products = ";
			echo var_dump($products);
		};

		include('../view/create_incident.php');

	}; /* customer not equal NULL */

}	/* else if $action == validate email */

else if ($action == 'Create_Incident') {
    if ($debug) {
    	echo "<p>action = Create Incident";
    };
    	create_incident($customer, $product, $title, $description);
} /* else if $action == register product */
?>
