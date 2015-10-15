<link rel="stylesheet" type="text/css" href="../styles/main.css">

<?php
include '../view/header2.php';

global $products;
if ($debug) {
	echo "<p>Now in product_list.php";
};

?>
<main>
    <h1>Product List</h1>
    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Product Code</th>
                <th>Name</th>
                <th>Version</th>
                <th class="right">Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo '&nbsp;&nbsp;&nbsp;' . $product['version']; ?></td>
                <td class="right"><?php echo $product['releaseDate']; ?></td>
                <td><form action="." method="get">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="productCode"
                           value="<?php echo $product['productCode']; ?>">
                    <p><p>
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Product</a></p>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
