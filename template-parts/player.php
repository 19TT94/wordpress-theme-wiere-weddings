<player inline-template>
  <?php if (get_theme_mod("fullscreen-video")): ?>
    <video id="player" autoplay muted loop>
      <source src="<?php echo wp_get_attachment_url(get_theme_mod("fullscreen-video")) ?>" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
  <?php endif ?>
</player>