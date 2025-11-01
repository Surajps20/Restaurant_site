<?php
include 'auth_check.php'; // Protect this page
include 'db.php';

// --- HANDLE DELETION ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];
    
    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM contact_enquiries WHERE id = ?");
    $stmt->bind_param("i", $id_to_delete);
    $stmt->execute();
    
    // Redirect back to the same page to prevent re-deleting on refresh
    header("Location: view_enquiries.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Contact Enquiries</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Raka Admin</h2>
        </div>
        <ul class="sidebar-nav">
            <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="manage_ambience.php"><i class="fa-solid fa-lightbulb"></i> Ambience</a></li>
            <li><a href="manage_menu_categories.php"><i class="fa-solid fa-folder-open"></i> Menu Categories</a></li>
            <li><a href="manage_menu_items.php"><i class="fa-solid fa-utensils"></i> Menu Items</a></li>
            <li><a href="manage_gallery.php"><i class="fa-solid fa-images"></i> Gallery</a></li>
            <li><a href="view_enquiries.php" class="active"><i class="fa-solid fa-envelope"></i> Enquiries</a></li>
        </ul>
        <div class="sidebar-footer">
             <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</span><br>
             <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="main-header">
            <h1>View Contact Enquiries</h1>
        </header>

        <table class="content-table">
            <thead>
                <tr>
                    <th>Received On</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th style="width: 30%;">Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to get the newest enquiries first
                $result = $conn->query("SELECT * FROM contact_enquiries ORDER BY submission_time DESC");
                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['submission_time']); ?></td>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['message'])); // nl2br preserves line breaks ?></td>
                    <td class="actions">
                        <a href="view_enquiries.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to permanently delete this enquiry?');">Delete</a>
                    </td>
                </tr>
                <?php 
                    endwhile;
                else: 
                ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No enquiries found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>