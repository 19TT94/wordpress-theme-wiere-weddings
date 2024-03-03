<!DOCTYPE html>
<html lang="en">
  <?php
    get_header()
  ?>
  <body>
    <div id="site-wrapper">
      
      <?php get_template_part("template-parts/home"); ?>

    </div>

    <?php get_footer(); ?>

  </body>
  
  <!-- Footer -->
  <?php
    wp_footer();
  ?>
</html>