<?php
require 'db.php';

// ################################################################################################
// Setup mass assignment
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS users";
if ($conn->query($dropTable) === TRUE) {
    echo "Table users dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE users (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table users created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}
