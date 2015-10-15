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

if ($debug) {
	echo "<p>Last Email = $email <p><p>";
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
    include('../view/login.php');
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

		$products = get_products();
		include('../view/select_product.php');

	}; /* customer not equal NULL */

}	/* else if $action == validate email */

else if ($action == 'Register_Product') {
    if ($debug) {
    	echo "<p>action = register product";
    };
    	register_product($customer, $product);
} /* else if $action == register product */
?>
