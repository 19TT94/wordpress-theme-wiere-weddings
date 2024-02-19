<?php
  $testimonials = [];
  if (have_posts()) {
    $args = array(
      "post_type" => "testimonial",
      "numberposts" => 20
    );

    $posts = get_posts($args);
    if (!empty($posts)) {
      foreach ($posts as $post) {
        array_push($testimonials, get_the_excerpt());
      }
    }
  }
  wp_reset_postdata(); // reset the loop
?>

<script>
  const preloadedTestimonials = <?php echo json_encode($testimonials) ?>;
</script>

<testimonials
  class="testimonials"
  :slides="preloadedTestimonials"
  inline-template
>
  <section :class="{'loading': !setupFinished}">
    <ul class="slider">
      <li
        v-for="(item, index) in slides"
        class="slide"
        :class="{active: currentIndex === index}"
        :key="`x-${index}`"
        >
        <div class="content">
          <p>
            <span class="quote left">"</span>
            {{item}}
            <span class="quote right">"</span>
          </p>
        </div>
      </li>
    </ul>
  </section>
</testimonials>