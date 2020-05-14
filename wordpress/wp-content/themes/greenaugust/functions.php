<?php

function greenaugust_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.0', 'all' );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/style.css', array(), false, 'all' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '4.5.0', true );
}

add_action( 'wp_enqueue_scripts', 'greenaugust_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
	wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans');
}

//Wordpress Titles
add_theme_support('title-tag');
//Post thumbnails & featured images
add_theme_support('post-thumbnails');
set_post_thumbnail_size(100, 100);

add_action('wp_print_styles', 'startwordpress_google_fonts');



?>
