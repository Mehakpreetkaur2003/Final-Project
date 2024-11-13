<?php
session_start(); // Start the session

require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Get the username from the form
    $password = $_POST['password']; // Get the password from the form

    if (isset($_POST["login"])) {
        // SQL statement to select admin from the database
        $sql = "SELECT * FROM admin WHERE Username = :username";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the admin exists and the password is correct
        if ($admin && password_verify($password, $admin['PasswordHash'])) {
            $_SESSION['AdminID'] = $admin['AdminID'];
            $_SESSION['username'] = $username;
            $_SESSION['AccessLevel'] = $admin['AccessLevel'];

            header("Location: Admin_homepage.php"); // Redirect to admin homepage
            exit;
        } else {
            header("Location: Admin_login.php?error=Invalid username or password"); // Redirect back with an error
            exit;
        }
    }
}
?>
