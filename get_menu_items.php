<?php
header('Content-Type: application/json');
include 'db.php'; // Reuse your database connection file

$category_key = isset($_GET['category']) ? $_GET['category'] : '';

if (empty($category_key)) {
    echo json_encode(['error' => 'No category specified.']);
    exit;
}

// Prepare the statement to prevent SQL injection
$stmt = $conn->prepare("
    SELECT 
        c.name AS category_title, 
        i.name AS dish_name, 
        i.price AS dish_price, 
        i.image_url AS dish_img
    FROM menu_items i
    JOIN menu_categories c ON i.category_id = c.id
    WHERE c.popup_key = ?
");

$stmt->bind_param("s", $category_key);
$stmt->execute();
$result = $stmt->get_result();

$response = [
    'title' => 'Menu Items',
    'dishes' => []
];

$is_title_set = false;
while ($row = $result->fetch_assoc()) {
    if (!$is_title_set) {
        $response['title'] = $row['category_title'];
        $is_title_set = true;
    }
    $response['dishes'][] = [
        'name' => $row['dish_name'],
        'price' => $row['dish_price'],
        'img' => $row['dish_img']
    ];
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>