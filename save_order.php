<?php
require 'db.php'; 

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

header('Content-Type: application/json');

// Get booking ID and order items from the received data
$bookingId = $data['bookingId'] ?? null;
$orderItems = $data['items'] ?? [];

// Validate the data
if (empty($bookingId) || empty($orderItems)) {
    echo json_encode(['success' => false, 'message' => 'Booking ID or order data is missing.']);
    exit;
}

$order_id = 'ORD-' . uniqid();

// MODIFIED SQL statement to include booking_id
$sql = "INSERT INTO food_orders (order_id, booking_id, item_name, price, quantity) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database error: Could not prepare statement.']);
    exit;
}

$all_successful = true;
foreach ($orderItems as $item) {
    $itemName = $item['name'];
    $itemPrice = $item['price'];
    $itemQuantity = $item['quantity'];
    
    // MODIFIED bind_param to include the integer 'i' for booking_id
    mysqli_stmt_bind_param($stmt, "sisdi", $order_id, $bookingId, $itemName, $itemPrice, $itemQuantity);
    
    if (!mysqli_stmt_execute($stmt)) {
        $all_successful = false;
        break; 
    }
}

if ($all_successful) {
    echo json_encode(['success' => true, 'order_id' => $order_id]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save one or more order items.']);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>