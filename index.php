<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Raka Restaurant - Madurai's First Live Non-Veg Dining</title>
    <link rel="icon" type="image/x-icon" href="./src/img/raka.png">

    <meta name="description" content="Experience Raka, Madurai's first live dhaba-style restaurant. Enjoy authentic, farm-to-table non-vegetarian cuisine, live music, and a unique pet-friendly ambiance. Book your hut today!">
    <meta name="keywords" content="Raka Restaurant, Madurai, live restaurant, non-veg restaurant Madurai, dhaba style, farm to table, live music, pet friendly">

    <meta property="og:title" content="Raka Restaurant - Madurai's First Live Dining Experience">
    <meta property="og:description" content="Authentic, farm-to-table non-vegetarian cuisine in a rustic dhaba setting with live music.">
    <meta property="og:image" content="src/img/raka_social_share_image.jpeg">
    <meta property="og:url" content="https://www.rakarestaurant.com">
    <meta property="og:type" content="website">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar" style="background-color: #1d1d1d;">
        <div class="nav-container">
            <a href="index.php" class="nav-logo">
                <img src="src/img/logo.jpeg" alt="Raka Restaurant Logo Emblem">
                <span>Raka Restaurant</span>
            </a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="ambience.php" class="nav-link">Ambience</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            </ul>
            <div class="hamburger" role="button" aria-label="Toggle navigation" aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <section class="hero" id="home" style="margin-top: 70px;">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="src/vid/bg.mp4" type="video/mp4">
            </video>
        <div class="hero-overlay"></div>

        <div class="hero-container">
            <div class="hero-badge" style="color: orange;">Luxury • Premium • Raka</div>
            <h1 class="hero-title">Raka Restaurant</h1>
            <p class="hero-sub">A curated experience of taste, ambience and live entertainment.</p>

            <div class="hero-cta">
                <a href="menu.php" class="btn btn-primary" style="background-color: orange;border-color: #181818;color: #0e0d0d;font-weight:500 ;">Explore Menu</a>
                <a href="contact.php" class="btn btn-success" style="background-color: #181818;border-color: orange;">Book a Hut</a>
            </div>
        </div>

    </section>
    </header>
    <section id="aboutus" class="container reveal">
        <div class="about-raka-grid" data-aos="fade-up">
            <div class="about-content">
                <h1 class="fade-in" style="font-weight:bolder;">About <span class="highlight" style="color: orange;">Raka</span></h1>
                <p>Raka is a <strong>luxury fine dining destination</strong> blending authentic flavors with modern artistry. Every plate is a story, every evening an experience — from seasonal menus to live music.</p>
                <ul class="features-list">
                    <li><i class="fas fa-fire-alt feature-icon icon-kitchen"></i> Live Kitchen & Chef's Table</li>
                    <li><i class="fas fa-music feature-icon icon-music"></i> Music Stage & Regular Events</li>
                    <li><i class="fas fa-gem feature-icon icon-luxury"></i> Luxury Private Dining & VIP Lounge</li>
                    <li><i class="fas fa-paw feature-icon icon-pets"></i> Pet-friendly Patio & Curated Coffee Bar</li>
                </ul>
            </div>
            <div class="about-image-wrapper" data-aos="slide-up">
                <img src="src/img/raka4.jpeg" alt="Raka Restaurant Live Dining Promotion">
            </div>
        </div>

        <div class="vision-cards-container">
            <div class="vision-card" data-aos="fade-up"
                data-aos-duration="3000">
                <div class="card-header" style="color:  #fff;">
                    <i class="fas fa-lightbulb vision-icon icon-vision"></i>
                    <h3>Our Vision</h3>
                </div>
                <p class="word" style="color: #fff;">To create a dining journey where flavor, ambience, and artistry meet in perfect harmony.</p>
            </div>

            <div class="vision-card" data-aos="fade-down"
                data-aos-duration="3000">
                <div class="card-header">
                    <i class="fas fa-utensils vision-icon"></i>
                    <h3>Culinary Experience</h3>
                </div>
                <p class="word" style="color: #fff;">Our chefs craft seasonal menus, sourcing only the freshest local and international ingredients.</p>
            </div>

            <div class="vision-card" data-aos="fade-up"
                data-aos-duration="3000">
                <div class="card-header">
                    <i class="fas fa-star vision-icon icon-star"></i>
                    <h3>Raka Luxury</h3>
                </div>
                <p class="word" style="color: #fff;">From VIP lounges to intimate private dining, we redefine premium hospitality.</p>
            </div>
        </div>
    </section>


    <section id="menu" class="section section-dark reveal">
        <video autoplay muted loop playsinline class="menu-bg-video">
            <source src="src/vid/bg _vid.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        
        <div class="wrap">
            <h1><b>Our Menu</b></h1>
            <p class="lead">
                A taste for every mood. Seasonal tasting menus and à la carte options—Veg & Non-Veg, Private dining
                menus available.
            </p>
        </div><div class="menu-grid">
            <?php
            // Fetch all menu categories from the database
            $sql_categories = "SELECT name, description, image_url, popup_key FROM menu_categories ORDER BY id ASC";
            $result_categories = mysqli_query($conn, $sql_categories);

            if (mysqli_num_rows($result_categories) > 0) {
                while ($row_cat = mysqli_fetch_assoc($result_categories)) {
            ?>
                    <article class="menu-card" onclick="openPopup('<?php echo htmlspecialchars($row_cat['popup_key']); ?>')" data-aos="flip-left">
                        <img src="<?php echo htmlspecialchars($row_cat['image_url']); ?>" alt="<?php echo htmlspecialchars($row_cat['name']); ?>">
                        <h2><?php echo htmlspecialchars($row_cat['name']); ?></h2>
                        <p class="big" style="font-size: medium;"><?php echo $row_cat['description']; ?></p>
                    </article>
            <?php
                }
            } else {
                echo "<p>No menu categories found.</p>";
            }
            ?>
        </div>
    </section>
    
    <div id="food-list-panel" class="panel-overlay" onclick="closePanel(event)">
        <div class="panel-content">
            <span class="panel-close" onclick="closePanel(event)">×</span>
            <h2 id="panel-title"></h2>
            <div id="panel-list">
                </div>
        </div>
    </div>

    
    <main>
    <section id="experience" class="container">
        <h2 class="section-title" data-aos="fade-up"
            data-aos-duration="3000">The Raka Ambience</h2>

        <?php

        $sql_ambience = "SELECT * FROM ambience_features ORDER BY display_order ASC";
        $result_ambience = mysqli_query($conn, $sql_ambience);
        
        // Start of the Ambience loop
        if (mysqli_num_rows($result_ambience) > 0) {
            while($row = mysqli_fetch_assoc($result_ambience)) {
        ?>

        <div class="experience-feature reveal">
            <div class="experience-gallery" data-aos="zoom-in">
                <img src="<?php echo htmlspecialchars($row['image1_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?> view 1">
                <img src="<?php echo htmlspecialchars($row['image2_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?> view 2">
                <img src="<?php echo htmlspecialchars($row['image3_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?> view 3">
            </div>
            <div class="experience-text" data-aos="slide-right">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <h4 class="fontt" style="font-size: 1.26rem;"><?php echo htmlspecialchars($row['subtitle']); ?></h4>
                <p class="word" style="color: #0e0d0d; font-weight: lighter;"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
            </div>
        </div>

        <?php
            } // End of while loop
        } else {
            echo "<p>Ambience features coming soon.</p>";
        } // End of if statement
        ?>

    </section>
        <section id="gallery" class="gallery-section" style="background-color: transparent;margin-bottom: 120px;">
            <h2 class="section-title" style="color:rgb(252, 114, 22);">Our Gallery</h2>

            <div class="gallery-grid">

                <?php
                // --- FETCH GALLERY IMAGES ---
                $sql = "SELECT image_url, alt_text FROM gallery_images ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                // --- Start of the Dynamic Gallery Loop ---
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each image from the database
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <div class="gallery-item" data-aos="fade-up">
                            <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['alt_text']); ?>">
                            <div class="gallery-overlay">
                                <h3>Raka</h3>
                            </div>
                        </div>

                <?php
                    } // End of the while loop
                } else {
                    // If no images are found in the database
                    echo "<p style='color: white; text-align: center;'>No images found in the gallery.</p>";
                }
                // --- End of the Dynamic Gallery Loop ---
                ?>

            </div>
        </section>

        <main class="bg">
            <section id="contact" class="container reveal">
                <h2 class="section-title" style="color: rgb(252, 250, 250);">Visit Us or Get in Touch</h2>
                <div class="contact-wrapper" data-aos="fade-up">
                    <div class="contact-info">
                        <h3>Our Location</h3>
                        <p>Plot No: 64/5, Kancharampettai, Madurai to Natham NH 785, Madurai, Tamil Nadu 625014</p>
                        <h3>Hours</h3>
                        <p>Monday - Sunday: 11:30 AM - 11:30 PM</p>
                        <h3>Call Us</h3>
                        <p><a href="tel:+917871112929" class="contact-link">+91 78711 12929</a></p>
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.414088037324!2d78.17062107481084!3d10.044161971485662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c6f5f5f5f5f5%3A0x8f8f8f8f8f8f8f8f!2sKancharampettai!5e0!3m2!1sen!2sin!4v1721625232770!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <form id="contactForm" class="contact-form" method="POST" novalidate>
                        <h2>Send us a Message</h2>
                        <div class="form-group"><input type="text" id="name" name="name" required placeholder="Full Name"></div>
                        <div class="form-group"><input type="email" id="email" name="email" required placeholder="Email Address"></div>
                        <div class="form-group"><input type="tel" id="phone" name="phone" required placeholder="Phone Number"></div>
                        <div class="form-group"><textarea id="message" name="message" rows="4" required placeholder="Your Message or Reservation Inquiry"></textarea></div>
                        <button type="submit" class="cta-button">Submit</button>
                        <div id="form-status"></div>
                    </form>
                </div>
            </section>
        </main>

        <footer class="site-footer" style="background-color:  #1d1d1d;">
            <div class="container footer-grid">
                <div class="footer-about">
                    <img src="src/img/logo.jpeg" alt="Raka Restaurant Logo" class="footer-logo">
                    <p>Madurai's first live dining experience, serving authentic farm-to-table non-vegetarian cuisine.</p>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="ambience.php">Ambience</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Contact Us</h4>
                    <p><i class="fas fa-map-marker-alt"></i>Plot No: 64/5, Kancharampettai, Natham Road, Madurai</p>
                    <p><i class="fas fa-phone"></i> <a href="tel:+919876543210" class="contact-link">+91 98765 43210</a></p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:contact@rakarestaurant.com" class="contact-link">contact@rakarestaurant.com</a></p>
                </div>
                <div class="footer-social">
                    <h4>Follow Us</h4>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/raka_restaurant_?igsh=YTQzZWlhdHM5YzEx"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Raka Restaurant, Madurai. All Rights Reserved.</p>
            </div>
        </footer>

        <script src="script.js"></script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1200, // animation duration
                once: false, // This allows animations to happen every time you scroll
                offset: 100, // trigger point
            });
        </script>

</body>

</html>
<?php
mysqli_close($conn);
?>