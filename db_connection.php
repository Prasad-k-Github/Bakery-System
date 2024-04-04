<?php
// Database configuration
$dbHost = 'localhost'; // Hostname of your MySQL server
$dbName = 'bakeryDb'; // Name of your database
$dbUsername = 'root'; // Username to connect to the database
$dbPassword = '';

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display an error message if connection fails
    die("Connection failed: " . $e->getMessage());
}
?>
