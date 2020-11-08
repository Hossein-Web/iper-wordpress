<?php

// General
function persian_var_dump( $value ) {
    echo '<pre style="direction: ltr; text-align: left;">';
    var_dump( $value );
    echo '</pre>';
}

// Convert string to array and trim it
function StrToArr($str, $delimiter)
{
    $arr = explode($delimiter, $str);
    $result = [];
    foreach ($arr as $item) {
        $result[] = trim($item);
    }
    return $result;
}

// Load theme text domain
function persian_load_text_domain() {
    load_theme_textdomain( 'persian_bourse', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'persian_load_text_domain' );

// Ivahid functions

//function ivahid_get_views($postID = null)
//{
//    if ($postID == null):
//        global $post;
//        $postID = $post->ID;
//    endif;
//
//    return intval(get_post_meta($postID, 'views', true));
//}

// Wordpressify functions
function wordpressify_resources() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, false );
	wp_enqueue_script( 'footer_js', get_template_directory_uri() . '/js/footer-bundle.js', null, 1.0, true );
}

add_action( 'wp_enqueue_scripts', 'wordpressify_resources' );

//main_function file
require_once get_template_directory() . '/libs/main_function.php';
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

// Include files
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/libs/main_function.php';


// Add options page for ACF
//if ( function_exists( 'acf_add_options_page' ) ){
//    acf_add_options_page();
//}

// Comments callback
function persian_comments( $comment, $args, $depth ) {
//    get_template_part( '/template_parts/comment_list' );
    ?>
    <li class="comment">
    <div class="comment__content">
        <div class="comment-info">
            <p class="comment-author"><?php echo get_comment_author(); ?></p><!-- .comment-author -->
            <p class="comment-date"><?php echo __( 'تاریخ ارسال', 'persian_bourse' ) .
                                                ' ' . human_time_diff( get_comment_date( 'U' ), current_time( 'U' ) ) .
                                                ' ' . __( 'پیش', 'persian_bourse' );  ?></p><!-- .comment-date -->
        </div><!-- .comment-info -->
        <p class="comment-text"><?php echo esc_html( get_comment_text( $comment->comment_ID ) ) ?></p><!-- .comment-text -->
        <?php $comment_link_args = [
                        'reply_text' => __( '<i class="persian-response"></i> پاسخ دهید', 'persian_bourse' ),
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'] ]; ?>
    <?php comment_reply_link( array_merge( $args, $comment_link_args ) ); ?>
    </div><!-- .comment__content -->
    <?php
}


// Add cell phone number to comments
function add_phone_number( $comment_id ) {
    add_comment_meta( $comment_id, 'user_phone_number', $_POST['user_phone_number'] );
}
add_action( 'comment_post', 'add_phone_number' );

// Set options page for persian bourse
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'تنظیمات قالب پرشین بورس',
        'menu_title'	=> 'تنظیمات پرشین بورس',
        'menu_slug' 	=> 'persian-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

// Add user cell phone number column to comments table
function user_cell_phone_number_col( $columns ) {
    $custom_columns = [ 'user_phone_number_id' => __( 'شماره تلفن', 'persian_bourse' ) ];
    $columns = array_slice( $columns, 0, 3, true ) + $custom_columns + array_slice( $columns, 3, null, true );
    return $columns;
}
add_action( 'manage_edit-comments_columns', 'user_cell_phone_number_col' );

// Add value to user cell phone number column
function user_cell_phone_number_value( $column, $comment_id ) {
    if ( $column === 'user_phone_number_id' ){
        $phone_number = get_comment_meta( $comment_id, 'user_phone_number' );
        $message = $phone_number ? $phone_number[0] : __( 'بدون شماره تلفن', 'persian_bourse' );
        echo esc_html( $message );
    }
}
add_action( 'manage_comments_custom_column', 'user_cell_phone_number_value', 10, 2 );

// Get widget id
add_action('in_widget_form', 'yatendra_get_widget_id'); //hookiing our function to "in_widget_form" hook

function yatendra_get_widget_id($widget_instance)

{
    // Check if the widget is already saved or not.

    if ($widget_instance->number=="__i__"){

        echo "<strong>Widget ID is</strong>: Pls save the widget first!" ;


    }  else {

        //get the widget ID

        echo "<strong>Widget ID is: </strong>" .$widget_instance->id. "";

    }
}
