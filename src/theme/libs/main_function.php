<?php
/**
 * Created by PhpStorm.
 * User: ivahid_pc4
 * Date: 11/1/2020
 * Time: 2:48 PM
 */
/* post like & dislike*/
$post_views = true;

function ivahid_post_like()
{
    if (!wp_verify_nonce($_POST['nonce'], 'ivahid_post_like_nonce') || !isset($_POST['nonce'])) {
        wp_send_json(array('status' => 0, 'message' => __('مشکلی پیش آمده دوباره امتحان کنید.')));
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
    wp_send_json(array('status' => 1, 'type' => $type_like, 'message' => __('با موفقیت بروزرسانی شد.'), 'info' => array('count' => $likes)));
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

if ($post_views == true) {
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
        $defaults['post_views'] = 'بازدید';

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
}