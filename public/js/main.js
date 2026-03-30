/* ============================================
   S K Document Centre - Main JavaScript
   ============================================ */

document.addEventListener('DOMContentLoaded', function () {

    // ---- AOS Init ----
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 700,
            once: true,
            easing: 'ease-out-cubic',
            offset: 60
        });
    }

    // ---- Navbar Scroll Effect ----
    const navbar = document.getElementById('mainNav');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 60) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // ---- Back To Top Button ----
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ---- Counter Up ----
    if (typeof jQuery !== 'undefined' && typeof jQuery.fn.counterUp !== 'undefined') {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    } else {
        // Vanilla JS counter fallback
        const counters = document.querySelectorAll('.counter');
        if (counters.length > 0) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(function (counter) {
                observer.observe(counter);
            });
        }
    }

    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-target') || el.innerText.replace(/[^0-9]/g, ''));
        const duration = 1800;
        const step = target / (duration / 16);
        let current = 0;
        const timer = setInterval(function () {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            el.innerText = Math.floor(current).toLocaleString();
        }, 16);
    }

    // ---- Smooth scroll for anchor links ----
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                // Close mobile menu
                const navCollapse = document.getElementById('navbarNav');
                if (navCollapse && navCollapse.classList.contains('show')) {
                    const toggler = document.querySelector('.navbar-toggler');
                    if (toggler) toggler.click();
                }
            }
        });
    });

    // ---- Close mobile menu on link click ----
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)');
    navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            const navCollapse = document.getElementById('navbarNav');
            if (navCollapse && navCollapse.classList.contains('show')) {
                const toggler = document.querySelector('.navbar-toggler');
                if (toggler) toggler.click();
            }
        });
    });

    // ---- Contact Form Submission ----
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const btn = contactForm.querySelector('[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Sending...';
            btn.disabled = true;

            // Simulate async (replace with actual fetch/axios call)
            setTimeout(function () {
                btn.innerHTML = '<i class="fas fa-check me-2"></i> Message Sent!';
                btn.classList.remove('btn-gold');
                btn.classList.add('btn-success');

                setTimeout(function () {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.classList.add('btn-gold');
                    btn.classList.remove('btn-success');
                    contactForm.reset();
                }, 3500);
            }, 1500);
        });
    }

    // ---- Dropdown hover on desktop ----
    if (window.innerWidth >= 992) {
        document.querySelectorAll('.navbar .dropdown').forEach(function (dropdown) {
            dropdown.addEventListener('mouseenter', function () {
                this.querySelector('.dropdown-menu').classList.add('show');
                this.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'true');
            });
            dropdown.addEventListener('mouseleave', function () {
                this.querySelector('.dropdown-menu').classList.remove('show');
                this.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
            });
        });
    }

});
