<link rel="stylesheet" type="text/css" href="../styles/main.css">


<?php
include '../view/header.php';

global $customers;
if ($debug) {
	echo "<p>Now in customer_list.php";
};

?>
<main>
    <h1>Customer List</h1>
    <section>
        <!-- display a table of customers -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><form action="." method="get">
                    <input type="hidden" name="action"
                           value="delete_customer">
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <p><p>
                    <input type="submit" value="Delete">
                </form></td>
                <td><form action="." method="get">
                    <input type="hidden" name="action"
                           value="select_customer">
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <p><p>
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add customer</a></p>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
