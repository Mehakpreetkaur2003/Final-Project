<?php
require('connect.php');
include 'Admin_Header.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Redirect non-admin users to the home page
if (!isset($_SESSION['AccessLevel']) || $_SESSION['AccessLevel'] != 2) {
    header('Location: homepage.php?error=noaccess'); // Redirect non-admin users to the home page
    exit();
}

// Get all products from the database
// Assuming your products table has columns for ProductID, Name, Description, Price, etc.
// And an inventory table with ProductID, Quantity, LowStockThreshold
$result = $db->query("SELECT products.*, inventory.Quantity, inventory.LowStockThreshold
                      FROM products 
                      LEFT JOIN inventory 
                      ON products.ProductID = inventory.ProductID");

if ($result->rowCount() > 0) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Fashion Store</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="product-list">
    <h1>Product Inventory</h1>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Low Stock Threshold</th>
                <th>Actions</th>
                <th>Stock Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['ProductID']); ?></td>
                    <td><?php echo htmlspecialchars($row['Name']); ?></td>
                    <td><?php echo htmlspecialchars($row['Description']); ?></td>
                    <td><?php echo htmlspecialchars($row['Price']); ?></td>
                    <td><?php echo htmlspecialchars($row['Quantity']); ?></td>
                    <td>Below <?php echo htmlspecialchars($row['LowStockThreshold']); ?></td>
                    <td>
                        <button class="btn btn-edit" onclick="location.href='edit_inventory.php?id=<?php echo $row['ProductID']; ?>'">Edit</button>
                        <button class="btn btn-delete" onclick="if(confirm('Are you sure you want to delete this item?')) location.href='delete.php?id=<?php echo $row['ProductID']; ?>'">Delete</button>
                    </td>
                    <td>
                        <?php if ($row["Quantity"] < $row["LowStockThreshold"]): ?>
                            <span style="color:red;"> Low Stock</span>
                        <?php else: ?>
                            <span style="color:green;">In Stock</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } else {
    echo "<p>No products found in the database.</p>";
}
?>
</body>
</html>


