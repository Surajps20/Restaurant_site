document.addEventListener('DOMContentLoaded', function () {

    // --- SCROLL TO TOP ON REFRESH ---
    // Ensures the page always loads at the very top.
    window.scrollTo(0, 0);

    // --- NAVBAR & HAMBURGER MENU ---
    const navbar = document.querySelector('.navbar');
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    // Change navbar background on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Toggle hamburger menu and update accessibility attribute
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');

        const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
        hamburger.setAttribute('aria-expanded', !isExpanded);
    });

    // Close hamburger menu when a link is clicked
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            hamburger.setAttribute('aria-expanded','false');
        });
    });

    // --- ACTIVE LINK HIGHLIGHTING ON SCROLL ---
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-menu a');

    const observerOptions = {
        rootMargin: '-50% 0px -50% 0px',
        threshold: 0
    };

    const sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                navLinks.forEach(link => {
                    link.classList.remove('active-link');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('active-link');
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        sectionObserver.observe(section);
    });

    // --- ON-SCROLL FADE-IN ANIMATION ---
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(element => {
        revealObserver.observe(element);
    });
    // --- AJAX CONTACT FORM SUBMISSION ---
    const contactForm = document.getElementById('contactForm');
    const formStatus = document.getElementById('form-status');

    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(contactForm);
            formStatus.innerHTML = '<p>Sending...</p>';
            formStatus.className = '';

            fetch('process_form.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // --- THIS IS THE UPDATED PART ---

                        // 1. Display the success message from the server
                        formStatus.innerHTML = `<p class="success">${data.message}</p>`;
                        contactForm.reset();

                        // 2. Wait for 3 seconds (3000 milliseconds) then refresh the page
                        setTimeout(() => {
                            location.reload();
                        }, 3000);

                    } else {
                        // Display the error message if something went wrong
                        formStatus.innerHTML = `<p class="error">${data.message}</p>`;
                    }
                })
                .catch(error => {
                    formStatus.innerHTML = `<p class="error">An unexpected error occurred. Please check your connection.</p>`;
                    console.error('Error:', error);
                });
        });
    }
});


function openPopup(menuKey) {
    const panel = document.getElementById("food-list-panel");
    const title = document.getElementById("panel-title");
    const list = document.getElementById("panel-list");

    title.textContent = "Loading...";
    list.innerHTML = ""; 
    panel.style.display = "flex";

    fetch(`get_menu_items.php?category=${menuKey}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                title.textContent = "Error";
                list.innerHTML = `<p>${data.error}</p>`;
                return;
            }

            title.textContent = data.title;
            list.innerHTML = "";

            if (data.dishes.length > 0) {
                 data.dishes.forEach(dish => {
                    const div = document.createElement("div");
                    div.className = "dish-item";
                    div.innerHTML = `
                      <img src="${dish.img}" alt="${dish.name}">
                      <div class="dish-info">
                        <span>${dish.name}</span>
                        
                        <span>₹${parseFloat(dish.price).toFixed(2)}</span>

                      </div>
                    `;
                    list.appendChild(div);
                });
            } else {
                list.innerHTML = "<p>No dishes found for this category.</p>";
            }
        })
        .catch(error => {
            console.error('Error fetching menu items:', error);
            title.textContent = "Failed to load";
            list.innerHTML = "<p>Could not retrieve menu items. Please try again later.</p>";
        });
}

function closePanel(event) {
    if (event.target.classList.contains('panel-overlay') || event.target.classList.contains('panel-close')) {
        document.getElementById("food-list-panel").style.display = "none";
    }
}
const track = document.querySelector('.gallery-track');
const slider = document.querySelector('.gallery-slider');

slider.addEventListener('mouseenter', () => {
    track.style.animationPlayState = 'paused';
});
slider.addEventListener('mouseleave', () => {
    track.style.animationPlayState = 'running';
});
AOS.init({
    duration: 1200,
    once: false,
    offset: 100,
});
