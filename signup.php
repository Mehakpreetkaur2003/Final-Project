<!DOCTYPE html>
<html>
<head>
    <title>Login</title> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form method="post"  action="Authenticate.php">
        <img src= "images/logo1.jpg" alt="login" width="100" height="100">
        <h2>Welcome! Mehapreet Clothing Store</h2>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <?php
        if (isset($_GET['success'])) {
            echo '<p class="success">'.htmlspecialchars($_GET['success'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        ?>
        <input type="submit" name="signup" value="signup">
        <p>Already a member? <a href="index.php">Click here!</a></p>
    </form>
</body>
</html>