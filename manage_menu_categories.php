<?php
include 'auth_check.php';
include 'db.php';

// --- FORM SUBMISSION HANDLING (ADD & EDIT) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $popup_key = $_POST['popup_key'];
    $id = $_POST['id'];
    $current_image = $_POST['current_image'];
    $action = $_POST['action'];

    $image_path_for_db = $current_image;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "src/img/";
        $filename = preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($_FILES["image"]["name"]));
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path_for_db = "src/img/" . $filename;
        }
    }
    
    if ($action == 'edit') {
        $stmt = $conn->prepare("UPDATE menu_categories SET name=?, description=?, image_url=?, popup_key=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $description, $image_path_for_db, $popup_key, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO menu_categories (name, description, image_url, popup_key) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $description, $image_path_for_db, $popup_key);
    }
    $stmt->execute();
    header("Location: manage_menu_categories.php");
    exit();
}

// --- DELETE ACTION ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    // Note: Deleting a category can cause issues if menu items depend on it.
    // A more robust system would prevent this or re-assign items. For now, we proceed.
    $stmt = $conn->prepare("SELECT image_url FROM menu_categories WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (file_exists($row['image_url'])) {
            unlink($row['image_url']);
        }
    }
    $delete_stmt = $conn->prepare("DELETE FROM menu_categories WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();
    header("Location: manage_menu_categories.php");
    exit();
}

// Determine current view
$action = $_GET['action'] ?? 'list';
$item = null;
if ($action == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM menu_categories WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Menu Categories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header"><h2>Raka Admin</h2></div>
        <ul class="sidebar-nav">
             <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
             <li><a href="manage_menu_categories.php" class="active"><i class="fa-solid fa-folder-open"></i> Menu Categories</a></li>
             </ul>
    </aside>

    <main class="main-content">
        <header class="main-header"><h1>Manage Menu Categories</h1></header>

        <?php if ($action == 'list'): ?>
        <a href="manage_menu_categories.php?action=add" class="btn btn-success" style="margin-bottom: 1rem;">Add New Category</a>
        <table class="content-table">
            <thead><tr><th>Image</th><th>Name</th><th>Popup Key</th><th>Actions</th></tr></thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM menu_categories ORDER BY id ASC");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt=""></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['popup_key']); ?></td>
                    <td class="actions">
                        <a href="manage_menu_categories.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="manage_menu_categories.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('WARNING: Deleting a category will orphan its menu items. Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <?php else: // 'add' or 'edit' view ?>
        <div class="form-container">
            <h2><?php echo ($action == 'edit') ? 'Edit' : 'Add New'; ?> Category</h2>
            <form action="manage_menu_categories.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?? ''; ?>">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                
                <div class="form-group">
                    <label>Category Name (e.g., "Starters")</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($item['name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Popup Key (one word, lowercase, e.g., "starters")</label>
                    <input type="text" name="popup_key" value="<?php echo htmlspecialchars($item['popup_key'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Description (HTML is allowed)</label>
                    <textarea name="description"><?php echo htmlspecialchars($item['description'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <?php if ($action == 'edit' && !empty($item['image_url'])): ?>
                        <p>Current: <img src="<?php echo htmlspecialchars($item['image_url']); ?>" height="50"></p>
                    <?php endif; ?>
                    <input type="file" name="image">
                    <input type="hidden" name="current_image" value="<?php echo $item['image_url'] ?? ''; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Save Category</button>
                <a href="manage_menu_categories.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>