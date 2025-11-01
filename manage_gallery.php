<?php
include 'auth_check.php'; // Protect this page
include 'db.php';

// --- HANDLE FORM SUBMISSIONS (ADD & EDIT) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alt_text = $_POST['alt_text'];
    $action = $_POST['action'];
    $id = $_POST['id'];
    $current_image_path = $_POST['current_image_path'];
    
    $image_path_for_db = $current_image_path; // Default to the existing image path

    // --- Handle New File Upload ---
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "src/img/";
        // Sanitize filename for security
        $filename = preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($_FILES["image"]["name"]));
        $target_file = $target_dir . $filename;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path_for_db = "src/img/" . $filename;
            // If we are editing and uploaded a new image, delete the old one
            if ($action == 'edit' && $current_image_path && file_exists($current_image_path)) {
                unlink($current_image_path);
            }
        }
    }

    if ($action == 'edit') {
        // --- UPDATE Existing Record ---
        $stmt = $conn->prepare("UPDATE gallery_images SET image_url = ?, alt_text = ? WHERE id = ?");
        $stmt->bind_param("ssi", $image_path_for_db, $alt_text, $id);
    } else {
        // --- INSERT New Record ---
        $stmt = $conn->prepare("INSERT INTO gallery_images (image_url, alt_text) VALUES (?, ?)");
        $stmt->bind_param("ss", $image_path_for_db, $alt_text);
    }
    
    $stmt->execute();
    header("Location: manage_gallery.php");
    exit;
}

// --- HANDLE DELETION ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];

    // 1. Get the image path from DB before deleting the record
    $stmt = $conn->prepare("SELECT image_url FROM gallery_images WHERE id = ?");
    $stmt->bind_param("i", $id_to_delete);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        // 2. Delete the physical file from the server
        if (!empty($row['image_url']) && file_exists($row['image_url'])) {
            unlink($row['image_url']);
        }
    }
    
    // 3. Delete the record from the database
    $delete_stmt = $conn->prepare("DELETE FROM gallery_images WHERE id = ?");
    $delete_stmt->bind_param("i", $id_to_delete);
    $delete_stmt->execute();
    
    header("Location: manage_gallery.php");
    exit;
}

// --- DETERMINE WHICH VIEW TO SHOW ---
$action = $_GET['action'] ?? 'list'; // Default to list view
$item_data = null;

if ($action == 'edit' && isset($_GET['id'])) {
    $id_to_edit = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM gallery_images WHERE id = ?");
    $stmt->bind_param("i", $id_to_edit);
    $stmt->execute();
    $result = $stmt->get_result();
    $item_data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header"><h2>Raka Admin</h2></div>
        <ul class="sidebar-nav">
            <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="manage_ambience.php"><i class="fa-solid fa-lightbulb"></i> Ambience</a></li>
            <li><a href="manage_menu_categories.php"><i class="fa-solid fa-folder-open"></i> Menu Categories</a></li>
            <li><a href="manage_menu_items.php"><i class="fa-solid fa-utensils"></i> Menu Items</a></li>
            <li><a href="manage_gallery.php" class="active"><i class="fa-solid fa-images"></i> Gallery</a></li>
            <li><a href="view_enquiries.php"><i class="fa-solid fa-envelope"></i> Enquiries</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="main-header">
            <h1>Manage Gallery</h1>
        </header>

        <?php if ($action == 'list'): ?>
            <a href="manage_gallery.php?action=add" class="btn btn-success" style="margin-bottom: 1rem;">Add New Image</a>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Alt Text</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT id, image_url, alt_text FROM gallery_images ORDER BY id DESC");
                    while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt=""></td>
                        <td><?php echo htmlspecialchars($row['alt_text']); ?></td>
                        <td class="actions">
                            <a href="manage_gallery.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="manage_gallery.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        <?php else: ?>
            <div class="form-container">
                <h2><?php echo ($action == 'edit') ? 'Edit Image' : 'Add New Image'; ?></h2>
                <form action="manage_gallery.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $item_data['id'] ?? ''; ?>">
                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                    
                    <div class="form-group">
                        <label for="image">Image File (Leave blank to keep current image when editing)</label>
                        <?php if ($action == 'edit' && !empty($item_data['image_url'])): ?>
                            <p>Current: <img src="<?php echo htmlspecialchars($item_data['image_url']); ?>" height="80"></p>
                        <?php endif; ?>
                        <input type="file" name="image" id="image">
                        <input type="hidden" name="current_image_path" value="<?php echo $item_data['image_url'] ?? ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="alt_text">Alt Text (description):</label>
                        <input type="text" name="alt_text" id="alt_text" value="<?php echo htmlspecialchars($item_data['alt_text'] ?? ''); ?>" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Image</button>
                    <a href="manage_gallery.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>