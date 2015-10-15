<?php

$debug = false;
$products = array();

if ($debug) {
	echo "<p>Now in Product Manager";
};

require_once('../model/database.php');
require_once('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
        if ($debug) {
        	echo "<p>Action = list products";
        }; /* if $debug */
    } /* $action == NULL */
}; /* $action == NULL */

if ($action == 'list_products') {
    if ($debug) {
    	echo "<p>action = list products";
    };
    $products = get_products();
    include('../view/product_list.php');
} /* if $action == list products */
else if ($action == 'delete_product') {
    $productCode = $_GET['productCode'];
    if ($debug) {
    	echo "<p>action = delete product";
		echo "<p>Product Code = $productCode";
    };
    if ($productCode == NULL) {
        $error = "Invalid product code data. Check all fields and try again.";
        include('../errors/error.php');
	} /* $productCode == NULL */
    else {
		if ($debug) {
			echo "<p>$action = delete product";
		};
    	delete_product($productCode);
    }; /* else */
} /* $action == delete products */
else if ($action == 'show_add_form') {
    if ($debug) {
    	echo "<p>action = show add form";
    };
    include('../view/product_add.php');
} /* $action == show add form" */
else if ($action == 'add_product') {
    if ($debug) {
    	echo "<p>action = add product";
    };
    $productCode = $_GET['productCode'];
    $name = $_GET['name'];
    $version = $_GET['version'];
    $releaseDate = $_GET['releaseDate'];
    if ($productCode == NULL || $name == NULL || $version == NULL || $releaseDate == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } /* if $code -- NULL ... */
    else {
        add_product($productCode, $name, $version, $releaseDate);
    } /* else */
} /*  $action === add product */
?>
