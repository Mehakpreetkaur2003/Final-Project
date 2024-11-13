<!DOCTYPE html>
<html>
<head>
    <title>Login</title> 
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form method="post"  action="Admin_Authentication.php">
        <img src= "images/logo1.jpg" alt="login" width="100" height="100">
        <h2>Welcome Back Admin!</h2>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">'.htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        ?>
        <input type="submit" name="login" value="login">
        <p>Not an Admin? <a href="index.php">Click here!</a></p>
    </form>
</body>
</html>