<!DOCTYPE html>
<html>
<head>
    <title>Login</title> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form method="post"  action="Authenticate.php">
        <img src= "images/logo1.jpg" alt="login" width="100" height="100">
        <h2>Welcome! Mehakpreet Clothing Store</h2>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">'.htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        ?>
        <input type="submit" name="login" value="Login">
        <p>Admin? <a href="Admin_login.php">Login here!</a></p>
        <p>Not a member? <a href="signup.php">Sign up here!</a></p>
    </form>
</body>
</html>