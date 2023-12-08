<?php
// Database configuration
$dbHost = 'localhost';  // Replace with your database host
$dbName = 'blueprintassets';  // Replace with your database name
$dbUsername = 'root';  // Replace with your database username
$dbPassword = '';  // Replace with your database password

// Create database connection
$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
