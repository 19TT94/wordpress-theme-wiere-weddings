<?php
  /**
   * Word Press Config
   * 
   * replace template with theme name
   */

  // Settings
  require get_stylesheet_directory() . '/inc/customizer.php';
  new Customizer();

  // Adds dynamic title tag support
  function template_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
  }

  add_action('after_setup_theme', 'template_theme_support');

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
    define('DISALLOW_FILE_EDIT', TRUE);
  }

  add_action('init','disable_code_edit_action');

  function remove_customizer_settings( $wp_customize ){
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_section('custom_css');
  }

  add_action('customize_register', 'remove_customizer_settings', 20);

  /************/
  /* CSS & JS */
  /************/

  // Theme
  function register_style() {
    // declared in style.css comments
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('template-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_style('template-sass', get_template_directory_uri() . '/dist/main.css', array(), $version, 'all');
  }

  function add_type_attribute_to_main($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( 'main' !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
  }

  function register_scripts() {
    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2', null, null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/dist/main.js', 'main', null, true);
    add_filter('script_loader_tag', 'add_type_attribute_to_main' , 10, 3);
  }

  add_action('wp_enqueue_scripts', function() {
    register_style();
    register_scripts();
  });

  // Admin
  function register_admin_style() {
    // declared in style.css comments
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('template-sass', get_template_directory_uri() . '/dist/admin.css', array(), $version, 'all');
  }

  function register_admin_scripts() {
    wp_enqueue_script('admin-js', get_template_directory_uri() . '/dist/admin.js', array('jquery'), null, true);
  }

  add_action('admin_enqueue_scripts', function() {
    register_admin_style();
    register_admin_scripts();
  });

  /**************/
  /* Post Types */
  /**************/

  // Custom Post Type -> SLIDER
  function slider() {    
    $args = array(
      'labels' => array(
        'name' => 'Home Slides'
      ),
      'menu_icon' => 'dashicons-images-alt2',
      'public' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => array('title', 'thumbnail'),
      'publicly_queryable' => false
    );

    register_post_type('slide', $args);
  }

  add_action('init', 'slider');

  // Add Featured Image (Slide) as API Endpoint
  function get_rest_featured_image( $object, $field_name, $request ) {
    if ( $object['featured_media'] ) {
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
  }

  function register_rest_images() {
    register_rest_field(array('slide'),
        'featured_media_link',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
  }

  add_action('rest_api_init', 'register_rest_images');

  // Custom Post Type -> HOME PAGE CONTENT
  function home_content() {    
    $args = array(
      'labels' => array(
        'name' => 'Home Content'
      ),
      'menu_icon' => 'dashicons-admin-comments',
      'public' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => array('title', 'thumbnail'),
      'publicly_queryable' => false
    );

    register_post_type('home_content', $args);
  }

  add_action('init', 'home_content');

  

  // Custom Post Type -> ABOUT
  function about() {    
    $args = array(
      'labels' => array(
        'name' => 'About Content'
      ),
      'menu_icon' => 'dashicons-admin-comments',
      'public' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => array('title', 'thumbnail'),
      'publicly_queryable' => false
    );

    register_post_type('about', $args);
  }

  add_action('init', 'about');


  // Custom Post Type -> SERVICES
  function services() {    
    $args = array(
      'labels' => array(
        'name' => 'Services Content'
      ),
      'menu_icon' => 'dashicons-admin-comments',
      'public' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => array('title', 'thumbnail'),
      'publicly_queryable' => false
    );

    register_post_type('services', $args);
  }

  add_action('init', 'services');

  // Add to Api
  function register_custom_posts() {
    register_rest_field(array('home_content', 'about', 'services'),
        'meta',
        array(
            'get_callback'    => 'get_meta',
            'update_callback' => null,
            'schema'          => null,
        )
    );
  }

  add_action('rest_api_init', 'register_custom_posts');

  // Add Meta box to above post types
  function ww_custom_box_html( $post ) {
    get_template_part('template-parts/inputPost');
  }

  function ww_save_postdata( $post_id ) {
    if ( array_key_exists( 'hc_field_type', $_POST ) ) {
      update_post_meta(
        $post_id,
        'meta_type_key',
        $_POST['hc_field_type']
      );
    }

    if ( array_key_exists( 'hc_field_paragraph', $_POST ) ) {
      update_post_meta(
        $post_id,
        'meta_paragraph_key',
        $_POST['hc_field_paragraph']
      );
    }

    if ( array_key_exists( 'hc_field_list_items', $_POST ) ) {
      update_post_meta(
        $post_id,
        'meta_list_key',
        $_POST['hc_field_list_items']
      );
    }
  }

  add_action( 'save_post', 'ww_save_postdata' );

  function get_meta( $data ) {
    return get_post_meta( $data['id'], '', '' );
  }

  function ww_add_custom_box() {
    $screens = [ 'home_content', 'about', 'services' ];
    foreach ( $screens as $screen ) {
      add_meta_box(
        'ww_field_type', // Unique ID
        'Content', // Box title
        'ww_custom_box_html',  // Content callback, must be of type callable
        $screen // Post type
      );
    }
  }

  add_action( 'add_meta_boxes', 'ww_add_custom_box' );


  // TODO: figure out where testimonials fit in


  // Custom Post Type -> TESTIMONIALS
  function testimonial() {    
    $args = array(
      'labels' => array(
        'name' => 'Testimonials'
      ),
      'menu_icon' => 'dashicons-admin-comments',
      'public' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => array('title', 'excerpt'),
      'publicly_queryable' => false
    );

    register_post_type('testimonial', $args);
  }

  add_action('init', 'testimonial');
  
?>