// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
  const mobileToggle = document.getElementById('mobile-menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  
  if (mobileToggle && mobileMenu) {
    mobileToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('show');
    });
  }
  
  // Close menu when clicking outside
  document.addEventListener('click', function(e) {
    if (!mobileToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
      mobileMenu.classList.remove('show');
    }
  });
  
  // Ensure sticky positioning works
  const stickyWrapper = document.querySelector('.sticky-wrapper');
  if (stickyWrapper) {
    // Force a reflow to ensure sticky positioning is applied
    stickyWrapper.style.position = 'sticky';
  }
});
