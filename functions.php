<?php

require_once('lib/wp_bootstrap_navwalker.php');

add_action( 'wp_enqueue_scripts', 'add_custom_styles' );
function add_custom_styles() {
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/vendor/css/font-awesome.min.css');
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/vendor/css/bootstrap.min.css');
  wp_enqueue_style('style-css', get_stylesheet_uri());

  wp_enqueue_script(
    'bootstrap-js',
    get_template_directory_uri() . '/vendor/js/bootstrap.min.js',
    array( 'jquery' )
  );
}

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_action('init', 'register_menus');
function register_menus() {
  register_nav_menus( array(
    'header' => __('Header'),
    'footer' => __('Footer')
  ) );
}

add_filter('wp_mail_from', 'cdx_from_email');
function cdx_from_email() {
  return "do-not-reply@example.com";
}

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
  return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">Read More</a>';
}
