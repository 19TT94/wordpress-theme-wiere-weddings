<div class="about">
  <div class="about-image">
    <?php if (get_theme_mod("about-image")): ?>
      <img src="<?php echo get_theme_mod("about-image") ?>" alt="about image">
    <?php endif ?>
  </div>
  <div class="about-text">
    <h2><?php the_title() ?></h2>
    <?php if (get_theme_mod("about-text")): ?>
      <p><?php echo get_theme_mod("about-text") ?></p>
    <?php endif ?>
  </div>
</div>