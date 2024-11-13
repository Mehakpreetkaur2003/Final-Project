<<?php
require ('connect.php');
require ('Userpageheader.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sql = "SELECT ProductID, Name, Description, Size, Color, Price, Image FROM products";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clothing Store</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <div class="container">
    <?php
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        do {
    ?>
        <div class="product-card">
            <img src="<?php echo htmlspecialchars($row["Image"]); ?>" alt="<?php echo ($row["Name"]); ?>" class="product-image">
            <h2><?php echo ($row["Name"]); ?></h2>
            <p><?php echo ($row["Description"]); ?></p>
            <p>Size: <?php echo ($row["Size"]); ?> US</p>
            <p>Color: <?php echo ($row["Color"]); ?></p>
            <p>Price: $<?php echo htmlspecialchars($row["Price"]); ?></p>
            <Button class="btn-edit"> Add to cart </Button>
        </div>
    <?php
        } while ($row = $result->fetch(PDO::FETCH_ASSOC));
    } else {
        echo "<p>No products found</p>";
    }
    ?>
    </div>
</body>
</html>


