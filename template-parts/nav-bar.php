<navigation inline-template>
  <div class="sticky-wrapper">
    <nav class="menu" :class="{ background: belowTop || showMenu }">
    
      <ul class="menu-links" :class="{ hide: mobile }">
        <li class="menu-links-link">
          <a href="/about">About</a>
        </li>
        <li class="menu-links-link">
          <a href="/services">Services</a>
        </li>
      </ul>

      <div class="menu-logo">
        <a href="/">
          <?php
            if (function_exists("the_custom_logo")) {
              $custom_logo_id = get_theme_mod("custom_logo");
              $logo = wp_get_attachment_image_src($custom_logo_id, "full", false);
            } 
          ?>
            <img src="<?= $logo > 0 ? $logo[0] : "http://placehold.it/50x50" ?>" />
          <!-- <?php /* if (get_theme_mod("site_title")): */?> -->
            <!-- <p class="descriptor"><?php /*echo get_theme_mod("site_title")*/ ?></p> -->
          <!-- <?php /*endif;*/ ?> -->
        </a>
      </div>

      <ul class="menu-links" :class="{ hide: mobile }">
        <li class="menu-links-link">
          <a href="/contact">Contact</a>
        </li>
        <li class="menu-links-link">
          <a href="/schedule" class="schedule">Book Consultation</router-link>
        </li>
      </ul>

      <button
          type="button"
          class="menu-switch"
          v-if="mobile"
          @click="() => (showMenu = !showMenu)">
        <div class="bar" :class="{ 'rotate': open }"></div>
        <div class="bar" :class="{hide: open}"></div>
        <div class="bar" :class="{ 'rotate': open }"></div>
      </button>
    </nav>
    <div class="main-menu" :class="{reveal: open }">
    <ul class="menu-mobile-content-links">
      <li class="menu-links-link">
        <router-link to="/about">About</router-link>
      </li>
      <li class="menu-links-link">
        <router-link to="/services">Services</router-link>
      </li>
      <li class="menu-links-link">
        <router-link to="/contact">Contact</router-link>
      </li>
      <li class="menu-links-link">
        <router-link to="/schedule" class="calendar">
          Book Consultation
        </router-link>
      </li>
    </ul>
    <ul class="social">
      <li>
        <a href="https://www.instagram.com/wiereweddings/">
          <FontAwesomeIcon :icon="['fa-brands', 'instagram']" />
        </a>
      </li>
      <li>
        <a
          href="https://www.theknot.com/marketplace/wiere-weddings-pismo-beach-ca-2067652"
        >
          <img src="@/assets/images/theknot.png" class="theknot" />
        </a>
      </li>
      <?php if (get_theme_mod("instagram")): ?>
        <a href="<?php echo get_theme_mod("instagram") ?>" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
      <?php endif; ?>
      <?php if (get_theme_mod("facebook")): ?>
        <a href="<?php echo get_theme_mod("facebook") ?>" target="_blank">
          <i class="fab fa-facebook"></i>
        </a>
      <?php endif; ?>
      <?php if (get_theme_mod("linkedin")): ?>
        <a href="<?php echo get_theme_mod("linkedin") ?>" target="_blank">
          <i class="fab fa-linkedin"></i>
        </a>
      <?php endif; ?>
    </ul>
    <?php
      wp_nav_menu(
        array(
          "menu" => "primary",
          "container" => "",
          "theme_location" => "primary",
          "items_wrap" => '<ul class="main-menu-items">%3$s</ul>'
        )
      )
    ?>
    <?php if (get_theme_mod("phone")): ?>
      <a class="phone item" href="tel:<?php echo get_theme_mod("phone") ?>">
        <i class="fa fa-phone"></i>
        <?php echo get_theme_mod("phone") ?>
      </a>
    <?php endif; ?>
    <?php if (get_theme_mod("email")): ?>
      <a class="item email" href="mailto:<?php echo get_theme_mod("email") ?>">
        <i class="fa fa-envelope"></i>
        <?php echo get_theme_mod("email") ?>
      </a>
    <?php endif; ?>
  </div>
</navigation>