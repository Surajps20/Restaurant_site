<?php
// --- 1. DATABASE CONFIGURATION ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raka_restaurant_db";

// --- 2. ESTABLISH DATABASE CONNECTION ---
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}
?>