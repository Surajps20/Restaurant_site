<?php
include 'db.php'; // Included for consistency and used by the PHP blocks below
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF--8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
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
    <link rel="stylesheet" href="menu.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <section class="hero" data-aos="fade-up" data-aos-duration="1200">
        <div class="hero-overlay">
            <h2 class="hero-title" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">Menu</h2>

            <div class="menu-tabs">
                <button class="tab-btn active" data-tab="breakfast" data-aos="zoom-in" data-aos-delay="200">Breakfast</button>
                <button class="tab-btn" data-tab="lunch" data-aos="zoom-in" data-aos-delay="300">Lunch</button>
                <button class="tab-btn" data-tab="dinner" data-aos="zoom-in" data-aos-delay="400">Dinner</button>
                <button class="tab-btn" data-tab="desert" data-aos="zoom-in" data-aos-delay="500">Desert</button>
                <button class="tab-btn" data-tab="drinks" data-aos="zoom-in" data-aos-delay="600">Drinks</button>
            </div>

            <div class="menu-content">
                <div class="menu-panel active" id="breakfast">
                    <ul>
                        <li data-aos="fade-right" data-aos-delay="100"><img src="src/img/breakfast-3.jpg" alt="Pancakes"> Pancakes
                            <span>₹800</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/breakfast-4.jpg" alt="Omelette"> Omelette
                            <span>₹600</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="300"><img src="src/img/breakfast-6.jpg" alt="Waffles"> Waffles
                            <span>₹950</span>
                        </li>
                    </ul>
                </div>
                <div class="menu-panel" id="lunch">
                    <ul>
                        <li data-aos="fade-right" data-aos-delay="100"><img src="src/img/curry.jpg" alt="Chicken Curry"> Chicken Curry
                            <span>₹950</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/veggies.jpg" alt="Mixed Vegetables"> Veggies
                            <span>₹800</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="300"><img src="src/img/fish.jpg" alt="Fish Fry"> Fish Fry
                            <span>₹1,200</span>
                        </li>
                    </ul>
                </div>
                <div class="menu-panel" id="dinner">
                    <ul>
                        <li data-aos="fade-right" data-aos-delay="100"><img src="src/img/beef.jpg" alt="Beef Steak"> Beef
                            <span>₹1,600</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/sushi.jpg" alt="Sushi Platter"> Sushi
                            <span>₹1,400</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="300"><img src="src/img/grill.jpg" alt="Grilled Chicken"> Chicken Grill
                            <span>₹1,750</span>
                        </li>
                    </ul>
                </div>
                <div class="menu-panel" id="desert">
                    <ul>
                        <li data-aos="fade-right" data-aos-delay="100"><img src="src/img/ice.jpg" alt="Ice Cream Scoop"> Ice Cream
                            <span>₹450</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/brownie.jpg" alt="Chocolate Brownie"> Brownie
                            <span>₹525</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/dessert.jpg" alt="Pancakes with syrup"> Pan Cakes
                            <span>₹525</span>
                        </li>
                    </ul>
                </div>
                <div class="menu-panel" id="drinks">
                    <ul>
                        <li data-aos="fade-right" data-aos-delay="100"><img src="src/img/coffee.jpg" alt="Cup of Coffee"> Coffee
                            <span>₹375</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/juice.jpg" alt="Fresh Juice"> Juice
                            <span>₹300</span>
                        </li>
                        <li data-aos="fade-right" data-aos-delay="200"><img src="src/img/mock.jpg" alt="Colorful Mocktail"> Mocktails
                            <span>₹525</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="popular" data-aos="fade-up" data-aos-duration="1200">
        <h2 class="section-title" data-aos="fade-down" data-aos-delay="100">Popular Dish</h2>

        <div class="popular-grid">
            <div class="dish-card" data-aos="zoom-in" data-aos-delay="200">
                <img src="src/img/breakfast-7.jpg" alt="Fish Fry Dish">
                <h3>Fish Fry</h3>
                <p>Freshly marinated fish, shallow fried with a spicy South Indian twist.</p>
            </div>

            <div class="dish-card highlight" data-aos="zoom-in" data-aos-delay="400">
                <img src="src/img/menu-1.jpg" alt="American Chop Suey Dish">
                <h3 class="care" style="color: #5a2b2b;;">American Chop Suey</h3>
                <p>A crunchy noodle base topped with sweet & spicy vegetable gravy</p>
            </div>

            <div class="dish-card" data-aos="zoom-in" data-aos-delay="600">
                <img src="src/img/menu-3.jpg" alt="Thai Green Curry Dish">
                <h3>Thai Green Curry</h3>
                <p>Fragrant coconut-based curry with exotic spices, served with jasmine rice.</p>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-text" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
            <h2>Welcome to <span> Raka Restaurant</span></h2>
            <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">Welcome to Raka Restaurant, where every meal
                is a celebration of taste, tradition, and togetherness. From the moment you step in, you’re not just our
                guest—you’re part of our family.</p>
            <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                We take pride in serving dishes made with the finest ingredients, blending authentic recipes with a modern
                touch. Whether you’re here for a casual meal, a family gathering, or a special celebration, our warm
                hospitality and inviting ambience ensure a memorable dining experience.</p>
        </div>

        <div class="about-gallery">
            <img src="src/img/menu1.jpeg" alt="Dish One" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="800">
            <img src="src/img/budda.jpeg" alt="Dish Two" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="1000">
        </div>
    </section>

    <section class="highlight-section">
        <div class="highlight-box" data-aos="fade-right" data-aos-duration="1200">
            <h3 class="highlight-title" data-aos="fade-up" data-aos-delay="200">Best Seller!</h3>
            <ul class="highlight-list">
                <li data-aos="fade-up" data-aos-delay="400">
                    Kari Dosa <span>₹180</span>
                </li>
                <li data-aos="fade-up" data-aos-delay="600">
                    Madurai Famous Jigarthanda <span>₹120</span>
                </li>
                <li data-aos="fade-up" data-aos-delay="800">
                    Mutton Chukka <span>₹250</span>
                </li>
                <li data-aos="fade-up" data-aos-delay="1000">
                    Parotta with Salna <span>₹140</span>
                </li>
            </ul>

        </div>

        <div class="highlight-image" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="500">
            <img src="src/img/about18.jpeg" alt="Best Seller Dish" style="height: 600px;">
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
        </div>
        <div class="menu-grid">
            <?php
            // Fetch all menu categories from the database
            $sql_categories = "SELECT name, description, image_url, popup_key FROM menu_categories ORDER BY id ASC";
            $result_categories = mysqli_query($conn, $sql_categories);

            if ($result_categories && mysqli_num_rows($result_categories) > 0) {
                while ($row_cat = mysqli_fetch_assoc($result_categories)) {
            ?>
                    <article class="menu-card" onclick="openPopup('<?php echo htmlspecialchars($row_cat['popup_key']); ?>')" data-aos="flip-left">
                        <img src="<?php echo htmlspecialchars($row_cat['image_url']); ?>" alt="<?php echo htmlspecialchars($row_cat['name']); ?>">
                        <h2><?php echo htmlspecialchars($row_cat['name']); ?></h2>
                        <p class="big" style="font-size: medium;"><?php echo htmlspecialchars($row_cat['description']); ?></p>
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

    <section class="kitchen-section">
        <img src="src/img/kitchen12.jpeg" alt="Kitchen View" class="kitchen-photo" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">

        <div class="kitchen-content" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
            <h2 data-aos="fade-up" data-aos-delay="600">Inside Our Kitchen</h2>
            <p data-aos="fade-up" data-aos-delay="800">Step inside the heart of Raka Restaurant, where passion meets
                perfection. Our kitchen is more than a cooking space—it’s where fresh ingredients, authentic recipes, and
                skilled hands come together to create unforgettable flavors.

                Every dish begins with carefully sourced produce, aromatic spices, and the finest cuts, handled with care to
                preserve their natural taste. Our chefs blend traditional Madurai flavors with modern techniques, ensuring
                every plate is rich in authenticity and full of character.</p>
            <a href="#" class="primary-btn" data-aos="zoom-in" data-aos-delay="1000">Click Here</a>
        </div>
    </section>

    <section class="raka-wrapper">
        <div class="raka-booking-box" data-aos="fade-right" data-aos-duration="1200">
            <h2 class="raka-booking-title" data-aos="fade-down" data-aos-delay="200">BOOK YOUR TABLE</h2>

            <form class="raka-booking-form" action="process_booking.php" method="POST" data-aos="fade-up" data-aos-delay="400" id="bookingForm">

                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="phone" placeholder="Phone" required>
                <input type="date" name="booking_date" required>
                <input type="time" name="booking_time" required>
                <select name="guests" required>
                    <option value="">Guest</option>
                    <option value="1">1 Person</option>
                    <option value="2">2 People</option>
                    <option value="3">3 People</option>
                    <option value="4">4 People</option>
                    <option value="5+">5+ People</option>
                </select>

                <div class="food-menu-container">
                    <button type="button" class="food-menu-toggle">Order Food 🍲</button>
                    <div class="food-menu-dropdown" style="display: none;">
                    </div>
                </div>

                <div class="totals-display">
                    <div class="total-line">
                        <strong>Total Food Bill:</strong>
                        <span id="totalAmount">₹0.00</span>
                    </div>
                    <div class="total-line advance">
                        <strong>Advance (50%):</strong>
                        <span id="advanceAmount">₹0.00</span>
                    </div>
                </div>

                <input type="hidden" name="food_order" id="foodOrderInput">
                <button type="button" id="open-review-popup-btn" class="raka-submit-btn" style="background-color: #6c757d; margin-bottom: 10px;">Review Your Order</button>
                <button type="submit" class="raka-submit-btn" data-aos="zoom-in" data-aos-delay="600">Book Your Table Now</button>
            </form>
        </div>

        <div class="raka-about-text" style="margin-left: 30px;" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="800">
            <h4 class="raka-subtitle" data-aos="fade-up" data-aos-delay="900">About</h4>
            <h2 class="raka-heading" data-aos="fade-up" data-aos-delay="1000">Welcome to <span>Raka Restaurant</span></h2>
            <p class="raka-description" data-aos="fade-up" data-aos-delay="1100">
                On her way she met a copy. The copy warned the Little Blind Text,
                that where it came from it would have been rewritten a thousand
                times and everything that was left from its origin would be the
                word "and" and the Little Blind Text should turn around and return
                to its own, safe country. A small river named Duden flows by their
                place and supplies it with the necessary regelialia. It is a
                paradisematic country, in which roasted parts of sentences fly into
                your mouth.
            </p>
        </div>

        <div class="raka-chef-photo" style="height: 800px;" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1200">
            <img src="src/img/chef.jpeg" alt="Chef">
        </div>
    </section>
    
    <div id="order-review-popup" class="order-review-overlay">
        <div class="order-review-content">
            <span class="close-review-popup">&times;</span>
            <h2>Your Order Summary</h2>
            <div id="review-items-list">
                </div>
            <div class="review-totals">
                <div class="review-total-line">
                    <strong>Total Bill:</strong>
                    <span id="review-total-amount">₹0.00</span>
                </div>
                <div class="review-total-line advance">
                    <strong>Advance to Pay (50%):</strong>
                    <span id="review-advance-amount">₹0.00</span>
                </div>
            </div>
            <button class="raka-submit-btn" id="confirm-order-btn">Looks Good, Continue</button>
        </div>
    </div>
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

    <style>
        /* --- Existing Form Styles --- */
        .food-menu-container {
            width: 100%;
            margin-bottom: 20px;
        }

        .food-menu-toggle {
            width: 100%;
            padding: 15px;
            background-color: #ff8c00;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        .food-menu-dropdown {
            margin-top: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-height: 250px;
            overflow-y: auto;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .menu-item-details {
            flex-grow: 1;
        }

        .menu-item-details strong {
            display: block;
            color: #333;
        }

        .menu-item-details span {
            color: #777;
            font-size: 14px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-control button {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        .quantity-control input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            border-left: none;
            border-right: none;
            height: 30px;
            padding: 0 5px;
        }

        .totals-display {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px dashed #ff8c00;
            border-radius: 5px;
            background-color: #fffaf0;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            color: #333;
        }

        .total-line.advance {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #d9534f;
        }

        .total-line span {
            font-weight: bold;
        }
        
        /* ============================================= */
        /* START: NEW CSS FOR ORDER REVIEW POPUP */
        /* ============================================= */
        .order-review-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none; /* Initially hidden */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .order-review-content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .order-review-content h2 {
            margin-top: 0;
            color: #5a2b2b;
            text-align: center;
            margin-bottom: 20px;
        }

        .close-review-popup {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 30px;
            font-weight: bold;
            color: #aaa;
            cursor: pointer;
        }
        
        #review-items-list {
            margin-bottom: 20px;
            max-height: 250px;
            overflow-y: auto;
        }
        
        .review-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-item-name {
            font-weight: bold;
        }
        
        .review-totals {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #5a2b2b;
        }

        .review-total-line {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .review-total-line.advance {
            font-size: 18px;
            font-weight: bold;
            color: #d9534f;
        }
        
        #confirm-order-btn {
            width: 100%;
            margin-top: 20px;
        }
        
        /* ============================================= */
        /* END: NEW CSS FOR ORDER REVIEW POPUP */
        /* ============================================= */

    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- Initialize AOS (Animate on Scroll) ---
            AOS.init({
                duration: 1200,
                once: true
            });

            // --- Hamburger Menu Toggle ---
            const hamburger = document.querySelector(".hamburger");
            const navMenu = document.querySelector(".nav-menu");
            hamburger.addEventListener("click", () => {
                hamburger.classList.toggle("active");
                navMenu.classList.toggle("active");
            });

            // --- Main Menu Tabs (Breakfast, Lunch, etc.) ---
            const tabs = document.querySelectorAll(".tab-btn");
            const panels = document.querySelectorAll(".menu-panel");
            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    tabs.forEach(btn => btn.classList.remove("active"));
                    panels.forEach(panel => panel.classList.remove("active"));
                    tab.classList.add("active");
                    const target = tab.getAttribute("data-tab");
                    document.getElementById(target).classList.add("active");
                });
            });

            // --- BOOKING FORM SCRIPT ---

            // 1. DEFINE YOUR MENU ITEMS DYNAMICALLY FROM THE DATABASE
            const menuItems = [
                <?php
                // This query selects ALL individual dishes from your items table.
                // If your table is not named 'menu_items', change it here.
                $sql_all_items = "SELECT id, name, price FROM menu_items ORDER BY name ASC";
                $result_all_items = mysqli_query($conn, $sql_all_items);

                if ($result_all_items && mysqli_num_rows($result_all_items) > 0) {
                    $items_array = [];
                    while ($row = mysqli_fetch_assoc($result_all_items)) {
                        // Sanitize data
                        $id = (int)$row['id'];
                        $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                        $price = (float)$row['price'];
                        
                        // Format for JavaScript
                        $items_array[] = "{ id: {$id}, name: '{$name}', price: {$price} }";
                    }
                    echo implode(",\n", $items_array);
                }
                ?>
            ];

            // Get references to HTML elements
            const toggleButton = document.querySelector('.food-menu-toggle');
            const menuDropdown = document.querySelector('.food-menu-dropdown');
            const totalAmountSpan = document.getElementById('totalAmount');
            const advanceAmountSpan = document.getElementById('advanceAmount');
            const foodOrderInput = document.getElementById('foodOrderInput');

            // 2. CREATE AND DISPLAY THE MENU
            function renderMenu() {
                menuDropdown.innerHTML = ''; // Clear previous items
                menuItems.forEach(item => {
                    const menuItemHTML = `
                        <div class="menu-item" data-id="${item.id}" data-price="${item.price}" data-name="${item.name}">
                            <div class="menu-item-details">
                                <strong>${item.name}</strong>
                                <span>₹${item.price.toFixed(2)}</span>
                            </div>
                            <div class="quantity-control">
                                <button type="button" class="quantity-btn decrease">-</button>
                                <input type="text" class="quantity-input" value="0" readonly>
                                <button type="button" class="quantity-btn increase">+</button>
                            </div>
                        </div>
                    `;
                    menuDropdown.insertAdjacentHTML('beforeend', menuItemHTML);
                });
            }

            // 3. HANDLE CLICKS
            toggleButton.addEventListener('click', () => {
                menuDropdown.style.display = menuDropdown.style.display === 'none' ? 'block' : 'none';
            });

            menuDropdown.addEventListener('click', (e) => {
                if (e.target.classList.contains('quantity-btn')) {
                    const button = e.target;
                    const input = button.parentElement.querySelector('.quantity-input');
                    let currentValue = parseInt(input.value, 10);

                    if (button.classList.contains('increase')) {
                        currentValue++;
                    } else if (button.classList.contains('decrease') && currentValue > 0) {
                        currentValue--;
                    }

                    input.value = currentValue;
                    updateTotals();
                }
            });

            // 4. THE MAIN CALCULATION FUNCTION
            function updateTotals() {
                let total = 0;
                const selectedItems = [];
                const allMenuItems = menuDropdown.querySelectorAll('.menu-item');

                allMenuItems.forEach(item => {
                    const price = parseFloat(item.dataset.price);
                    const quantity = parseInt(item.querySelector('.quantity-input').value, 10);

                    if (quantity > 0) {
                        total += price * quantity;
                        selectedItems.push({
                            name: item.dataset.name,
                            quantity: quantity,
                            price: price
                        });
                    }
                });

                const advance = total * 0.50;
                
                const currencyOptions = { style: 'currency', currency: 'INR' };
                totalAmountSpan.textContent = total.toLocaleString('en-IN', currencyOptions);
                advanceAmountSpan.textContent = advance.toLocaleString('en-IN', currencyOptions);

                foodOrderInput.value = JSON.stringify(selectedItems);
            }

            // INITIALIZE THE MENU
            renderMenu();

            
            // =============================================
            // START: NEW JAVASCRIPT FOR ORDER REVIEW POPUP
            // =============================================
            
            // Get popup elements
            const reviewPopup = document.getElementById('order-review-popup');
            const openReviewBtn = document.getElementById('open-review-popup-btn');
            const closeReviewBtn = document.querySelector('.close-review-popup');
            const reviewItemsList = document.getElementById('review-items-list');
            const reviewTotalSpan = document.getElementById('review-total-amount');
            const reviewAdvanceSpan = document.getElementById('review-advance-amount');
            const confirmOrderBtn = document.getElementById('confirm-order-btn');
            
            // Function to open and populate the review popup
            function openReviewPopup() {
                const orderData = JSON.parse(foodOrderInput.value || '[]');
                
                if (orderData.length === 0) {
                    alert("Please select at least one food item to review your order.");
                    return;
                }
                
                reviewItemsList.innerHTML = ''; // Clear previous list
                let total = 0;

                orderData.forEach(item => {
                    const itemTotal = item.quantity * item.price;
                    total += itemTotal;
                    
                    const itemHTML = `
                        <div class="review-item">
                            <div class="review-item-name">${item.name} (x${item.quantity})</div>
                            <div class="review-item-price">₹${itemTotal.toFixed(2)}</div>
                        </div>
                    `;
                    reviewItemsList.insertAdjacentHTML('beforeend', itemHTML);
                });

                const advance = total * 0.50;
                const currencyOptions = { style: 'currency', currency: 'INR' };

                reviewTotalSpan.textContent = total.toLocaleString('en-IN', currencyOptions);
                reviewAdvanceSpan.textContent = advance.toLocaleString('en-IN', currencyOptions);

                reviewPopup.style.display = 'flex'; // Show the popup
            }

            // Function to close the review popup
            function closeReviewPopup() {
                reviewPopup.style.display = 'none';
            }
            
            // Event Listeners
            openReviewBtn.addEventListener('click', openReviewPopup);
            closeReviewBtn.addEventListener('click', closeReviewPopup);
            confirmOrderBtn.addEventListener('click', closeReviewPopup); // Simply closes the popup
            
            // Close popup if user clicks on the overlay background
            reviewPopup.addEventListener('click', (e) => {
                if (e.target === reviewPopup) {
                    closeReviewPopup();
                }
            });

            // =============================================
            // END: NEW JAVASCRIPT FOR ORDER REVIEW POPUP
            // =============================================

        });

        /**
         * Opens the popup panel and fetches menu items for the selected category.
         * @param {string} menuKey - The unique key for the menu category (e.g., 'starters').
         */
        function openPopup(menuKey) {
            const panel = document.getElementById("food-list-panel");
            const title = document.getElementById("panel-title");
            const list = document.getElementById("panel-list");

            title.textContent = "Loading...";
            list.innerHTML = "";
            panel.style.display = "flex";

            fetch(`get_menu_items.php?category=${menuKey}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        title.textContent = "Error";
                        list.innerHTML = `<p>${data.error}</p>`;
                        return;
                    }

                    title.textContent = data.title;
                    list.innerHTML = "";

                    if (data.dishes && data.dishes.length > 0) {
                        data.dishes.forEach(dish => {
                            const div = document.createElement("div");
                            div.className = "dish-item";
                            div.innerHTML = `
                                <img src="${dish.img}" alt="${dish.name}">
                                <div class="dish-info">
                                    <span>${dish.name}</span>
                                </div>
                                <span>₹${parseFloat(dish.price).toFixed(2)}</span>
                            `;
                            list.appendChild(div);
                        });
                    } else {
                        list.innerHTML = "<p>No dishes found for this category.</p>";
                    }
                })
                .catch(error => {
                    console.error('Error fetching menu items:', error);
                    title.textContent = "Failed to Load";
                    list.innerHTML = "<p>Could not retrieve menu items. Please try again later.</p>";
                });
        }

        /**
         * Closes the panel if the click is on the overlay or the close button.
         * @param {Event} event - The click event.
         */
        function closePanel(event) {
            const panel = document.getElementById("food-list-panel");
            if (event.target === panel || event.target.classList.contains('panel-close')) {
                panel.style.display = "none";
            }
        }
    </script>
    
</body>

</html>