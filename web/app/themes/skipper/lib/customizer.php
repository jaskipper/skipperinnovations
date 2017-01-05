<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  // Rename 'Site Title & Tagline' to ‘Branding'
  $wp_customize->get_section('title_tagline')->title = __('Site Branding', 'sage');
  $wp_customize->get_section('title_tagline')->priority = 1;
  $wp_customize->get_section('header_image')->title = __('Site Logo', 'sage');
  $wp_customize->get_section('header_image')->priority = 2;

  //1. Add Section to The Customizer Menu
  $wp_customize->add_section( 'skipper_options',
    array(
      'title' => __( 'Skipper Theme Options', 'skipper' ), //Visible title of section
      'priority' => 35, //Determines what order this appears in
      'capability' => 'edit_theme_options', //Capability needed to tweak
      'description' => __('Allows you to customize some settings for Skipper Theme.', 'skipper'), //Descriptive tooltip
    )
  );

  //2. Register new settings to the WP database...
  $wp_customize->add_setting( 'fp_description', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
    array(
      'default' => 'This is an AWESOME Front Page Description for the Wordpress Skipper Theme!', //Default setting/value to save
      'type' => 'option', //Is this an 'option' or a 'theme_mod'?
      'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    )
  );

  //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
  $wp_customize->add_control( new \WP_Customize_Control( //Instantiate the  control class
    $wp_customize, //Pass the $wp_customize object (required)
    'fp_description', //Set a unique ID for the control
      array(
        'label' => __( 'Front Page Description', 'skipper' ), //Admin-visible name of the control
        'section' => 'skipper_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'settings' => 'fp_description', //Which setting to load and manipulate (serialized is okay)
        'priority' => 10, //Determines the order this control appears in for the specified section
        'type' => 'textarea',
      )
  ));

  $wp_customize->add_setting( 'header_bg_image', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
    array(
      'default' => '', //Default setting/value to save
      'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
      'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    )
  );

  $wp_customize->add_control( new \WP_Customize_Image_Control(
    $wp_customize,
    'header_bg_image',
      array(
        'label' => __( 'Header Background Image', 'skipper'),
        'section' => 'skipper_options',
        'settings' => 'header_bg_image',
        'priority' => 1,
      )
  ));

} //Customize Register
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
