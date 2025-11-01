<?php
include 'auth_check.php';
include 'db.php';

// --- FORM SUBMISSION HANDLING (ADD & EDIT) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
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
        $stmt = $conn->prepare("UPDATE menu_items SET name=?, price=?, image_url=?, category_id=? WHERE id=?");
        $stmt->bind_param("sssii", $name, $price, $image_path_for_db, $category_id, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO menu_items (name, price, image_url, category_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $price, $image_path_for_db, $category_id);
    }
    $stmt->execute();
    header("Location: manage_menu_items.php");
    exit();
}

// --- DELETE ACTION ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT image_url FROM menu_items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (file_exists("" . $row['image_url'])) {
            unlink("" . $row['image_url']);
        }
    }
    $delete_stmt = $conn->prepare("DELETE FROM menu_items WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();
    header("Location: manage_menu_items.php");
    exit();
}

// Determine current view
$action = $_GET['action'] ?? 'list';
$item = null;
if ($action == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM menu_items WHERE id = ?");
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
    <title>Manage Menu Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header"><h2>Raka Admin</h2></div>
        <ul class="sidebar-nav">
             <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
             <li><a href="manage_menu_items.php" class="active"><i class="fa-solid fa-utensils"></i> Menu Items</a></li>
             </ul>
    </aside>
    <main class="main-content">
        <header class="main-header"><h1>Manage Menu Items</h1></header>

        <?php if ($action == 'list'): ?>
        <a href="manage_menu_items.php?action=add" class="btn btn-success" style="margin-bottom: 1rem;">Add New Item</a>
        <table class="content-table">
            <thead><tr><th>Image</th><th>Name</th><th>Price</th><th>Category</th><th>Actions</th></tr></thead>
            <tbody>
                <?php
                $sql = "SELECT mi.id, mi.name, mi.price, mi.image_url, mc.name AS category_name 
                        FROM menu_items mi
                        JOIN menu_categories mc ON mi.category_id = mc.id
                        ORDER BY mc.id, mi.id";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt=""></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>₹<?php echo htmlspecialchars(number_format($row['price'], 2)); ?></td>                    
                    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                    <td class="actions">
                        <a href="manage_menu_items.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="manage_menu_items.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <?php else: // 'add' or 'edit' view
            // Get categories for dropdown
            $categories_result = $conn->query("SELECT id, name FROM menu_categories ORDER BY name");
        ?>
        <div class="form-container">
            <h2><?php echo ($action == 'edit') ? 'Edit' : 'Add New'; ?> Menu Item</h2>
            <form action="manage_menu_items.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?? ''; ?>">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" required>
                        <option value="">-- Select a Category --</option>
                        <?php while($cat = $categories_result->fetch_assoc()): ?>
                            <option value="<?php echo $cat['id']; ?>" <?php if(isset($item['category_id']) && $cat['id'] == $item['category_id']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Item Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($item['name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Price (e.g., ₹250)</label>
                    <input type="text" name="price" value="<?php echo htmlspecialchars($item['price'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <?php if ($action == 'edit' && !empty($item['image_url'])): ?>
                        <p>Current: <img src="<?php echo htmlspecialchars($item['image_url']); ?>" height="50"></p>
                    <?php endif; ?>
                    <input type="file" name="image">
                    <input type="hidden" name="current_image" value="<?php echo $item['image_url'] ?? ''; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Save Item</button>
                <a href="manage_menu_items.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>