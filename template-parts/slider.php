<?php
  $slides = [];
  if (have_posts()) {
    $args = array(
      "post_type" => "slide",
      "numberposts" => 10
    );

    $posts = get_posts($args);
    if (!empty($posts)) {
      foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
          $thumbnail = get_the_post_thumbnail_url($post->ID);
          array_push($slides, htmlentities($thumbnail, ENT_QUOTES));
        }      
      }
    }
  }
  wp_reset_postdata(); // reset the loop
?>

<script>
  const preloadedSlides = <?php echo json_encode($slides) ?>;
</script>

<slider
  class="featured-slider"
  :slides="preloadedSlides"
  inline-template
>
  <section :class="{'loading': !setupFinished}">
    <ul class="slider">
      <li class="slide"
        v-for="(item, index) in slides"
        :class="[item.name, {active: currentIndex === index}]"
        :key="`x-${index}`"
        >
        <div class="content">
          <div class="image" :style="{ 'background-image': 'url(' + item + ')' }"></div>
        </div>
      </li>
    </ul>

    <div class="pagination" v-if="dots">
      <ul class="item-list">
        <li class="item"
          v-for="(item, index) in slides"
          :class="[item.slug, {active: currentIndex === index}]"
          :key="`y-${index}`"
          >
          <button @click="setItem(index)"></button>
        </li>
      </ul>
    </div>
  </section>
</slider>