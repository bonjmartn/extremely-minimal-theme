<?php

function minimal_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'extremely-minimal');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'extremely-minimal');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'extremely-minimal');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'extremely-minimal');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'extremely-minimal');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'extremely-minimal');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'extremely-minimal');  


  $wp_customize->remove_control('background_color');
  $wp_customize->remove_control('header_image');
  $wp_customize->remove_section('colors');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'extremely-minimal' ),
      'description' => __( 'Controls the basic settings for the theme.', 'extremely-minimal' ),
  ) );
  $wp_customize->add_panel( 'color_choices', array(
      'priority' => 30,
      'theme_supports' => '',
      'title' => __( 'Color Choices', 'extremely-minimal' ),
      'description' => __( 'Controls the color settings for the theme.', 'extremely-minimal' ),
  ) ); 
  $wp_customize->add_panel( 'typography_settings', array(
      'priority' => 40,
      'theme_supports' => '',
      'title' => __( 'Typography', 'extremely-minimal' ),
      'description' => __( 'Controls the fonts for the theme.', 'extremely-minimal' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// COLOR CHOICES PANEL ........................................ //

// Text Colors

  $wp_customize->add_section( 'text_colors' , array(
    'title'      => __('Text Colors','extremely-minimal'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'minimal_h_color',
      array(
          'default'         => '#252525',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_h_color',
           array(
               'label'      => __( 'Headings Color', 'extremely-minimal' ),
               'section'    => 'text_colors',
               'settings'   => 'minimal_h_color' 
           )
       )
   );

  $wp_customize->add_setting(
      'minimal_p_color',
      array(
          'default'         => '#252525',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_p_color',
           array(
               'label'      => __( 'Paragraph Color', 'extremely-minimal' ),
               'section'    => 'text_colors',
               'settings'   => 'minimal_p_color' 
           )
       )
   );


// Accent Color

  $wp_customize->add_section( 'accent_color' , array(
    'title'      => __('Accent Color','extremely-minimal'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'minimal_accent_color',
      array(
          'default'         => '#0072bc',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_accent_color',
           array(
               'label'      => __( 'Links, buttons, and icons', 'extremely-minimal' ),
               'section'    => 'accent_color',
               'settings'   => 'minimal_accent_color' 
           )
       )
   ); 


// TYPOGRAPHY PANEL ........................................ //

// H1 Fonts

  $wp_customize->add_section( 'custom_h_fonts' , array(
    'title'      => __('Heading Styles','extremely-minimal'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  
 
$wp_customize->add_setting(
      'minimal_h_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_h_font_type',
            array(
                'label'          => __( 'Font', 'extremely-minimal' ),
                'section'        => 'custom_h_fonts',
                'settings'       => 'minimal_h_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans'       => 'Open Sans',
                  'Roboto'       => 'Roboto',
                  'Lato'       => 'Lato',
                  'Source Sans Pro'       => 'Source Sans Pro',
                  'Raleway'       => 'Raleway',
                  'Titillium Web'       => 'Titillium Web',
                  'Alegreya Sans'       => 'Alegreya Sans',
                  'Trirong'       => 'Trirong',
                  'Prompt'       => 'Prompt',
                  'Taviraj'       => 'Taviraj',
                  'Merriweather'       => 'Merriweather',
                  'Ubuntu'       => 'Ubuntu',
                  'Josefin Slab'       => 'Josefin Slab',
                  'Cormorant'       => 'Cormorant'
                )
            )
        )       
   );


 // Paragraph Fonts

   $wp_customize->add_section( 'custom_p_fonts' , array(
    'title'      => __('Paragraph Styles','extremely-minimal'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  

   $wp_customize->add_setting(
      'minimal_p_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_size',
            array(
                'label'          => __( 'Font Size', 'extremely-minimal' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'minimal_p_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '12'   => '12px',
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px',
                  '22'   => '22px'
                )
            )
        )       
   ); 


   $wp_customize->add_setting(
      'minimal_p_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_type',
            array(
                'label'          => __( 'Font', 'extremely-minimal' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'minimal_p_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans'       => 'Open Sans',
                  'Roboto'       => 'Roboto',
                  'Lato'       => 'Lato',
                  'Source Sans Pro'       => 'Source Sans Pro',
                  'Raleway'       => 'Raleway',
                  'Titillium Web'       => 'Titillium Web',
                  'Alegreya Sans'       => 'Alegreya Sans',
                  'Trirong'       => 'Trirong',
                  'Prompt'       => 'Prompt',
                  'Taviraj'       => 'Taviraj',
                  'Merriweather'       => 'Merriweather',
                  'Ubuntu'       => 'Ubuntu',
                  'Josefin Slab'       => 'Josefin Slab',
                  'Cormorant'       => 'Cormorant'
                )
            )
        )       
   );

  
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','extremely-minimal'), 
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
                'label'          => __( 'Add custom CSS here', 'extremely-minimal' ),
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

h1,
h2,
h3,
h4,
h5,
h6,
#logotext a {
  font-family: <?php echo get_theme_mod('minimal_h_font_type'); ?>;
  color: <?php echo get_theme_mod('minimal_h_color'); ?>;
}

p,
li {
	font-size: <?php echo get_theme_mod('minimal_p_font_size') . 'px'; ?>;
	color: <?php echo get_theme_mod('minimal_p_color'); ?>;
	font-family: <?php echo get_theme_mod('minimal_p_font_type'); ?>;
}

#copyright  {
  font-size: <?php echo get_theme_mod('minimal_p_font_size') . 'px'; ?>;
  font-family: <?php echo get_theme_mod('minimal_p_font_type'); ?>;
}

.main-navigation li:hover > a,
.main-navigation li.current_page_item a,
.main-navigation li.current-menu-item a,
.main-navigation ul ul a:hover,
.main-navigation ul ul :hover > a,
.social-icons .fa,
h1 a,
h2 a,
h3 a,
h4 a,
h5 a,
h6 a,
h1 a:visited,
h2 a:visited,
h3 a:visited,
h4 a:visited,
h5 a:visited,
h6 a:visited,
p a,
li a,
span a {
  color: <?php echo get_theme_mod('minimal_accent_color'); ?>;
}

a,
a:visited,
a:hover,
a:focus,
a:active,
:not(.main-navigation a),
:not(.main-navigation a:visited), {
  color: <?php echo get_theme_mod('minimal_accent_color'); ?>;
}


.pagination ul li span.current,
.pagination ul li a:hover {
  background: <?php echo get_theme_mod('minimal_accent_color'); ?>;
}

button,
input[type=submit],
html input[type="button"],
input[type="reset"] {
	background-color: <?php echo get_theme_mod('minimal_accent_color'); ?>;
}

.main-navigation,
.main-navigation ul,
.main-navigation li,
.main-navigation ul ul li,
.main-navigation ul ul a,
.main-navigation a,
.main-navigation a:visited {
  color: <?php echo get_theme_mod('minimal_p_color'); ?>;
}

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