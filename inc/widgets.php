<?php

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

// Create Widget areas for Footer

social_widget( 'Social Icons', 'social-icons', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );

?>