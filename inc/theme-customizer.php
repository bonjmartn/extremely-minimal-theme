<?php

function minimal_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'extremely-minimal-free');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'extremely-minimal-free');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'extremely-minimal-free');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'extremely-minimal-free');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'extremely-minimal-free');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'extremely-minimal-free');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'extremely-minimal-free');  


  $wp_customize->remove_control('background_color');
  $wp_customize->remove_control('header_image');
  $wp_customize->remove_section('colors');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'extremely-minimal-free' ),
      'description' => __( 'Controls the basic settings for the theme.', 'extremely-minimal-free' ),
  ) );

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;

 
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','extremely-minimal-free'), 
    'panel'      => 'general_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'minimal_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'extremely-minimal-free' ),
                'section'        => 'custom_css_field',
                'settings'       => 'minimal_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'minimal_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'minimal_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function minimal_style_header() {

   ?>

<style type="text/css">

  <?php if( get_theme_mod('minimal_custom_css') != '' ) {
    echo get_theme_mod('minimal_custom_css');
  } ?>

  </style>

<?php 

}

// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function minimal_customizer_js() {
  wp_enqueue_script(
    'minimal_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'minimal_customizer_js' );

?>