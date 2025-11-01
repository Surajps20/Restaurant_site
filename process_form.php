<?php
// --- Debugging (optional) ---
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

header('Content-Type: application/json');

require_once 'db.php';

// --- 3. VALIDATE INCOMING DATA ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = trim($_POST['message']);

if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Please fill out all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please provide a valid email address.']);
    exit;
}

// --- 4. INSERT DATA INTO DATABASE (Prepared Statements) ---
$stmt = $conn->prepare("INSERT INTO contact_enquiries (full_name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message);

$dbSuccess = $stmt->execute();
$stmt->close();
$conn->close();

// --- 5. PHPMailer EMAIL SETUP ---
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mailSuccess = false; // Initialize status

try {
    // SMTP Configuration - This is set only once
    $mail->isSMTP();
    $mail->Host       = "tmdigitaltech.com";
    $mail->SMTPAuth   = true;
    $mail->Username   = "support@tmdigitaltech.com";
    $mail->Password   = "nuwmCQ20U1";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // --- 1. SEND NOTIFICATION TO ADMIN ---
    $mail->setFrom("support@tmdigitaltech.com", "Raka Website Enquiry");
    $mail->addAddress("admin@rakarestaurant.com", "Raka Admin");
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = "New Contact Enquiry from {$name}";
    $mail->Body    = "
        <h3>New Enquiry Details</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> {$phone}</p>
        <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
    ";
    $mail->send();

    // --- 2. SEND PROFESSIONAL CONFIRMATION TO USER ---
    $mail->clearAllRecipients();
    $mail->clearReplyTos();

    $mail->addAddress($email, $name);
    $mail->setFrom("support@tmdigitaltech.com", "Raka Restaurant");

    // Define the professional subject and body for the user's email
    $userSubject = "Your Enquiry to Raka Restaurant";
    $userBody = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; }
            .wrapper { background-color: #f7f7f7; padding: 40px; }
            .container { background-color: #ffffff; border: 1px solid #ddd; padding: 30px; max-width: 600px; margin: 0 auto; }
            .header { text-align: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 20px; }
            .header h1 { color: #E67E22; margin: 0; font-size: 28px; }
            .details { border: 1px solid #eee; padding: 20px; margin: 20px 0; background-color: #fafafa; }
            .footer { text-align: center; color: #888; font-size: 12px; margin-top: 20px; }
            p { margin: 0 0 10px; }
        </style>
    </head>
    <body>
        <div class='wrapper'>
            <div class='container'>
                <div class='header'>
                    <h1>Raka Restaurant</h1>
                </div>
                <p>Dear {$name},</p>
                <p>Thank you for reaching out to us. We are delighted to confirm that we have received your message and our guest relations team will be connecting with you shortly.</p>
                <p>For your reference, here is a summary of your enquiry:</p>
                <div class='details'>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Phone:</strong> {$phone}</p>
                    <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
                </div>
                <p>We look forward to speaking with you.</p>
                <p>Warmly,<br><strong>The Team at Raka Restaurant</strong></p>
                <div class='footer'>
                    <p>Raka Restaurant | Plot No: 64/5, Kancharampettai, Madurai</p>
                    <p>This is an automated confirmation. Please do not reply directly to this email.</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";

    $mail->Subject = $userSubject;
    $mail->Body    = $userBody;
    $mail->send();
    
    $mailSuccess = true;

} catch (Exception $e) {
    $mailSuccess = false;
    // error_log("Mailer Error: " . $mail->ErrorInfo);
}

// --- 6. Final Response ---
if ($dbSuccess && $mailSuccess) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Your enquiry has been sent.']);
} elseif ($dbSuccess && !$mailSuccess) {
    echo json_encode(['success' => true, 'message' => 'Your enquiry was saved, but the confirmation email could not be sent.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Sorry, there was an error processing your request.']);
}
