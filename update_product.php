<?php
require('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];

    try {
        // Start a transaction
        $db->beginTransaction();

        // Update product information in products table
        $stmt = $db->prepare("UPDATE products SET 
            Name = :name, 
            Description = :description, 
            Size = :size, 
            Color = :color, 
            Price = :price,  
            Image = :image 
            WHERE ProductID = :id");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        // Update inventory
        $stmt2 = $db->prepare("UPDATE inventory SET Quantity = :quantity WHERE ProductID = :id");
        $stmt2->bindParam(':quantity', $quantity);
        $stmt2->bindParam(':id', $id);

        $stmt2->execute();

        // Commit the transaction
        $db->commit();

        // Redirect to the admin dashboard with the updated product ID
        header('Location: Admin_homepage.php?id=' . $id);
    } catch (PDOException $e) {
        // Rollback the transaction if any error occurs
        $db->rollBack();
        // Error message
        echo "Error: " . $e->getMessage();
    }
}
?>
