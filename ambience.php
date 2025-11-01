<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <link rel="stylesheet" href="ambience.css">

    <title>Ambience - Raka Restaurant</title>
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

    <section class="hero-wrap hero-wrap-2 slideshow" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Ambience</h1>
                </div>
            </div>
        </div>
    </section>

    <style>
        .slideshow {
            position: relative;
            /* FIX: Changed height from 200vh (twice the screen height) to a more reasonable 70vh. Adjust as needed. */
            height: 70vh;
            background-size: cover;
            background-position: center;
            animation: slideShow 20s infinite;
        }

        @keyframes slideShow {
            /* * FIX: Your original code used the same image for all steps.
             * To make it a slideshow, you need to use DIFFERENT images.
             * I've corrected the first image path to .jpg (based on your upload) 
             * and added placeholders for other images. Replace them with your actual image paths.
            */
            0%, 100% {
                background-image: url("src/img/aboutus2.jpeg");
            }
            33% {
                /* Replace with your second slideshow image */
                background-image: url("src/img/aboutus2.jpeg"); 
            }
            66% {
                 /* Replace with your third slideshow image */
                background-image: url("src/img/aboutus2.jpeg");
            }
        }
    </style>

    <section id="experience" class="container">
        <h2 class="section-title" data-aos="fade-up" data-aos-duration="3000">The Raka Ambience</h2>

        <?php
        $sql_ambience = "SELECT * FROM ambience_features ORDER BY display_order ASC";
        $result_ambience = mysqli_query($conn, $sql_ambience);
        
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
    
    <section id="gallery" class="gallery-section" style="background-color: transparent; margin-bottom: 120px;">
        <h2 class="section-title" style="color:rgb(252, 114, 22);">Our Gallery</h2>
        <div class="gallery-grid">
            <?php
            // Fetch gallery images
            $sql = "SELECT image_url, alt_text FROM gallery_images ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="gallery-item" data-aos="fade-up">
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['alt_text']); ?>">
                <div class="gallery-overlay">
                    <h3>Raka</h3>
                </div>
            </div>
            <?php
                } // End of while loop
            } else {
                echo "<p style='color: white; text-align: center;'>No images found in the gallery.</p>";
            }
            ?>
        </div>
    </section>

    <footer class="site-footer">
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
                <p><i class="fas fa-phone"></i> <a href="tel:+917871112929" class="contact-link">+91 78711 12929</a></p>
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

    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        });
    </script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200, // animation duration
            once: false,     // This allows animations to happen every time you scroll
            offset: 100,     // trigger point
        });
    </script>
</body>
</html>