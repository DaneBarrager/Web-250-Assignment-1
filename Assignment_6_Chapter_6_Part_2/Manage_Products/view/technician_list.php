<link rel="stylesheet" type="text/css" href="../styles/main.css">

<?php
include '../view/header2.php';

global $technicians;
if ($debug) {
	echo "<p>Now in technician_list.php";
};

?>
<main>
    <h1>Technician List</h1>
    <section>
        <!-- display a table of technicians -->
        <table>
            <tr>
                <th>Technician ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th class="right">Password</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <td><?php echo $technician['techID']; ?></td>
                <td><?php echo $technician['firstName']; ?></td>
                <td><?php echo $technician['lastName']; ?></td>
                <td><?php echo $technician['email']; ?></td>
                <td><?php echo $technician['phone']; ?></td>
                <td><?php echo $technician['password']; ?></td>
                <td><form action="." method="get">
                    <input type="hidden" name="action"
                           value="delete_technician">
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>">
                    <p><p>
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Technician</a></p>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
