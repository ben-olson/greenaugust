<?php

function greenaugust_scripts() {
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), NULL, 'all' );
  wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/flickity.css', array(), NULL, 'all' );
  wp_enqueue_script('index-js', get_template_directory_uri() . '/index.js');
  wp_enqueue_script('flickity', get_template_directory_uri() . '/flickity.pkgd.min.js');
}

function wpb_custom_new_menus() {
  register_nav_menus(
    array(
      'headers' => __( 'Primary Headers', 'greenaugust' ),
      'nav-menu' => __( 'Navigation Bar Menu', 'greenaugust' ),
      'social-media' => __( 'Social Media Links', 'greenaugust' ),
      'footer-menu' => __( 'Footer Menu', 'greenaugust'),
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

function get_the_permalink2($post_id) {

  $href = get_post_meta($post_id, 'Published Article Link', true);
  $target = "_blank";
  $tab = "external";
  $rel = "noopener";
  if (empty($href)) {
    $href = get_permalink($post_id);
    $target = "_self";
    $tab = "internal";
  }
  $title = get_the_title($post_id);
  $alt = get_the_title($post_id);
  return "<a href=" . $href . " target="
    . $target . "&quot; rel=" . $rel . ">" . $title . "</a>";
}

function get_the_image_permalink($post_id) {

  $href = get_post_meta($post_id, 'Published Article Link', true);
  $target = "_blank";
  $tab = "external";
  $rel = "noopener";
  if (empty($href)) {
    $href = get_permalink($post_id);
    $target = "_self";
    $tab = "internal";
  }
  $title = get_the_title($post_id);
  $alt = get_the_title($post_id);
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), ’thumbnail’ );
  return "<a class='thumbnail-image' href='" . $href . "' target='"
    . $target . "' rel='" . $rel . "'><img width='100%' src='" . $src[0] . "' alt='"
      . $title . "'></a>";

}

function show_last_modified_date() {
  $original_time = get_the_time('U');
  console.log($original_time);
  $modified_time = get_the_modified_time('U');
  if ($modified_time >= $original_time + 86400) {
    $updated_time = get_the_modified_time('h:i a');
    $updated_day = get_the_modified_time('F jS, Y');
    $modified_content .= '<div class="modified-date body-copy">Last updated on '. $updated_day . '</div>';
  }
  console.log($modified_content);
  return $modified_content;
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 300;
}

function bac_wp_strip_header_tags_only( $excerpt ) {

    $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
    $excerpt = preg_replace($regex,'', $excerpt);
    return $excerpt;
}

function bac_wp_strip_header_tags_keep_other_formatting( $text ) {

  $raw_excerpt = $text;

  if ( '' == $text ) {
  //Retrieve the post content.
  $text = get_the_content('');
  //remove shortcode tags from the given content.
  $text = strip_shortcodes( $text );
  $text = apply_filters('the_content', $text);
  $text = str_replace(']]>', ']]&gt;', $text);

  //Regular expression that removes the h1-h6 tags with their content.
  $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
  $text = preg_replace($regex,'', $text);

  /***Add the allowed HTML tags separated by a comma.
  h1-h6 header tags are NOT allowed. DO NOT add h1,h2,h3,h4,h5,h6 tags here.***/
  $allowed_tags = '<p>,<a>,<strong>';  //I added p, em, and strong tags.
  $text = strip_tags($text, $allowed_tags);

  /***Change the excerpt word count.***/
  $excerpt_word_count = 55; //This is WP default.
  $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

  /*** Change the excerpt ending.***/
  $excerpt_end = '[...]'; //This is the WP default.
  $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

  $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
      if ( count($words) > $excerpt_length ) {
          array_pop($words);
          $text = implode(' ', $words);
          $text = $text . $excerpt_more;
      } else {
          $text = implode(' ', $words);
      }
  }
  return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}



/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}

// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_filter( 'get_the_modified_date', 'show_last_modified_date' );
// add_filter( 'get_the_excerpt', 'bac_wp_strip_header_tags_keep_other_formatting', 5);

// Add Google Fonts
function startwordpress_google_fonts() {
	wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans');
}

//Wordpress Titles
add_theme_support('title-tag');
//Post thumbnails & featured images
add_theme_support('post-thumbnails');
set_post_thumbnail_size(700, 9999);
add_image_size( 'homepage-thumbnail', 300, 300); // Soft Crop Mode

add_action( 'init', 'wpb_custom_new_menus' );
add_action( 'wp_enqueue_scripts', 'greenaugust_scripts' );
add_action( 'wp_print_styles', 'startwordpress_google_fonts' );



?>
