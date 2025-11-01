<?php
include 'auth_check.php';
include 'db.php';

// Helper function for handling file uploads
function uploadImage($file_input_name, $current_image_path = '') {
    if (isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] == 0) {
        $target_dir = "src/img/"; // Relative path from admin folder to images folder
        $filename = preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($_FILES[$file_input_name]["name"]));
        $target_file = $target_dir . $filename;
        $db_path = "src/img/" . $filename;
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            return $current_image_path; // Not a valid image
        }

        if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
            return $db_path; // Return new path on successful upload
        }
    }
    return $current_image_path; // Return old path if no new file or upload fails
}

// --- FORM SUBMISSION HANDLING (ADD & EDIT) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $display_order = $_POST['display_order'];
    $id = $_POST['id'];
    $action = $_POST['action'];

    $image1_url = uploadImage('image1', $_POST['current_image1']);
    $image2_url = uploadImage('image2', $_POST['current_image2']);
    $image3_url = uploadImage('image3', $_POST['current_image3']);

    if ($action == 'edit') {
        $stmt = $conn->prepare("UPDATE ambience_features SET title=?, subtitle=?, description=?, image1_url=?, image2_url=?, image3_url=?, display_order=? WHERE id=?");
        $stmt->bind_param("ssssssii", $title, $subtitle, $description, $image1_url, $image2_url, $image3_url, $display_order, $id);
    } else { // 'add' action
        $stmt = $conn->prepare("INSERT INTO ambience_features (title, subtitle, description, image1_url, image2_url, image3_url, display_order) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $title, $subtitle, $description, $image1_url, $image2_url, $image3_url, $display_order);
    }
    
    $stmt->execute();
    header("Location: manage_ambience.php");
    exit();
}

// --- DELETION HANDLING ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT image1_url, image2_url, image3_url FROM ambience_features WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($feature = $result->fetch_assoc()) {
        if ($feature['image1_url'] && file_exists($feature['image1_url'])) unlink($feature['image1_url']);
        if ($feature['image2_url'] && file_exists($feature['image2_url'])) unlink($feature['image2_url']);
        if ($feature['image3_url'] && file_exists($feature['image3_url'])) unlink($feature['image3_url']);
    }

    $delete_stmt = $conn->prepare("DELETE FROM ambience_features WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();
    
    header("Location: manage_ambience.php");
    exit();
}

// --- DETERMINE CURRENT VIEW (List, Add, or Edit) ---
$action = $_GET['action'] ?? 'list';
$feature = null;

if ($action == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM ambience_features WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $feature = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Ambience</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header"><h2>Raka Admin</h2></div>
        <ul class="sidebar-nav">
            <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="manage_ambience.php" class="active"><i class="fa-solid fa-lightbulb"></i> Ambience</a></li>
            <li><a href="manage_menu_categories.php"><i class="fa-solid fa-folder-open"></i> Menu Categories</a></li>
            <li><a href="manage_menu_items.php"><i class="fa-solid fa-utensils"></i> Menu Items</a></li>
            <li><a href="manage_gallery.php"><i class="fa-solid fa-images"></i> Gallery</a></li>
            <li><a href="view_enquiries.php"><i class="fa-solid fa-envelope"></i> Enquiries</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="main-header">
            <h1>Manage Ambience Features</h1>
        </header>

        <?php if ($action == 'list'): ?>
        <a href="manage_ambience.php?action=add" class="btn btn-success" style="margin-bottom: 1rem;">Add New Feature</a>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM ambience_features ORDER BY display_order ASC");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['display_order']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td>
                        <img src="<?php echo htmlspecialchars($row['image1_url']); ?>" alt="">
                        <img src="<?php echo htmlspecialchars($row['image2_url']); ?>" alt="">
                        <img src="<?php echo htmlspecialchars($row['image3_url']); ?>" alt="">
                    </td>
                    <td class="actions">
                        <a href="manage_ambience.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="manage_ambience.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feature?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <?php else: ?>
        <div class="form-container">
            <h2><?php echo ($action == 'edit') ? 'Edit Feature' : 'Add New Feature'; ?></h2>
            <form action="manage_ambience.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $feature['id'] ?? ''; ?>">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($feature['title'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Subtitle</label>
                    <input type="text" name="subtitle" value="<?php echo htmlspecialchars($feature['subtitle'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"><?php echo htmlspecialchars($feature['description'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Display Order (e.g., 10, 20, 30)</label>
                    <input type="number" name="display_order" value="<?php echo htmlspecialchars($feature['display_order'] ?? '0'); ?>">
                </div>

                <div class="form-group">
                    <label>Image 1 (Main Image)</label>
                    <?php if ($action == 'edit' && !empty($feature['image1_url'])): ?>
                        <p>Current: <img src="<?php echo htmlspecialchars($feature['image1_url']); ?>" height="50"></p>
                    <?php endif; ?>
                    <input type="file" name="image1">
                    <input type="hidden" name="current_image1" value="<?php echo $feature['image1_url'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label>Image 2</label>
                     <?php if ($action == 'edit' && !empty($feature['image2_url'])): ?>
                        <p>Current: <img src="<?php echo htmlspecialchars($feature['image2_url']); ?>" height="50"></p>
                    <?php endif; ?>
                    <input type="file" name="image2">
                    <input type="hidden" name="current_image2" value="<?php echo $feature['image2_url'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label>Image 3</label>
                     <?php if ($action == 'edit' && !empty($feature['image3_url'])): ?>
                        <p>Current: <img src="<?php echo htmlspecialchars($feature['image3_url']); ?>" height="50"></p>
                    <?php endif; ?>
                    <input type="file" name="image3">
                    <input type="hidden" name="current_image3" value="<?php echo $feature['image3_url'] ?? ''; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary">Save Feature</button>
                <a href="manage_ambience.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>