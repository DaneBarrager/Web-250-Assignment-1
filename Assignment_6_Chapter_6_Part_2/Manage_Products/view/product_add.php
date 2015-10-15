<?php include '../view/header2.php'; ?>
<link rel="stylesheet" type="text/css" href="../styles/main.css">
<main>
    <h1>Add Product</h1>
    <div class="container">
		<form action="index.php" method="get" id="add_product_form">
			<input type="hidden" name="action" value="add_product">

			<label>Product Code:&nbsp;&nbsp;</label>
			<input type="text" name="productCode" style="text-align:right;"/>
			<br>

			<label>Product Name:&nbsp;&nbsp;</label>
			<input type="text" name="name" style="text-align:right;"/>
			<br>

			<label>Version:&nbsp;&nbsp;</label>
			<input type="text" name="version" style="text-align:right;"/>
			<br>

			<label>Release Date:&nbsp;&nbsp;</label>
			<input type="text" name="releaseDate" style="text-align:right;"/>
			<br><br>

			<label>&nbsp;</label>
			<input type="submit" value="Add Product" />
			<br><br><br>
		</form>
    </div>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
