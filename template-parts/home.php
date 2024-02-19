<Home inline-template>
  <?php if (is_admin_bar_showing()): ?>
    <div class="home admin-showing">
  <?php else: ?>
    <div class="home">
  <?php endif ?>
    
    <?php get_template_part("template-parts/callout"); ?>

  </div>
</Home>
