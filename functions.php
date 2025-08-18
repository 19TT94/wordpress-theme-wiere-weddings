<?php

/**
 * Word Press Config
 * 
 * replace template with theme name
 */

  // Auto-detect environment based on domain or server variables
  function detect_environment() {
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $server_name = $_SERVER['SERVER_NAME'] ?? '';
    
    // Local development
    if (strpos($host, 'localhost') !== false || 
      strpos($host, '.local') !== false || 
      strpos($host, '127.0.0.1') !== false ||
      strpos($server_name, 'localhost') !== false) {
      return 'development';
    }

    // Production
    return 'production';
  }

  // Define environment-based variables
  $environment = detect_environment();

  define('ENVIRONMENT', $environment);
  define('SITE_URI', $environment === 'production' 
      ? 'https://wiere-weddings.com' 
      : 'http://localhost:3000');

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

  /************/
  /* CSS & JS */
  /************/

  // Theme
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
    // remove_menu_page('index.php');               // Dashboard
    remove_menu_page('edit.php?post_type=page');    // Pages
    remove_menu_page('edit.php');                   // Posts
    remove_menu_page('edit-comments.php');          // Comments
    // remove_menu_page('themes.php');              // Appearance
    remove_menu_page('plugins.php');                // Plugins
    // remove_menu_page('users.php');               // Users
    // remove_menu_page('tools.php');               // Tools
    remove_menu_page('options-general.php');        // Settings
  }

  add_action('admin_menu', 'my_remove_menu_pages');

  // Theme Nav Customization
  function disable_code_edit_action() {
    define("DISALLOW_FILE_EDIT", TRUE);
  }

  add_action('init','disable_code_edit_action');

  function remove_customizer_settings( $wp_customize ){
    $wp_customize->remove_panel("nav_menus");
    $wp_customize->remove_section("custom_css");
  }

  add_action( 'customize_register', 'remove_customizer_settings', 20 );

  // Custom Post Type -> SLIDER
  function slider() {    
    $args = array(
      "labels" => array(
        "name" => "Home Slides"
      ),
      "menu_icon" => "dashicons-images-alt2",
      "public" => true,
      "show_in_rest" => true,
      "has_archive" => true,
      "supports" => array("title", "thumbnail"),
      "publicly_queryable" => false
    );

    register_post_type("slide", $args);
  }

  add_action("init", "slider");

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
 
  // Custom Post Type -> HOME PAGE CONTENT
  function home_content() {    
    $args = array(
      "labels" => array(
        "name" => "Home Content"
      ),
      "menu_icon" => "dashicons-admin-comments",
      "public" => true,
      "show_in_rest" => true,
      "has_archive" => true,
      "supports" => array("title"),
      "publicly_queryable" => false
    );

    register_post_type("home_content", $args);
  }

  add_action("init", "home_content");

  function wporg_custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_wporg_meta_key', true );
    ?>
    <label for="wporg_field">Type</label>
    <br />
    <select name="wporg_field" id="wporg_field" class="postbox">
      <option value="">Select...</option>
      <option value="text" <?php selected( $value, 'text' ); ?>>Text Centered</option>
      <option value="callout" <?php selected( $value, 'callout' ); ?>>Callout</option>
      <option value="block-left" <?php selected( $value, 'block-left' ); ?>>Block Left</option>
      <option value="block-right" <?php selected( $value, 'block-right' ); ?>>Block Right</option>
    </select>
    <?php
  }

  function wporg_add_custom_box() {
    $screens = [ 'home_content' ];
    foreach ( $screens as $screen ) {
      add_meta_box(
        'wporg_box_id', // Unique ID
        'Content', // Box title
        'wporg_custom_box_html',  // Content callback, must be of type callable
        $screen // Post type
      );
    }
  }

  add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

  function wporg_save_postdata( $post_id ) {
    if ( array_key_exists( 'wporg_field', $_POST ) ) {
      update_post_meta(
        $post_id,
        '_wporg_meta_key',
        $_POST['wporg_field']
      );
    }
  }

  add_action( 'save_post', 'wporg_save_postdata' );

  // Custom Post Type -> TESTIMONIALS
  function testimonial() {    
    $args = array(
      "labels" => array(
        "name" => "Testimonials"
      ),
      'menu_icon' => 'dashicons-admin-comments',
      'public' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => array('title', 'excerpt'),
      'publicly_queryable' => false,
      'menu_position' => 9
    );

    register_post_type("testimonial", $args);
  }

  add_action("init", "testimonial");
  
?>