<?php
/**
 * Created by PhpStorm.
 * User: ivahid_pc4
 * Date: 11/1/2020
 * Time: 2:48 PM
 */

/* post like & dislike*/

function ivahid_post_like()
{
    if (!wp_verify_nonce($_POST['nonce'], 'ivahid_post_like_nonce') || !isset($_POST['nonce'])) {
        wp_send_json(array('status' => 0, 'message' => __('مشکلی پیش آمده دوباره امتحان کنید.', 'persian_bourse')));
    }
    $like_cookie = null;
    $type = $_POST['type'];
    $post_id = $_POST['postid'];
    $ip = ivahid_get_ip();
    if (isset($_COOKIE[$type . '_' . $post_id])) {
        $like_cookie = $_COOKIE[$type . '_' . $post_id];
    }
    $likes = get_post_meta($post_id, 'ivahid_post_' . $type, true);
    $likes_ip = get_post_meta($post_id, 'ivahid_post_' . $type . '_ips', true);
    $likes_ip = !$likes_ip ? array() : $likes_ip;
    $likes = !$likes ? 0 : $likes;
    $type_like=false;
    if (!in_array($ip, $likes_ip) || $like_cookie != 1) {
        setcookie($type . '_' . $post_id, 1, time() + (86400 * 1825), "/"); // 86400 = 1 day
        array_push($likes_ip, $ip);
        $likes += 1;
        $type_like='add';
    } else {
        setcookie($type . '_' . $post_id, 0, time() + (86400 * 1825), "/"); // 86400 = 1 day
        if (($key = array_search($ip, $likes_ip)) !== false) {
            unset($likes_ip[$key]);
            $type_like='remove';
        }
        $likes -= 1;
    }
    update_post_meta($post_id, 'ivahid_post_' . $type . '_ips', $likes_ip);
    update_post_meta($post_id, 'ivahid_post_' . $type, $likes);
    $likes = get_post_meta($post_id, 'ivahid_post_' . $type, true);
    wp_send_json(array('status' => 1, 'type' => $type_like, 'message' => __('با موفقیت بروزرسانی شد.', 'persian_bourse'), 'info' => array('count' => $likes)));
}

function ivahid_get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

function ivahid_post_like_status($post_id = null, $type = null)
{
    $user_ip = ivahid_get_ip();
    $ips = get_post_meta($post_id, 'ivahid_post_' . $type . '_ips', true);
    if ($ips && in_array($user_ip, $ips)) {
        return true;
    } else {
        return null;
    }
}


function ivahid_post_like_count($post_id = null, $type = null)
{
    $likes = get_post_meta($post_id, 'ivahid_post_' . $type, true);
    if (!$likes) {
        return 0;
    }
    return $likes;
}

add_action('wp_ajax_nopriv_ivahid_post_like', 'ivahid_post_like');
add_action('wp_ajax_ivahid_post_like', 'ivahid_post_like');


//if ($post_views == true) {
    function ivahid_set_views($postID = null)
    {
        if ($postID == null):
            global $post;
            $postID = $post->ID;
        endif;
        $view_count = ivahid_get_views($postID) + 1;
        if ($view_count != 1) {
            update_post_meta($postID, 'views', ($view_count));
        } else {
            add_post_meta($postID, 'views', 1);
        }

        return $view_count;
    }

    function ivahid_get_views($postID = null)
    {
        if ($postID == null):
            global $post;
            $postID = $post->ID;
        endif;

        return intval(get_post_meta($postID, 'views', true));
    }

    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

    function posts_column_views($defaults)
    {
        $defaults['post_views'] = __( 'بازدید', 'persian_bourse' );

        return $defaults;
    }

    function posts_custom_column_views($column_name, $id)
    {
        if ($column_name === 'post_views') {
            echo ivahid_set_views(get_the_ID());
        }
    }

    add_filter('manage_posts_columns', 'posts_column_views');
    add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
//}

function read_time($post){
    $content = get_post_field('post_content', $post->ID);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 700);
    return $reading_time;
}

function ivahid_get_excerpt($character, $post_id = null)
{
    if ($post_id == '') {
        $post_id = get_the_ID();
    }
    if (get_the_excerpt($post_id)) {
        $excerpt = get_the_excerpt($post_id);
    } else {
        $excerpt = get_the_content($post_id);
    }
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $the_str = mb_substr($excerpt, 0, $character);
    $the_str=$the_str ? $the_str .'...':false;
    return $the_str;
}
// Pagination function
function ivahid_pagination($both = 1, $middle = 2, $prev = '<span class="change-page-arrow prev-page"><i class=" icon-arrow-right"></i></span>', $next = '<span class="change-page-arrow next-page"><i class="icon-arrow-left"></i></span>',$query=null)
{
    if($query){
        $wp_query=$query;
    }else{
        global $wp_query;
    }
    $max_num_pages = $wp_query->max_num_pages;
//    persian_var_dump( $wp_query->found_posts );
    //persian_var_dump( $wp_query->posts_per_page );
    if ($max_num_pages < 2) {
        return;
    }
    $big_number = 999999999;
    $args = array(
        'base' => str_replace($big_number, '%#%', esc_url(get_pagenum_link($big_number))),
        'total' => $max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'end_size' => $both,
        'mid_size' => $middle,
        'prev_text' => $prev,
        'next_text' => $next,
        'before_page_number' => '',
        'after_page_number' => '',
        'type'              => 'list'
    );
    ?>
    <div class="pagination-num num-fa pagination-app">
        <div class="page-list">
            <?= paginate_links($args) ?>
        </div>
    </div>
    <?php
}

add_action('pagination','ivahid_pagination', 10, 5 );
