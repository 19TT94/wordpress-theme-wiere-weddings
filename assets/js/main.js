// Toggle menu functionality - works on all screen sizes
document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('menu');
  
  if (menuToggle && menu) {
    menuToggle.addEventListener('click', function() {
      menu.classList.toggle('show');
    });
  }
  
  // Close menu when clicking outside
  document.addEventListener('click', function(e) {
    if (!menuToggle.contains(e.target) && !menu.contains(e.target)) {
      menu.classList.remove('show');
    }
  });
  
  // Ensure sticky positioning works
  const stickyWrapper = document.querySelector('.sticky-wrapper');
  if (stickyWrapper) {
    // Force a reflow to ensure sticky positioning is applied
    stickyWrapper.style.position = 'sticky';
  }
});
