<?php
require ('Userpageheader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Mehakpreet Clothing Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <form class="contact-form">
        <h1>Contact Us</h1>
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <input type="button" value="Send Message">
        </form>
    </main>
</body>
</html>
