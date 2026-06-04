import "./bootstrap";

// Navbar scroll effect
const navbar = document.getElementById("mainNav");
if (navbar) {
    window.addEventListener("scroll", () => {
        navbar.classList.toggle("scrolled", window.scrollY > 50);
    });
}

// Mobile menu toggle
const toggle = document.getElementById("mobileToggle");
const menu = document.getElementById("mobileMenu");
if (toggle && menu) {
    toggle.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
}

// Scroll reveal
const observerOptions = { threshold: 0.1, rootMargin: "0px 0px -50px 0px" };
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

document.querySelectorAll(".service-card, .project-card").forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(20px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    observer.observe(el);
});
