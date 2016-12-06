<?php

function home_intro( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="home-intro">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function social_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="social-icons">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function open_footer( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="open-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// Create Widget areas for Homepage

home_intro( 'Home Intro', 'front-bar', 'Homepage introduction area. Add any widget there to create an introduction to your website.' );

// Create Widget areas for Footer

social_widget( 'Social Icons', 'social-icons', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );
open_footer( 'Open Footer', 'open-footer', 'Open widget area for the footer. Use any type of widget here.' );

?>