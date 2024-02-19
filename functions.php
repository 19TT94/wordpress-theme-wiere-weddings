<?php
  /**
   * Word Press Config
   * 
   * replace template with theme name
   */

  // Settings
  require get_stylesheet_directory() . "/inc/customizer.php";
  new Customizer();

  // Adds dynamic title tag support
  function template_theme_support() {
    add_theme_support("title-tag");
    add_theme_support("custom-logo");
    add_theme_support("post-thumbnails");
  }

  add_action("after_setup_theme", "template_theme_support");

  function register_style() {
    // declared in style.css comments
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style("template-style", get_template_directory_uri() . "/style.css", array(), $version, "all");
    wp_enqueue_style("template-sass", get_template_directory_uri() . "/dist/main.css", array(), $version, "all");
  }

  function add_type_attribute($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( "main" !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
  }

  function register_scripts() {
    wp_enqueue_script("vue", "https://cdn.jsdelivr.net/npm/vue@3", null, null, true);
    wp_enqueue_script("main", get_template_directory_uri() . "/assets/js/main.ts", "main", null, true);
    add_filter("script_loader_tag", "add_type_attribute" , 10, 3);
  }

  add_action( "wp_enqueue_scripts", function() {
    register_style();
    register_scripts();
  });

  // Disable Posts  
  function my_remove_menu_pages() {
      remove_menu_page("edit.php");
      remove_menu_page("edit-comments.php");  
  }

  add_action( "admin_menu", "my_remove_menu_pages" );

  // Menu
  function template_menus() {
    $locations = array(
      "primary" => "Primary Menu Bar"
    );

    register_nav_menus($locations);
  }

  add_action("init", "template_menus");

  // Custom Post Types
  function slider() {    
    $args = array(
      "labels" => array(
        "name" => "Home Slides"
      ),
      "menu_icon" => "dashicons-images-alt2",
      "public" => true,
      'show_in_rest' => true,
      "has_archive" => true,
      "supports" => array("title", "thumbnail"),
      "publicly_queryable" => false
    );

    register_post_type("slide", $args);
  }

  add_action("init", "slider");

  function testimonial() {    
    $args = array(
      "labels" => array(
        "name" => "Testimonials"
      ),
      "menu_icon" => "dashicons-admin-comments",
      "public" => true,
      "has_archive" => true,
      "supports" => array("title", "excerpt"),
      "publicly_queryable" => false
    );

    register_post_type("testimonial", $args);
  }

  add_action("init", "testimonial");
  
  function get_rest_featured_image( $object, $field_name, $request ) {
      if( $object['featured_media'] ) {
          $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
          return $img[0];
      }
      return false;
  }

  function register_rest_images(){
      register_rest_field(array('slide'),
          'featured_media_link',
          array(
              'get_callback'    => 'get_rest_featured_image',
              'update_callback' => null,
              'schema'          => null,
          )
      );
  }

  add_action('rest_api_init', 'register_rest_images' );
?>