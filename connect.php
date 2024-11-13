<?php
    // Set database connection parameters
    define('DB_DSN', 'mysql:host=localhost;dbname=myclothingstore;charset=utf8');
    define('DB_USER', 'root');
    

    // PDO for database access; using PDO is safer than using older MySQL extensions
    try {
        // Create a new PDO connection
        $db = new PDO(DB_DSN, DB_USER);

        // Set error mode to exception to handle potential SQL errors
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // If connection fails, stop the script and display an error message
        die("Connection failed: " . $e->getMessage());
    }
?>
