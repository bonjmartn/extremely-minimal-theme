<?php

// Include Scripts and CSS

function extreme_theme_styles() {

	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome-4.6.3/css/font-awesome.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'extreme_theme_styles');

function extreme_theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
 	
 	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
}

add_action( 'wp_enqueue_scripts', 'extreme_theme_js');

// Add WP Basic Features Support

if ( ! function_exists( 'extreme_setup' ) ) :

	function extreme_setup() {

	// Add Support for Feed Links
	
	add_theme_support( 'automatic-feed-links' );
	
	// Add Menu Support
	
	add_theme_support ( 'menus' );
	
	// Add Thumbnails Support
	
	add_theme_support( 'post-thumbnails' );
	
	// Add Support for Flexible Title Tag
	
	add_theme_support( 'title-tag' );
	
	}
endif;

add_action( 'after_setup_theme', 'extreme_setup' );

// Check for Front Page being used

function extreme_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'extreme_filter_front_page_template' );

// Add Support for WooCommerce

add_action( 'after_setup_theme', 'extreme_woocommerce_support' );
function extreme_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add Support for Google Fonts

function extreme_google_fonts() {
  $query_args = array(
    'family' => 'Alegreya+Sans:400,400i,700,700i|Cormorant:400,400i,700,700i|Josefin+Slab:400,400i,700,700i|Lato:400,400i,700,700i|Merriweather:400,400i,700,700i|Open+Sans:400,400i,700,700i|Prompt:400,400i,700,700i|Raleway:400,400i,700,700i|Roboto:400,400i,700,700i|Source+Sans+Pro:400,400i,700,700i|Taviraj:400,400i,700,700i|Titillium+Web:400,400i,700,700i|Trirong:400,400i,600,600i|Ubuntu:400,400i,700,700i',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'extreme_google_fonts');

// Content Width Requirement

function extreme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'extreme_content_width', 800 );
}
add_action( 'after_setup_theme', 'extreme_content_width', 0 );

// MENUS!

function extreme_register_theme_menus() {

	register_nav_menus (
		array (
			'header-menu' => __( 'Header Menu', 'extremely-minimal')
	));
}

// Register Menus

add_action ( 'init', 'extreme_register_theme_menus');

// WIDGETS!

require_once get_template_directory() . '/inc/widgets.php';

// Include Social Widget

require_once get_template_directory() . '/inc/social-widget.php';

// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';

require_once get_template_directory() . '/inc/theme-customizer.php';


// Replaces the excerpt "more" text with a link

function extreme_excerpt_more($more) {
    global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'extreme_excerpt_more');


/**
 * Filter the except length to 75 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */

function extreme_custom_excerpt_length( $length ) {
    return 75;
}
add_filter( 'excerpt_length', 'extreme_custom_excerpt_length', 999 );

?>