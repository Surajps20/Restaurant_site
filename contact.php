<?php
include 'db.php'; // Included for consistency, though not used on this static page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>
    <link rel="icon" type="image/x-icon" href="./src/img/raka.png">

    <meta name="description" content="Discover the story behind Raka, our culinary philosophy of farm-to-table dining, and the unique, luxurious dhaba-style ambience we've crafted in Madurai.">
    <meta property="og:title" content="About Raka Restaurant - Our Story & Philosophy">
    <meta property="og:description" content="Learn about our passion for authentic flavors, live entertainment, and creating Madurai's premier dining experience.">
    <meta property="og:image" content="src/img/raka_social_share_image.jpeg">
    <meta property="og:url" content="https://www.rakarestaurant.com/about.php">
    <meta property="og:type" content="website">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <link rel="stylesheet" href="contact.css">
</head>

<body>

   <nav class="navbar">
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
<br>
<br>
        <section class="hero-wrap hero-wrap-2 slideshow" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-5">
          <h1 class="mb-2 bread" style="color: white; font-size:4rem; ">Contact  Us</h1>
          <!--<p class="breadcrumbs">
            <span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
            <span>About <i class="fa fa-chevron-right"></i></span>
          </p>-->
        </div>
      </div>
    </div>
  </section>

  <style>
    .slideshow {
      position: relative;
      height: 100vh;
      background-size: cover;
      background-position: center;
      animation: slideShow 20s infinite;
    }

    @keyframes slideShow {
      0% {
        background-image: url("src/img/aboutbg.jpg");
      }

      25% {
        background-image: url("src/img/banner_bg.jpg");
      }

      50% {
        background-image: url("src/img/icecream.jpg");
      }

      75% {
        background-image: url("src/img/lunch-2.jpg");
      }

      100% {
        background-image: url("src/img/dinner-6.jpg");
      }
    }
  </style>
<center>
  <div class="reservation-cta">
  <h3>Book a Table</h3>
  <a href="menu.php" class="cta-button">Reserve Now</a>
</div>
</center>







<main class="bg">
    <section id="contact" class="container">
        <h2 class="section-title" style="color: rgba(4, 4, 4, 1);">Visit Us or Get in Touch</h2>
        <div class="contact-wrapper" data-aos="fade-up">
            <div class="contact-info">
                <h3>Our Location</h3>
                <p>Plot No: 64/5, Kancharampettai, Madurai to Natham NH 785, Madurai, Tamil Nadu 625014</p>
                <h3>Hours</h3>
                <p>Monday - Sunday: 11:30 AM - 11:30 PM</p>
                <h3>Call Us</h3>
                <p><a href="tel:+917871112929" class="contact-link">+91 78711 12929</a></p>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.418751512411!2d78.1694358748083!3d9.98036089012497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c735d332617b%3A0x7e38f8f2e21b2502!2sRAKA%20RESTAURANT!5e0!3m2!1sen!2sin!4v1727332410714!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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