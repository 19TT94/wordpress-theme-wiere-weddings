<?php

/** Add custom sections and settings to the Admin Customizer */
class Customizer {
  public function __construct() {
    add_action("customize_register", array($this, "register_customize_sections"));
  }

  public function register_customize_sections($wp_customize) {
    // Initialize section
    $this->site_settings($wp_customize);
    $this->address($wp_customize);
    $this->social($wp_customize);
    $this->home_content($wp_customize);
  }

  // Site Settings
  private function site_settings($wp_customize) {
    $wp_customize->add_section("settings", array(
      "title" => "Site Settings",
      "priority" => 100,
      "description" => __("Main content when you first land on the page.", "wordpress-template-theme")
    ));

    $wp_customize->add_setting("site_title", array(
      "default" => "of Santa Clarita",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "site_title", array(
      "label" => "Site title",
      "section" => "settings",
      "settings" => "site_title"
    )));

    $wp_customize->add_setting("profile-image", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_url")
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "profile-image", array(
      "label" => "Profile Image",
      "section" => "settings",
      "settings" => "profile-image",
      "width" => 100,
      "height" => 100
    )));

    $wp_customize->add_setting("name", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "name", array(
      "label" => "Name",
      "section" => "settings",
      "settings" => "name"
    )));

    $wp_customize->add_setting("phone", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "phone", array(
      "label" => "Phone",
      "section" => "settings",
      "settings" => "phone"
    )));

    $wp_customize->add_setting("email", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "email", array(
      "label" => "Email",
      "section" => "settings",
      "settings" => "email"
    )));

    $wp_customize->add_setting("license", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "license", array(
      "label" => "DRE #",
      "section" => "settings",
      "settings" => "license"
    )));

    $wp_customize->add_setting("copy", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "copy", array(
      "label" => "Copyright",
      "section" => "settings",
      "settings" => "copy"
    )));
  }

  // About Section
  private function address($wp_customize) {
    $wp_customize->add_section("address", array(
      "title" => "Address",
      "priority" => 100,
      "description" => __("Main content when you first land on the page.", "wordpress-template-theme")
    ));

    $wp_customize->add_setting("address-line-1", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "address-line-1", array(
      "label" => "Address Line 1",
      "section" => "address",
      "settings" => "address-line-1"
    )));

    $wp_customize->add_setting("address-line-2", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "address-line-2", array(
      "label" => "Address Line 2",
      "section" => "address",
      "settings" => "address-line-2"
    )));

    $wp_customize->add_setting("city", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "city", array(
      "label" => "City",
      "section" => "address",
      "settings" => "city"
    )));

    $wp_customize->add_setting("state", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "state", array(
      "label" => "State",
      "section" => "address",
      "settings" => "state"
    )));

    $wp_customize->add_setting("zip", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "zip", array(
      "label" => "Zip Code",
      "section" => "address",
      "settings" => "zip"
    )));
  }

  private function social($wp_customize) {
    $wp_customize->add_section("social", array(
      "title" => "Social",
      "priority" => 100,
      "description" => __("Social account settings.", "wordpress-template-theme")
    ));

    $wp_customize->add_setting("instagram", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "instagram", array(
      "label" => "Instagram",
      "section" => "social",
      "settings" => "instagram"
    )));

    $wp_customize->add_setting("facebook", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "facebook", array(
      "label" => "Facebook",
      "section" => "social",
      "settings" => "facebook"
    )));

    $wp_customize->add_setting("linkedin", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "linkedin", array(
      "label" => "LinkedIn",
      "section" => "social",
      "settings" => "linkedin"
    )));
  }

  // Home Section, Settings and Controls
  private function home_content($wp_customize) {
    $wp_customize->add_section("home-content", array(
      "title" => "Home Content",
      "priority" => 100,
      "description" => __("Main content when you first land on the page.", "wordpress-template-theme")
    ));

    $wp_customize->add_setting("small-header", array(
      "default" => "Welcome to",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "small-header", array(
      "label" => "Small Header",
      "section" => "home-content",
      "settings" => "small-header"
    )));

    $wp_customize->add_setting("large-header", array(
      "default" => "Santa Clarita",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "large-header", array(
      "label" => "Large Header",
      "section" => "home-content",
      "settings" => "large-header"
    )));

    $wp_customize->add_setting("fullscreen-video", array(
      "default" => "https://www.w3schools.com/howto/rain.mp4",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_url")
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "fullscreen-video-display-control", array(
      "label" => "Background Video",
      "section" => "home-content",
      "settings" => "fullscreen-video",
      "mime_type" => "mp4"
    )));

    $wp_customize->add_setting("about-image", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_url")
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "about-image", array(
      "label" => "About Image",
      "section" => "home-content",
      "settings" => "about-image",
      "width" => 100,
      "height" => 100
    )));

    $wp_customize->add_setting("about-text", array(
      "default" => "",
      "type" => "theme_mod",
      "capability" => "edit_theme_options",
      "sanitize_callback" => array($this, "sanitize_custom_string")
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, "about-text", array(
      "label" => "About Text",
      "type" => "textarea",
      "section" => "home-content",
      "settings" => "about-text"
    )));
  }

  // Sanitizers
  public function sanitize_custom_string($input) {
    return filter_var($input, FILTER_SANITIZE_STRING);
  }

  public function sanitize_custom_url($input) {
    return filter_var($input, FILTER_SANITIZE_URL);
  }
}