document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(function(navLink) {
      navLink.addEventListener('click', function() {
        navLinks.forEach(function(navLink) {
          navLink.classList.remove('active');
        });
        navLink.classList.add('active');
      });
    });
  });
