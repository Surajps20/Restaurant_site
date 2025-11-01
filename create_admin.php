<?php
include 'db.php'; // Your database connection

$username = 'admin';
$password = 'admin1234'; // Change this!

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the admin user
$stmt = $conn->prepare("INSERT INTO admins (username, password_hash) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Admin user 'admin' created successfully!";
} else {
    echo "Error creating admin user: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>