<?php
function persian_var_dump( $value ) {
    echo '<pre style="direction: ltr; text-align: left;">';
    var_dump( $value );
    echo '</pre>';
}
function wordpressify_resources() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, false );
	wp_enqueue_script( 'footer_js', get_template_directory_uri() . '/js/footer-bundle.js', null, 1.0, true );
}

add_action( 'wp_enqueue_scripts', 'wordpressify_resources' );

// Customize excerpt word count length
function custom_excerpt_length() {
	return 22;
}

add_filter( 'excerpt_length', 'custom_excerpt_length' );

// Theme setup
function wordpressify_setup() {
	// Handle Titles
	add_theme_support( 'title-tag' );

	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumbnail', 720, 720, true );
	add_image_size( 'square-thumbnail', 80, 80, true );
	add_image_size( 'banner-image', 1024, 1024, true );
}

add_action( 'after_setup_theme', 'wordpressify_setup' );

show_admin_bar( false );

// Checks if there are any posts in the results
function is_search_has_results() {
	return 0 != $GLOBALS['wp_query']->found_posts;
}

// include widgets
require_once get_template_directory() . '/inc/widgets.php';

// Add options page for ACF
if ( function_exists( 'acf_add_options_page' ) ){
    acf_add_options_page();
}
