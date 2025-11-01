<?php
// Simplified script to test ONLY the database insert.

// Show all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// We are ONLY including the database connection
require 'db.php';

echo "<h1>Database Insert Test</h1>";

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<p>Form submitted correctly. Processing data...</p>";

    // Retrieve form data (sanitization is still important)
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $booking_date = htmlspecialchars(trim($_POST['booking_date']));
    $booking_time = htmlspecialchars(trim($_POST['booking_time']));
    $guests = htmlspecialchars(trim($_POST['guests']));

    // Check if data was received
    if (empty($name) || empty($email)) {
        die("<p style='color:red;'>Error: Name or Email field was empty.</p>");
    }

    // The SQL query from before
    $sql = "INSERT INTO bookings (name, email, phone, booking_date, booking_time, guests) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        // This error means your SQL syntax or column/table names are wrong.
        die("<p style='color:red;'>Error Preparing Statement: " . htmlspecialchars($conn->error) . "</p>");
    }
    
    $stmt->bind_param("ssssss", $name, $email, $phone, $booking_date, $booking_time, $guests);

    // Execute and check for errors
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "<p style='color:green; font-weight:bold;'>SUCCESS! The booking was saved to the database.</p>";
        } else {
            echo "<p style='color:orange; font-weight:bold;'>QUERY RAN, BUT NO ROWS INSERTED. This can happen if a table constraint was violated.</p>";
        }
    } else {
        // This will tell you the exact error from MySQL during the insert.
        die("<p style='color:red;'>Error Executing Statement: " . htmlspecialchars($stmt->error) . "</p>");
    }

    $stmt->close();
    $conn->close();

} else {
    echo "<p style='color:red;'>Error: The form was not submitted using the POST method.</p>";
}

?>