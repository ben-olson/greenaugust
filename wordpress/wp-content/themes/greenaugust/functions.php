<?php

function greenaugust_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.0', 'all' );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/style.css', array(), false, 'all' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '4.5.0', true );
}

function wpb_custom_new_menus() {
  register_nav_menus(
    array(
      'headers' => __( 'Primary Headers', 'greenaugust' ),
      'nav-menu' => __( 'Navigation Bar Menu', 'greenaugust' ),
    )
  );
}

function wpb_get_menu_items($location_id){
    $menus = wp_get_nav_menus();
    $menu_locations = get_nav_menu_locations();

    if (isset($menu_locations[ $location_id ]) && $menu_locations[ $location_id ]!=0) {
        foreach ($menus as $menu) {
            if ($menu->term_id == $menu_locations[ $location_id ]) {
                $menu_items = wp_get_nav_menu_items($menu);
                break;
            }
        }
        return $menu_items;
    }
}


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

add_action( 'init', 'wpb_custom_new_menus' );
add_action( 'wp_enqueue_scripts', 'greenaugust_scripts' );
add_action( 'wp_print_styles', 'startwordpress_google_fonts' );



?>
