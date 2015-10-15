<?php include '../view/header2.php'; ?>
<link rel="stylesheet" type="text/css" href="../styles/main.css">
<main>
    <h1>Add /Technician</h1>
    <div class="container">
		<form action="index.php" method="get" id="add_technician_form">
			<input type="hidden" name="action" value="add_technician">

			<label>Technician ID:&nbsp;&nbsp;</label>
			<input type="text" name="techID" style="text-align:right;"/>
			<br>

			<label>Technician First Name:&nbsp;&nbsp;</label>
			<input type="text" name="firstName" style="text-align:right;"/>
			<br>

			<label>Technician Last Name:&nbsp;&nbsp;</label>
			<input type="text" name="lastName" style="text-align:right;"/>
			<br>

			<label>Email:&nbsp;&nbsp;</label>
			<input type="text" name="email" style="text-align:right;"/>
			<br>

			<label>Phone:&nbsp;&nbsp;</label>
			<input type="text" name="phone" style="text-align:right;"/>
			<br>

			<label>Password:&nbsp;&nbsp;</label>
			<input type="text" name="password" style="text-align:right;"/>
			<br><br>

			<label>&nbsp;</label>
			<input type="submit" value="Add Technician" />
			<br><br><br>
		</form>
    </div>
    <p class="last_paragraph">
        <a href="index.php?action=list_technicians">View Technician List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
