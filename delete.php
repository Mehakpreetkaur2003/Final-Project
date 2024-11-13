<?php
require('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Start transaction
        $db->beginTransaction();

        // Delete inventory entry
        $stmt2 = $db->prepare("DELETE FROM inventory WHERE ProductID = :id");
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();

        // Delete product entry
        $stmt = $db->prepare("DELETE FROM products WHERE ProductID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Commit the transaction
        $db->commit();

        // Redirect to the admin dashboard
        header('Location: Admin_homepage.php');
    } catch (PDOException $e) {
        // If an error occurs, roll back the transaction
        $db->rollBack();
        // Error message
        die("Error: " . $e->getMessage());
    }
}
?>
