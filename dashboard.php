<?php include 'auth_check.php'; // Protect this page ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Raka Restaurant</title>
    <link rel="stylesheet" href="admin_style.css"> </head>
<body>
    <header class="header">
        <h1>Raka Admin Dashboard</h1>
        <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>! | <a href="logout.php">Logout</a></span>
    </header>
    <div class="container">
        <h2>Content Management</h2>
        <p>Select a section to add, edit, or delete content.</p>
        <nav class="dashboard-nav">
            <a href="manage_ambience.php" class="nav-card">
                <h3>Manage Ambience</h3>
                <p>Edit the features on your homepage's ambience section.</p>
            </a>
            <a href="manage_menu_categories.php" class="nav-card">
                <h3>Manage Menu Categories</h3>
                <p>Add or remove main menu categories like "Starters" or "Grills".</p>
            </a>
            <a href="manage_menu_items.php" class="nav-card">
                <h3>Manage Menu Items</h3>
                <p>Edit the dishes within each menu category.</p>
            </a>
            <a href="manage_gallery.php" class="nav-card">
                <h3>Manage Gallery</h3>
                <p>Upload or delete images in the photo gallery.</p>
            </a>
            <a href="view_enquiries.php" class="nav-card">
                <h3>View Contact Enquiries</h3>
                <p>See messages submitted through your contact form.</p>
            </a>
        </nav>
    </div>
</body>
</html>