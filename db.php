<?php

$servername = "macro-db";
$username = "macro-db-user";
$password = "macro-db-password";
$dbname = "macro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
