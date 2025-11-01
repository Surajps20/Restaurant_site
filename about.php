<?php
include 'db.php'; // Included for consistency, though not used on this static page
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Bootstrap CSS first -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="about.css">

  <title>Document</title>
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
          <h1 class="mb-2 bread">About Us</h1>
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
      height: 500px;
      background-size: cover;
      background-position: center;
      animation: slideShow 20s infinite;
    }

    @keyframes slideShow {
      0% {
        background-image: url("src/img/aboutus5.jpeg");
      }

      25% {
        background-image: url("src/img/aboutus5.jpeg");
      }

      50% {
        background-image: url("src/img/aboutus5.jpeg");
      }

      75% {
        background-image: url("src/img/aboutus5.jpeg");
      }

      100% {
        background-image: url("src/img/aboutus5.jpeg");
      }
    }
  </style>


  <!-- About Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 align-items-center">
        <!-- Left Images -->
        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
          <div class="row g-3">
            <div class="col-6 text-start">
              <img class="img-fluid rounded w-100" src="src/img/gal15.jpeg" data-aos="zoom-in" data-aos-delay="100">
            </div>
            <div class="col-6 text-start">
              <img class="img-fluid rounded w-75" src="src/img/about8.jpeg" style="margin-top: 25%;" data-aos="zoom-in"
                data-aos-delay="300">
            </div>
            <div class="col-6 text-end">
              <img class="img-fluid rounded w-75" src="src/img/hut2.jpeg" data-aos="zoom-in" data-aos-delay="500">
            </div>
            <div class="col-6 text-end">
              <img class="img-fluid rounded w-100" src="src/img/gal19.jpeg" data-aos="zoom-in" data-aos-delay="700">
            </div>
          </div>
        </div>

        <!-- Right Content -->
        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
          <h5 class="sectabt" style="color: orange;" data-aos="fade-up" data-aos-delay="200">About Us</h5>
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="400">Welcome to <i class="fa fa-utensils line"
              style="color: orange;"></i>Raka</h1>
          <p class="mb-4" data-aos="fade-up" data-aos-delay="600">Welcome to Raka Restaurant, where flavor meets
            tradition and every meal is crafted with care. Nestled in the heart of [your city], Raka is more than just a
            place to dine – it’s an experience of warmth, hospitality, and unforgettable taste.

            At Raka, we believe that food tells a story. That’s why our chefs carefully select the finest ingredients,
            blending authentic recipes with a modern touch to create dishes that celebrate both tradition and
            innovation.</p>
          <p class="mb-4" data-aos="fade-up" data-aos-delay="800"> From our signature specialties to our freshly
            prepared seasonal offerings, every plate is designed to delight your senses.But great food is only part of
            the journey. Our cozy ambience, attentive service, and passion for
            hospitality make Raka the perfect spot for family gatherings, romantic dinners, business meetings, or simply
            a relaxed meal with friends.</p>

          <!-- Stats -->
          <div class="row g-4 mb-4">
            <div class="col-sm-6" data-aos="flip-left" data-aos-delay="1000">
              <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                <h1 class="abt" style="color: orange;font-size:3.5rem;" data-toggle="counter-up">15</h1>
                <div class="ps-4">
                  <p class="mb-0">Years of</p>
                  <h6 class="text-uppercase mb-0">Experience</h6>
                </div>
              </div>
            </div>
            <div class="col-sm-6" data-aos="flip-right" data-aos-delay="1200">
              <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                <h1 class="abt" style="color: orange;font-size:3.5rem;" data-toggle="counter-up">50</h1>
                <div class="ps-4">
                  <p class="mb-0">Popular</p>
                  <h6 class="text-uppercase mb-0">Master Chefs</h6>
                </div>
              </div>
            </div>
          </div>

          <!-- Button -->
          <a class="btn" style="background-color: orange;width: 150px;height: 50px;font-size: 1.2rem;" href=""
            data-aos="fade-up" data-aos-delay="1400">Read More</a>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->
    <style>
    .ftco-section .img-container .img {
        width: 100%;
        min-height: 400px; /* Give images a consistent height */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    /* Add some spacing between stacked images on mobile */
    @media (max-width: 767.98px) {
        .ftco-section .img-container .img {
            min-height: 700px; /* Optional: adjust height for mobile */
        }
        .ftco-section .img-container .img:first-child {
            margin-bottom: 1.5rem; /* 24px space between images when stacked */
        }
    }
</style>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row g-5 align-items-center"> <div class="col-lg-6 img-container" data-aos="fade-right" data-aos-duration="1200">
                <div class="row">
                    <div class="col-md-6">
                         <div class="img" style="background-image: url(src/img/bg_6.jpg);" data-aos="zoom-in" data-aos-delay="200"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="img" style="background-image: url(src/img/bg_4.jpg);" data-aos="zoom-in" data-aos-delay="400"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ftco-animate makereservation p-4 p-md-5" data-aos="fade-left" data-aos-duration="1200">
                <div class="heading-section ftco-animate mb-5">
                    <span class="subheading" data-aos="fade-up" data-aos-delay="200">This is our secrets</span>
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="400">Perfect Ingredients</h2>
                    <p data-aos="fade-up" data-aos-delay="600">
                        At Raka Restaurant, we believe every unforgettable dish begins with the right ingredients. That’s why we source only the freshest produce, finest spices, and premium-quality staples. Each element is carefully chosen to ensure authentic flavor, rich aroma, and the perfect balance in every bite.
                        <br><br>
                        It’s not just about cooking – it’s about honoring tradition while embracing quality. With the perfect ingredients, we create meals that don’t just satisfy hunger, but celebrate taste.
                    </p>
                    <p data-aos="fade-up" data-aos-delay="800">
                        <a href="#" class="btn btn-primary">Learn more</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(src/img/bg_4.jpg);"
    data-stellar-background-ratio="0.5">

    <div class="container">
      <div class="row d-md-flex align-items-center justify-content-center">
        <div class="col-lg-10">
          <div class="row d-md-flex align-items-center">

            <!-- Counter 1 -->
            <div class="col-md d-flex justify-content-center counter-wrap" data-aos="fade-up" data-aos-delay="100">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="100">0</strong>
                  <span>Tasty Dishes</span>
                </div>
              </div>
            </div>

            <!-- Counter 2 -->
            <div class="col-md d-flex justify-content-center counter-wrap" data-aos="fade-up" data-aos-delay="300">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="4000">0</strong>
                  <span>Dishes Served</span>
                </div>
              </div>
            </div>

            <!-- Counter 3 -->
            <div class="col-md d-flex justify-content-center counter-wrap" data-aos="fade-up" data-aos-delay="500">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="10">0</strong>
                  <span>Restaurants</span>
                </div>
              </div>
            </div>

            <!-- Counter 4 -->
            <div class="col-md d-flex justify-content-center counter-wrap" data-aos="fade-up" data-aos-delay="700">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="10000">0</strong>
                  <span>Happy Customers</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="book" style="background-color: rgb(252, 252, 252);">
    <div class="container py-5">
      <div class="row py-2">
        <div class="col-md-12 text-center">
          <h2 data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
            We Make Delicious &amp; Nutritious Food
          </h2>
          <a href="contact.php" class="btn btn-white btn-outline-white" data-aos="fade-up" data-aos-duration="1200"
            data-aos-delay="400">
            Book A Table Now
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <section class="ftco-section testimony-section" style="background-image: url(src/img/bg_5.jpg);">
    <div class="overlay"></div>
    <div class="container">

      <!-- Heading -->
      <div class="row justify-content-center mb-3 pb-2">
        <div class="col-md-7 text-center heading-section heading-section-white" data-aos="fade-down"
          data-aos-duration="1200">
          <span class="subheading" style="color: aqua;">Testimony</span>
          <h2 class="happy" style="color: rgb(252, 249, 249);">Happy Customer</h2>
        </div>
      </div>

      <!-- Carousel -->
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="carousel-testimony owl-carousel ftco-owl">

            <!-- Item 1 -->
            <div class="item" data-aos="fade-up" data-aos-delay="100">
              <div class="testimony-wrap text-center">
                <div class="text p-3">
                  <p class="txt" style="color: white;">“An unforgettable dining experience! The food was bursting with
                    flavor, and the staff made us feel so welcome. Raka is now our go-to spot for family dinners.”
                  </p>
                  <div class="user-img mb-4" style="background-image: url(src/img/person13)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                  </div>
                  <p class="name" style="color: white;">Anitha R.</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>

            <!-- Item 2 -->
            <div class="item" data-aos="fade-up" data-aos-delay="200">
              <div class="testimony-wrap text-center">
                <div class="text p-3">
                  <p class="txt" style="color: white;">“Absolutely delicious! Every dish tasted fresh and authentic. The
                    ambience is cozy and perfect for a relaxed evening. Highly recommend Raka to everyone.”
                  </p>
                  <div class="user-img mb-4" style="background-image: url(src/img/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                  </div>
                  <p class="name" style="color: white;">Karthik M.</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>

            <!-- Item 3 -->
            <div class="item" data-aos="fade-up" data-aos-delay="300">
              <div class="testimony-wrap text-center">
                <div class="text p-3">
                  <p class="txt" style="color: white;">“Five stars for both food and service! The team at Raka really
                    know how to make you feel at home. I loved the chef’s special—it was full of unique flavors.”
                  </p>
                  <div class="user-img mb-4" style="background-image: url(src/img/person11.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                  </div>
                  <p class="name" style="color: white;">Priya S.</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>

            <!-- Item 4 -->
            <div class="item" data-aos="fade-up" data-aos-delay="400">
              <div class="testimony-wrap text-center">
                <div class="text p-3">
                  <p class="txt" style="color: white;">“Best restaurant experience I’ve had in a long time. The
                    ingredients tasted so fresh, and every bite was a delight. Can’t wait to come back with friends.”
                  </p>
                  <div class="user-img mb-4" style="background-image: url(src/img/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                  </div>
                  <p class="name" style="color: white;">Rahul D.</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>

            <!-- Item 5 -->
            <div class="item" data-aos="fade-up" data-aos-delay="500">
              <div class="testimony-wrap text-center">
                <div class="text p-3">
                  <p class="txt" style="color: white;">“From starters to dessert, everything was perfect. The
                    presentation, taste, and service exceeded my expectations. Raka truly knows the secret to happy
                    customers!”</p>
                  <div class="user-img mb-4" style="background-image: url(src/img/person12.jpeg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                  </div>
                  <p class="name" style="color: white;"> Meera V.</p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
  </section>

  <!-- Footer Start -->
  <footer class="site-footer" style="background-color:  #1d1d1d;">
    <div class="container footer-grid">
      <div class="footer-about">
        <img src="src/img/logo.jpeg" alt="Raka Restaurant Logo" class="footer-logo">
        <p style="color: white;">Madurai's first live dining experience, serving authentic farm-to-table non-vegetarian cuisine.</p>
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
        <p style="color: white;"><i class="fas fa-map-marker-alt" style="color: white;"></i>Plot No: 64/5, Kancharampettai, Natham Road, Madurai</p>
        <p style="color: white;"><i class="fas fa-phone"></i> <a href="tel:+919876543210" class="contact-link">+91 98765 43210</a></p>
        <p style="color: white;"><i class="fas fa-envelope"></i> <a href="mailto:contact@rakarestaurant.com" class="contact-link">contact@rakarestaurant.com</a></p>
      </div>
      <div class="footer-social">
        <h4>Follow Us</h4>
        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/raka_restaurant_?igsh=YTQzZWlhdHM5YzEx"><i class="fab fa-instagram"></i></a>
        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="footer-bottom">
      <p style="color: white;">© 2025 Raka Restaurant, Madurai. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Counter JS -->
  <script>
    function animateCounters(section) {
      const counters = section.querySelectorAll('.number');
      const speed = 200; // lower = faster

      counters.forEach(counter => {
        counter.innerText = "0"; // reset every time
        const target = +counter.getAttribute('data-number');
        let count = 0;
        const increment = Math.ceil(target / speed);

        function updateCount() {
          if (count < target) {
            count += increment;
            counter.innerText = count > target ? target : count;
            requestAnimationFrame(updateCount);
          } else {
            counter.innerText = target; // stop at final
          }
        }
        updateCount();
      });
    }

    // Use IntersectionObserver to trigger on section visibility
    document.addEventListener("DOMContentLoaded", () => {
      const section = document.getElementById("section-counter");

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounters(section);
          }
        });
      }, {
        threshold: 0.5
      }); // trigger when 50% of section is visible

      observer.observe(section);
    });
  </script>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".carousel-testimony").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000, // 3 sec auto slide
        autoplayHoverPause: true,
        items: 1
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // find counters by either .counter or the old data-toggle attribute
      const candidateSelectors = ['.counter', '[data-toggle="counter-up"]'];
      const nodes = new Set();
      candidateSelectors.forEach(sel => document.querySelectorAll(sel).forEach(n => nodes.add(n)));
      const counters = Array.from(nodes);

      if (!counters.length) {
        console.warn('Counter: no elements found using selectors:', candidateSelectors.join(', '));
        return;
      }

      // utility: parse numeric target from attribute or text
      const toNumber = str => {
        if (str == null) return NaN;
        const cleaned = String(str).trim().replace(/,/g, '').replace(/[^\d.\-]/g, '');
        return cleaned === '' ? NaN : Number(cleaned);
      };

      // easing
      const easeOutCubic = t => 1 - Math.pow(1 - t, 3);

      // prepare each counter element
      counters.forEach(el => {
        // if user provided data-target use it, otherwise try the text content
        let target = toNumber(el.getAttribute('data-target') || el.dataset.target || el.textContent);
        if (Number.isNaN(target)) {
          console.warn('Counter: invalid target for element', el, '— please set data-target="NUMBER" or make element text a number.');
          target = 0;
        }
        el.dataset.target = String(target);

        // make sure visible text starts from 0 so animation is visible
        if (String(el.textContent).trim() !== '0') el.textContent = '0';

        // mark prepared
        el.dataset._counterPrepared = '1';
      });

      // animation routine
      function animate(el) {
        if (el.dataset._counterAnimated) return;
        const target = Number(el.dataset.target || 0);
        const duration = Number(el.dataset.duration) || 1500; // ms default
        let start = null;

        function step(timestamp) {
          if (!start) start = timestamp;
          const elapsed = timestamp - start;
          const progress = Math.min(elapsed / duration, 1);
          const eased = easeOutCubic(progress);
          const value = Math.floor(eased * target);
          el.textContent = value;
          if (progress < 1) {
            requestAnimationFrame(step);
          } else {
            el.textContent = String(target); // ensure exact final value
            el.dataset._counterAnimated = '1';
          }
        }
        requestAnimationFrame(step);
      }

      // Use IntersectionObserver if available
      if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              animate(entry.target);
              obs.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.2,
          rootMargin: '0px 0px -10% 0px'
        });

        counters.forEach(c => observer.observe(c));

        // Extra safety: if some counters are already fully visible on load, animate them
        counters.forEach(c => {
          const r = c.getBoundingClientRect();
          if (r.top < window.innerHeight && r.bottom > 0) {
            // already visible — animate immediately (and unobserve to avoid double)
            animate(c);
            try {
              observer.unobserve(c);
            } catch (e) {}
          }
        });
      } else {
        // fallback: on scroll, check visibility manually
        const onScroll = () => {
          counters.forEach(c => {
            if (c.dataset._counterAnimated) return;
            const r = c.getBoundingClientRect();
            if (r.top < window.innerHeight * 0.9 && r.bottom > 0) {
              animate(c);
            }
          });
          if (counters.every(x => x.dataset._counterAnimated)) window.removeEventListener('scroll', onScroll);
        };
        window.addEventListener('scroll', onScroll, {
          passive: true
        });
        onScroll(); // run once immediately
      }
    });

    const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        });
  </script>
  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>