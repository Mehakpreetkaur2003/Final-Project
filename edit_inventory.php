<?php
    // Include the database configuration file
    require ('connect.php');
    include ('Admin_Header.php');

    // Get the ID from the URL
    $id = $_GET['id'];

    // Prepare the SQL query
    $sql = "SELECT products.*, inventory.Quantity 
            FROM products 
            LEFT JOIN inventory 
            ON products.ProductID = inventory.ProductID 
            WHERE products.ProductID = :id";

    // Initialize a statement
    $stmt = $db->prepare($sql);

    // Bind the ID to the statement
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the product data
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/header.js"></script>
</head>
<body>
    <div class="edit-container">
        <form id="edit-form" method="post" action="update_product.php">
            <img id="product-image-edit" src="<?php echo $product['Image']; ?>" alt="Product Image" class="product-image">
            <h1>Edit This Product</h1>
            <input type="hidden" name="id" value="<?php echo $product['ProductID']; ?>">
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['Name']; ?>">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $product['Description']; ?></textarea>
            
            <label for="size">Size:</label>
            <input type="text" id="size" name="size" value="<?php echo $product['Size']; ?>">
            
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?php echo $product['Color']; ?>">
            
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $product['Price']; ?>">
            
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" value="<?php echo $product['Quantity']; ?>">
            
            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" value="<?php echo $product['Image']; ?>">
            
            <input type="submit" value="Update" class="submit-button">
        </form>
    </div>
</body>
</html>
