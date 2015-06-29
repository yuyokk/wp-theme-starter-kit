<?php

require_once('lib/wp_bootstrap_navwalker.php');

add_action( 'wp_enqueue_scripts', 'add_custom_styles' );
function add_custom_styles() {
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/dist/css/bootstrap.css');
  wp_enqueue_style('style-css', get_stylesheet_uri());

  wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/dist/js/bootstrap.js', array('jquery'));
  wp_enqueue_script('bootstrap-js');
}

add_action('init', 'register_menus');
function register_menus() {
  register_nav_menus( array(
    'header' => __('Header'),
    'footer' => __('Footer')
  ) );
}

add_filter('wp_mail_from', 'cdx_from_email');
function cdx_from_email() {
  // Make sure the email is from the same domain
  // as your website to avoid being marked as spam
  return "do-not-reply@example.com";
}

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
  return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">Read More</a>';
}

// remove wpautop for 'page' post type only
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'custom_formatting');
function custom_formatting($content) {
  if (get_post_type() == 'page') {
    return $content; // no autop
  }

  return wpautop($content);
}
