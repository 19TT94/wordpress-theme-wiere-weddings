<!-- Footer -->
<footer>
  <div class="contact">
    <ul class="contact-section left">
      <?php if (get_theme_mod("address-line-1")): ?>
        <li>
            <p><?php echo get_theme_mod("address-line-1") ?></p>
        </li>
      <?php endif; ?>
      <?php if (get_theme_mod("address-line-2")): ?>
        <li>
          <p><?php echo get_theme_mod("address-line-2") ?></p>
        </li>
      <?php endif; ?>
      <li class="address">
        <p>
          <?php if (get_theme_mod("city")): ?>
            <?php echo get_theme_mod("city") ?>,&nbsp;
          <?php endif; ?>
          <?php if (get_theme_mod("state")): ?>
            <?php echo get_theme_mod("state") ?>&nbsp;
          <?php endif; ?>
          <?php if (get_theme_mod("zip")): ?>
            <?php echo get_theme_mod("zip") ?>
          <?php endif; ?>
        </p>
      </li>
      <?php if (get_theme_mod("phone")): ?>
        <li>
            <p>Mobile:&nbsp;<?php echo get_theme_mod("phone") ?></p>
        </li>
      <?php endif; ?>
      <?php if (get_theme_mod("license")): ?>
        <li>
            <p>DRE&nbsp;#:&nbsp;<?php echo get_theme_mod("license") ?></p>
        </li>
      <?php endif; ?>
    </ul>
    <ul class="contact-section center">
      <li>
        <?php
          if (function_exists("the_custom_logo")) {
            $custom_logo_id = get_theme_mod("custom_logo");
            $logo = wp_get_attachment_image_src($custom_logo_id, "full", false);
          } 
        ?>
        <div class="logo">
          <img src="<?= $logo > 0 ? $logo[0] : "http://placehold.it/50x50" ?>" />
          <?php if (get_theme_mod("site_title")): ?>
            <p class="descriptor"><?php echo get_theme_mod("site_title") ?></p>
          <?php endif; ?>
        </div>
      </li>
      <li>
        <?php if (get_theme_mod("name")): ?>
          <p><?php echo get_theme_mod("name") ?></p>
        <?php endif; ?>
      </li>
      <li>
        <?php if (get_theme_mod("email")): ?>
          <p><?php echo get_theme_mod("email") ?></p>
        <?php endif; ?>
      </li>
    </ul>
    <ul class="contact-section right">
      <li>
        <?php if (get_theme_mod("instagram")): ?>
          <a href="<?php echo get_theme_mod("instagram") ?>" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
        <?php endif; ?>
      </li>
      <li>
        <?php if (get_theme_mod("facebook")): ?>
          <a href="<?php echo get_theme_mod("facebook") ?>" target="_blank">
            <i class="fab fa-facebook"></i>
          </a>
        <?php endif; ?>
      </li>
      <li>
        <?php if (get_theme_mod("linkedin")): ?>
          <a href="<?php echo get_theme_mod("linkedin") ?>" target="_blank">
            <i class="fab fa-linkedin"></i>
          </a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
  <div class="copy">
    <?php if (get_theme_mod("copy")): ?>
      <p><?php echo get_theme_mod("copy") ?></p>
    <?php else: ?>
      <p>© 2023 Wiere Weddings</p>
    <?php endif; ?>
  </div>
</footer>