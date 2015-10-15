<?php include '../view/header.php'; ?>
<?php

	if ($debug) {
		echo "<p>Now in customer update";
		echo "<p> customer = <p>";
		echo var_dump($customer);
	};
	global $customer;
    global $debug;
?>


<link rel="stylesheet" type="text/css" href="../styles/main.css">
<main>
    <h1>Update Customer</h1>
    <div class="container">
		<form action="index.php" method="get" id="update_customer_form">
			<input type="hidden" name="action" value="update_customer_form">

			<input type="hidden" name="customerID" value="<?php echo $customer[customerID]; ?>"/>

			<label>Customer First Name:&nbsp;&nbsp;</label>
			<input type="text" name="firstName" style="text-align:right;" value="<?php echo $customer[firstName]; ?>"/>
			<br>

			<label>Customer Last Name:&nbsp;&nbsp;</label>
			<input type="text" name="lastName" style="text-align:right;" value="<?php echo $customer[lastName]; ?>"/>
			<br>

			<label>Email:&nbsp;&nbsp;</label>
			<input type="text" name="email" style="text-align:right;" value="<?php echo $customer[email]; ?>"/>
			<br>

			<label>Phone:&nbsp;&nbsp;</label>
			<input type="text" name="phone" style="text-align:right;" value="<?php echo $customer[phone]; ?>"/>
			<br>

			<label>Address:&nbsp;&nbsp;</label>
			<input type="text" name="address" style="text-align:right;" value="<?php echo $customer[address]; ?>"/>
			<br>

			<label>Phone:&nbsp;&nbsp;</label>
			<input type="text" name="phone" style="text-align:right;" value="<?php echo $customer[phone]; ?>"/>
			<br>

			<label>City:&nbsp;&nbsp;</label>
			<input type="text" name="city" style="text-align:right;" value="<?php echo $customer[city]; ?>"/>
			<br>

			<label>State:&nbsp;&nbsp;</label>
			<input type="text" name="state" style="text-align:right;" value="<?php echo $customer[state]; ?>"/>
			<br>

			<label>Postal Code:&nbsp;&nbsp;</label>
			<input type="text" name="postalCode" style="text-align:right;" value="<?php echo $customer[postalCode]; ?>"/>
			<br>

			<label>Country Code:&nbsp;&nbsp;</label>
			<input type="text" name="countryCode" style="text-align:right;" value="<?php echo $customer[countryCode]; ?>"/>
			<br>

			<label>Password:&nbsp;&nbsp;</label>
			<input type="text" name="password" style="text-align:right;" value="<?php echo $customer[password]; ?>"/>
			<br><br>

			<label>&nbsp;</label>
			<input type="submit" value="Update customer"/>
			<br><br><br>
		</form>
    </div>
    <p class="last_paragraph">
        <a href="index.php?action=list_customers">View Customer List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
