<!DOCTYPE html>
<html lang="en">
  <?php
    get_header()
  ?>
  <body>
    <div id="site-wrapper">

      <?php get_template_part("template-parts/nav-bar"); ?>
      
      <?php get_template_part("template-parts/home"); ?>

      <!-- Custom Content -->
      <div class="custom-content">
        <?php the_content(); ?>
      </div>
      <!-- End Custom Content -->

    </div>

    <?php get_footer(); ?>

  </body>
  
  <!-- Footer -->
  <?php
    wp_footer();
  ?>
</html>