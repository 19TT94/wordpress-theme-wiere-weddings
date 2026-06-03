<?php

/**
 * Seed development demo content from inc/environment.php and theme images.
 */

function ww_get_environment_config() {
  static $config = null;

  if ( $config === null ) {
    $config = require get_template_directory() . '/inc/environment.php';
  }

  return $config[ ENVIRONMENT ] ?? array();
}

function ww_get_environment_default_image( $post_type, $title ) {
  $config = ww_get_environment_config();
  $posts  = $config['post_types'][ $post_type ] ?? array();

  foreach ( $posts as $post_config ) {
    if ( ( $post_config['title'] ?? '' ) === $title && ! empty( $post_config['image'] ) ) {
      return $post_config['image'];
    }
  }

  return '';
}

function ww_theme_image_url( $filename, $size = 'full' ) {
  if ( empty( $filename ) ) {
    return false;
  }

  $attachment_id = ww_get_theme_image_attachment_id( $filename );

  if ( $attachment_id ) {
    $image = wp_get_attachment_image_src( $attachment_id, $size );

    if ( $image ) {
      return $image[0];
    }
  }

  return get_template_directory_uri() . '/assets/images/' . ltrim( $filename, '/' );
}

function ww_get_theme_image_attachment_id( $filename ) {
  $imported = get_option( 'ww_theme_image_attachments', array() );

  if ( isset( $imported[ $filename ] ) && wp_attachment_is_image( $imported[ $filename ] ) ) {
    return (int) $imported[ $filename ];
  }

  return 0;
}

function ww_import_theme_image( $filename ) {
  $existing_id = ww_get_theme_image_attachment_id( $filename );

  if ( $existing_id ) {
    return $existing_id;
  }

  $file_path = get_template_directory() . '/assets/images/' . ltrim( $filename, '/' );

  if ( ! file_exists( $file_path ) ) {
    return 0;
  }

  require_once ABSPATH . 'wp-admin/includes/file.php';
  require_once ABSPATH . 'wp-admin/includes/media.php';
  require_once ABSPATH . 'wp-admin/includes/image.php';

  $tmp_file = wp_tempnam( $filename );

  if ( ! $tmp_file || ! copy( $file_path, $tmp_file ) ) {
    if ( $tmp_file ) {
      @unlink( $tmp_file );
    }

    return 0;
  }

  $file_array = array(
    'name'     => basename( $file_path ),
    'tmp_name' => $tmp_file,
  );

  $attachment_id = media_handle_sideload( $file_array, 0 );

  if ( is_wp_error( $attachment_id ) ) {
    @unlink( $tmp_file );

    return 0;
  }

  $imported             = get_option( 'ww_theme_image_attachments', array() );
  $imported[ $filename ] = $attachment_id;
  update_option( 'ww_theme_image_attachments', $imported );

  return (int) $attachment_id;
}

function ww_seed_customizer_settings( $settings ) {
  foreach ( $settings as $key => $value ) {
    if ( get_theme_mod( $key, null ) === null || get_theme_mod( $key ) === '' ) {
      set_theme_mod( $key, $value );
    }
  }
}

function ww_clear_demo_post_types() {
  foreach ( array( 'slide', 'home_content', 'about', 'services' ) as $post_type ) {
    $posts = get_posts(
      array(
        'post_type'      => $post_type,
        'post_status'    => 'any',
        'posts_per_page' => -1,
      )
    );

    foreach ( $posts as $post ) {
      wp_delete_post( $post->ID, true );
    }
  }
}

function ww_seed_development_content( $seed_version ) {
  $config = ww_get_environment_config();

  if ( empty( $config['seed_on_activation'] ) ) {
    return;
  }

  if ( ! empty( $config['customizer'] ) ) {
    ww_seed_customizer_settings( $config['customizer'] );
  }

  $post_types = $config['post_types'] ?? array();

  foreach ( $post_types as $post_type => $posts ) {
    foreach ( $posts as $index => $post_config ) {
      $attachment_id = 0;

      if ( ! empty( $post_config['image'] ) ) {
        $attachment_id = ww_import_theme_image( $post_config['image'] );
      }

      $post_id = wp_insert_post(
        array(
          'post_type'    => $post_type,
          'post_title'   => $post_config['title'],
          'post_excerpt' => $post_config['excerpt'] ?? '',
          'post_status'  => 'publish',
          'menu_order'   => $index,
        ),
        true
      );

      if ( is_wp_error( $post_id ) || ! $post_id ) {
        continue;
      }

      if ( $attachment_id ) {
        set_post_thumbnail( $post_id, $attachment_id );
      }

      if ( ! empty( $post_config['image'] ) ) {
        update_post_meta( $post_id, '_ww_theme_image', $post_config['image'] );
      }

      update_post_meta( $post_id, '_ww_seeded', '1' );

      $default_meta = array(
        'meta_type_key'        => '',
        'meta_paragraph_key'   => '',
        'meta_list_key'        => '',
        'meta_image_width_key' => '',
        'meta_bullet_type_key' => '',
      );

      $meta = array_merge( $default_meta, $post_config['meta'] ?? array() );

      foreach ( $meta as $meta_key => $meta_value ) {
        update_post_meta( $post_id, $meta_key, $meta_value );
      }
    }
  }

  update_option( 'ww_development_content_seeded', $seed_version );
}

function ww_maybe_seed_development_content() {
  if ( ENVIRONMENT !== 'development' ) {
    return;
  }

  $config       = ww_get_environment_config();
  $seed_version = (int) ( $config['seed_version'] ?? 1 );
  $stored       = (int) get_option( 'ww_development_content_seeded', 0 );

  if ( $stored >= $seed_version ) {
    return;
  }

  if ( $stored > 0 ) {
    ww_clear_demo_post_types();
  }

  ww_seed_development_content( $seed_version );
}

add_action( 'after_switch_theme', 'ww_maybe_seed_development_content' );
add_action( 'init', 'ww_maybe_seed_development_content', 20 );
