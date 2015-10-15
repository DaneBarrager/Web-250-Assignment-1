<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../styles/main.css">
<main>
    <h1>Add Customer</h1>
    <div class="container">
		<form action="index.php" method="get" id="add_customer_form">
			<input type="hidden" name="action" value="add_customer">

			<label>Customer First Name:&nbsp;&nbsp;</label>
			<input type="text" name="firstName" style="text-align:right;"/>
			<br>

			<label>Customer Last Name:&nbsp;&nbsp;</label>
			<input type="text" name="lastName" style="text-align:right;"/>
			<br>

			<label>Email:&nbsp;&nbsp;</label>
			<input type="text" name="email" style="text-align:right;"/>
			<br>

			<label>Phone:&nbsp;&nbsp;</label>
			<input type="text" name="phone" style="text-align:right;"/>
			<br>

			<label>Address:&nbsp;&nbsp;</label>
			<input type="text" name="address" style="text-align:right;"/>
			<br>

			<label>Phone:&nbsp;&nbsp;</label>
			<input type="text" name="phone" style="text-align:right;"/>
			<br>

			<label>City:&nbsp;&nbsp;</label>
			<input type="text" name="city" style="text-align:right;"/>
			<br>

			<label>State:&nbsp;&nbsp;</label>
			<input type="text" name="state" style="text-align:right;"/>
			<br>

			<label>Postal Code:&nbsp;&nbsp;</label>
			<input type="text" name="postalCode" style="text-align:right;"/>
			<br>

			<label>Country Code:&nbsp;&nbsp;</label>
			<input type="text" name="countryCode" style="text-align:right;"/>
			<br>

			<label>Password:&nbsp;&nbsp;</label>
			<input type="text" name="password" style="text-align:right;"/>
			<br><br>

			<label>&nbsp;</label>
			<input type="submit" value="Add customer" />
			<br><br><br>
		</form>
    </div>
    <p class="last_paragraph">
        <a href="index.php?action=list_customers">View Customer List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
