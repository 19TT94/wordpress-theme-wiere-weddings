<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Wiere Weddings">
  <meta name="author" content="Taylor Tobin">
  <!-- Resources -->
  
  <?php
    wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Sticky Navigation Wrapper -->
<div class="sticky-wrapper">
  <!-- Navigation Bar -->
  <nav class="menu" id="main-navigation">
    <ul class="menu-links">
      <li class="menu-links-link">
        <a href="<?php echo SITE_URI . '/about'; ?>">About</a>
      </li>
      <li class="menu-links-link">
        <a href="<?php echo SITE_URI . '/services'; ?>">Services</a>
      </li>
    </ul>
    
    <div class="menu-logo">
      <a href="<?php echo SITE_URI; ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wiere-weddings-black.png" alt="Wiere Weddings" />
      </a>
    </div>
    
    <ul class="menu-links">
      <li class="menu-links-link">
        <a href="<?php echo SITE_URI . '/contact'; ?>">Contact</a>
      </li>
      <li class="menu-links-link">
        <a href="<?php echo SITE_URI . '/schedule'; ?>" class="schedule">Book Consultation</a>
      </li>
    </ul>
    
    <button type="button" class="menu-switch" id="mobile-menu-toggle">
      <i class="fas fa-bars"></i>
    </button>
  </nav>
</div>

<div class="menu-mobile-content" id="mobile-menu">
  <ul class="menu-mobile-content-links">
    <li class="menu-links-link">
      <a href="<?php echo SITE_URI . '/about'; ?>">About</a>
    </li>
    <li class="menu-links-link">
      <a href="<?php echo SITE_URI . '/services'; ?>">Services</a>
    </li>
    <li class="menu-links-link">
      <a href="<?php echo SITE_URI . '/contact'; ?>">Contact</a>
    </li>
    <li class="menu-links-link">
      <a href="<?php echo SITE_URI . '/schedule'; ?>">Book Consultation</a>
    </li>
  </ul>
  <ul class="social">
    <li>
      <a href="https://www.instagram.com/wiereweddings/">
        <i class="fab fa-instagram"></i>
      </a>
    </li>
    <li>
      <a href="https://www.theknot.com/marketplace/wiere-weddings-pismo-beach-ca-2067652">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wiere-weddings-black.png" class="theknot" />
      </a>
    </li>
  </ul>
</div>