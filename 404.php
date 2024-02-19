<!DOCTYPE html>
<html lang="en">
  <?php
    /**
     * The template for displaying 404 pages (not found)
     *
     * @package WordPress
     */
    get_header()
  ?>
  <body>
    <div id="site-wrapper">

    <?php get_template_part("template-parts/nav-bar"); ?>


    <section class="not-found">
      <h1 class="page-title">404 Page not found.</h1>
      <a class="not-found-button" href="/">Return Home</a>
	  </section><!-- .page-header -->

    <?php get_footer(); ?>

  </body>
  
  <!-- Footer -->
  <?php
    wp_footer();
  ?>
</html>
