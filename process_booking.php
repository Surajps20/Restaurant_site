<?php
// process_booking.php

// Show all errors for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize and retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $booking_date = htmlspecialchars(trim($_POST['booking_date']));
    $booking_time = htmlspecialchars(trim($_POST['booking_time']));
    $guests = htmlspecialchars(trim($_POST['guests']));

    // Simple validation
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone) || empty($booking_date) || empty($booking_time) || empty($guests)) {
        die("Please fill all fields correctly.");
    }

    // 2. Prepare the SQL statement
    $sql = "INSERT INTO bookings (name, email, phone, booking_date, booking_time, guests) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        // This will show an error if the SQL syntax or table/column names are wrong
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("ssssss", $name, $email, $phone, $booking_date, $booking_time, $guests);

    // 3. Execute and CHECK FOR ERRORS
    if ($stmt->execute()) {
    // 3. Send email notification using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // --- START OF MODIFICATIONS ---

        // Enable verbose debug output
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 

        // --- END OF MODIFICATIONS ---

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'tmdigitaltech.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'support@tmdigitaltech.com';
        $mail->Password   = 'nuwmCQ20U1';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('support@tmdigitaltech.com', 'Raka Restaurant Bookings');
        $mail->addAddress('admin@rakarestaurant.com', 'Raka Admin');
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Table Booking from ' . $name;
        $mail->Body    = "
            <html><body>
                <h2>New Table Booking Request</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Phone:</strong> {$phone}</p>
                <p><strong>Date:</strong> " . date("d-m-Y", strtotime($booking_date)) . "</p>
                <p><strong>Time:</strong> " . date("h:i A", strtotime($booking_time)) . "</p>
                <p><strong>Number of Guests:</strong> {$guests}</p>
            </body></html>
        ";
        
        $mail->send();
        
        // --- MORE MODIFICATIONS ---
        
        // Instead of redirecting, show a success message so you can see the debug output above
        // echo "<h3>Mail Sent Successfully (Debug Info Above)</h3>";
        
        // Temporarily disable the redirect to see the output
        header("Location: thank_you.html");
        exit();

        // --- END OF MODIFICATIONS ---

    } catch (Exception $e) {
        // The debug mode will give more info than this, but it's good to keep
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Error: " . $stmt->error;
}
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>