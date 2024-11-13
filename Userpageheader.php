<?php
global $results;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>clothng Store</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<header id="clothingStoreHeader">
    <div class="header-container">
        <img src="images/logo1.jpg" alt="Fashion Store Logo" id="storeLogo">
        <nav id="clothingStoreNav">
            <ul id="clothingStoreMenu">
                <li class="menu-item"><a href="homepage.php">Home</a></li>
                <li class="menu-item"><a href="Admin_homepage.php">Admin</a></li>
                <li class="menu-item"><a href="about.php">About Us</a></li>
                <li class="menu-item"><a href="contact.php">Contact</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])): ?>
                <div id="userWelcome">
                    <p>Welcome!, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                    <a href="logout.php" id="logoutButton">Logout</a>
                </div>
            <?php endif; ?>
        </nav>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'noaccess') {
            echo "<p id='accessDeniedMessage'>Sorry! You don't have access to view the admin page!</p>";
        }
        ?>
    </div>
</header>
