<!DOCTYPE html>
<html lang="en">
  <?php
    get_header()
  ?>
  <body>
    <div id="site-wrapper">
      <!-- Template Parts -->
      <?php get_template_part("template-parts/nav-bar"); ?>
      
      <div class="page">
        <!-- Custom Content -->
        <?php while (have_posts()) : the_post(); ?>
          <div class="page-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        <?php
          endwhile; // resetting the page loop
          wp_reset_query(); // resetting the page query
        ?>
      </div>

      <?php get_footer(); ?>
    </div>
  </body>
  
  <!-- Footer -->
  <?php
    wp_footer();
  ?>
</html>