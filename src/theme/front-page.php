<?php
/**
 * Created by PhpStorm.
 * User: ivahid_pc4
 * Date: 11/1/2020
 * Time: 10:50 AM
 */
?>
<?php get_header(); ?>
<?php

function persian_get_category($post_id, $ul_class, $li_class)
{
    $categories = get_the_category($post_id);
    ?>
    <ul class="<?php echo $ul_class ?>">
        <?php
        foreach ($categories as $category) {
            ?>
            <li class="<?php echo $li_class ?>">
                <a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}

if (have_rows('main_page')){
while (have_rows('main_page')){
the_row();
if (get_row_layout() == 'persian_main_slider'){
$persian_slider_type = get_sub_field('persian_slider_type');
if ($persian_slider_type == 'select'){
$persian_slider = get_sub_field('persian_main_slider');
if ($persian_slider){
?>
<div class="tile-post">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                for ($i = 0; $i < count($persian_slider); $i++) { ?>

                    <div class="swiper-slide">
                        <div class="tile-post-wrapper">
                            <div class="tile-post__item tile-post__item--small">
                                <img class="post-item-image"
                                     src="<?php echo esc_url(get_the_post_thumbnail_url($persian_slider[$i]->ID)); ?>"
                                     alt="<?php echo get_the_title($persian_slider[$i]->ID); ?>">
                                <?php
                                persian_get_category($persian_slider[$i]->ID, 'post-item-categories', 'post-item-category');
                                ?>
                                <div class="post-item-details">
                                    <a class="post-item-details__title"
                                       href="<?php echo esc_url(get_permalink($persian_slider[$i]->ID)); ?>">
                                        <h5><?php echo esc_html(get_the_title($persian_slider[$i]->ID)); ?></h5>
                                        <!-- .post-item-details__title -->
                                    </a><!-- .post-item-details__title -->
                                    <ul class="bourse-post-meta bourse-post-meta--small post-item-details__links ">
                                        <li>
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                        </li>
                                        <li><span><?php echo human_time_diff( get_the_time('U'), current_time( 'U' ) ) .' ' . __('پیش', 'persian_bourse'); ?></span></li>
                                        <li><span><?php echo read_time( $persian_slider[$i] ) . ' '. __('دقیقه مطالعه', 'persian_bourse' );?></span></li>
                                    </ul><!-- .bourse-post-meta -->
                                </div><!-- .post-item-details -->
                                <span class="post-item-like persian persian-like"></span>
                            </div><!-- .tile-post__item -->
                            <?php $i++; ?>
                            <div class="tile-post__item tile-post__item--small">
                                <img class="post-item-image"
                                     src="<?php echo esc_url(get_the_post_thumbnail_url($persian_slider[$i]->ID)); ?>"
                                     alt="<?php echo get_the_title($persian_slider[$i]->ID); ?>">
                                <?php
                                persian_get_category($persian_slider[$i]->ID, 'post-item-categories', 'post-item-category');
                                ?>
                                <div class="post-item-details">
                                    <a class="post-item-details__title"
                                       href="<?php echo esc_url(get_permalink($persian_slider[$i]->ID)); ?>">
                                        <h5><?php echo esc_html(get_the_title($persian_slider[$i]->ID)); ?></h5>
                                        <!-- .post-item-details__title -->
                                    </a><!-- .post-item-details__title -->
                                    <ul class="bourse-post-meta bourse-post-meta--small post-item-details__links ">
                                        <li>
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                        </li>
                                        <li><span><?php echo human_time_diff( get_the_time('U'), current_time( 'U' ) ) . ' '. __('پیش', 'persian_bourse'); ?></span></li>
                                        <li><span><?php echo read_time( $persian_slider[$i] ) . ' '. __('دقیقه مطالعه', 'persian_bourse' );?></span></li>
                                    </ul><!-- .bourse-post-meta -->
                                </div><!-- .post-item-details -->
                                <span class="post-item-like persian persian-like"></span>
                            </div><!-- .tile-post__item -->
                        </div><!-- .tile-post-wrapper -->
                    </div><!-- .swiper-slide -->
                    <?php $i++ ?>
                    <div class="swiper-slide">
                        <div class="tile-post-wrapper">
                            <div class="tile-post__item">
                                <img class="post-item-image"
                                     src="<?php echo esc_url(get_the_post_thumbnail_url($persian_slider[$i]->ID)); ?>"
                                     alt="<?php echo get_the_title($persian_slider[$i]->ID); ?>">
                                <?php
                                persian_get_category($persian_slider[$i]->ID, 'post-item-categories', 'post-item-category');
                                ?>
                                <div class="post-item-details">
                                    <a class="post-item-details__title" href="#">
                                        <h5><?php echo get_the_title($persian_slider[$i]->ID); ?></h5>
                                        <!-- .post-item-details__title -->
                                    </a><!-- .post-item-details__title -->
                                    <ul class="bourse-post-meta bourse-post-meta--small post-item-details__links">
                                        <li>
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                        </li>
                                        <li><span><?php echo human_time_diff( get_the_time('U'), current_time( 'U' ) ) .' '. __('پیش', 'persian_bourse'); ?></span></li>
                                        <li><span><?php echo read_time( $persian_slider[$i] )   . ' '. __('دقیقه مطالعه', 'persian_bourse'  );?></span></li>
                                    </ul><!-- .bourse-post-meta -->
                                </div><!-- .post-item-details -->
                                <span class="post-item-like persian persian-like"></span>
                            </div><!-- .tile-post__item -->
                        </div><!-- .tile-post-wrapper -->
                    </div><!-- .swiper-slide -->
                    <?php
                }
                }

                }elseif ($persian_slider_type == 'visited'){
                $args = array(
                    'meta_key' => 'views',
                    'orderby' => 'meta_value_num'
                );
                $persian_posts = get_posts($args); ?>
                <div class="tile-post">
                    <div class="container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                for ($j = 0; $j < count($persian_posts); $j++) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="tile-post-wrapper">
                                            <div class="tile-post__item tile-post__item--small">
                                                <img class="post-item-image"
                                                     src="<?php echo esc_url(get_the_post_thumbnail_url($persian_posts[$j]->ID)); ?>"
                                                     alt="<?php echo get_the_title($persian_posts[$j]->ID); ?>">
                                                <?php
                                                persian_get_category($persian_posts[$j]->ID, 'post-item-categories', 'post-item-category');
                                                ?>
                                                <div class="post-item-details">
                                                    <a class="post-item-details__title"
                                                       href="<?php echo esc_url(get_permalink($persian_posts[$j]->ID)); ?>">
                                                        <h5><?php echo esc_html(get_the_title($persian_posts[$j]->ID)); ?></h5>
                                                        <!-- .post-item-details__title -->
                                                    </a><!-- .post-item-details__title -->
                                                    <ul class="bourse-post-meta bourse-post-meta--small post-item-details__links ">
                                                        <li>
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                                        </li>
                                                        <li><span>دو روز پیش</span></li>
                                                        <li><span><?php echo read_time( $persian_slider[$i] )   . ' '. __('دقیقه مطالعه', 'persian_bourse'  );?></span></li>
                                                    </ul><!-- .bourse-post-meta -->
                                                </div><!-- .post-item-details -->
                                                <span class="post-item-like persian persian-like"></span>
                                            </div><!-- .tile-post__item -->
                                            <?php $j++; ?>
                                            <div class="tile-post__item tile-post__item--small">
                                                <img class="post-item-image"
                                                     src="<?php echo esc_url(get_the_post_thumbnail_url($persian_posts[$j]->ID)); ?>"
                                                     alt="<?php echo get_the_title($persian_posts[$j]->ID); ?>">
                                                <?php
                                                persian_get_category($persian_posts[$j]->ID, 'post-item-categories', 'post-item-category');
                                                ?>
                                                <div class="post-item-details">
                                                    <a class="post-item-details__title"
                                                       href="<?php echo esc_url(get_permalink($persian_posts[$j]->ID)); ?>">
                                                        <h5><?php echo esc_html(get_the_title($persian_posts[$j]->ID)); ?></h5>
                                                        <!-- .post-item-details__title -->
                                                    </a><!-- .post-item-details__title -->
                                                    <ul class="bourse-post-meta bourse-post-meta--small post-item-details__links ">
                                                        <li>
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                                        </li>
                                                        <li><span><?php echo human_time_diff( get_the_time('U', $persian_posts[$j]->ID ), current_time( 'U' ) ) .' '. __('پیش', 'persian_bourse'); ?></span></li>
                                                        <li><span><?php echo read_time( $persian_slider[$i] )   . ' '. __('دقیقه مطالعه', 'persian_bourse'  );?></span></li>
                                                    </ul><!-- .bourse-post-meta -->
                                                </div><!-- .post-item-details -->
                                                <span class="post-item-like persian persian-like"></span>
                                            </div><!-- .tile-post__item -->
                                        </div><!-- .tile-post-wrapper -->
                                    </div><!-- .swiper-slide -->
                                    <?php $j++; ?>
                                    <div class="swiper-slide">
                                        <div class="tile-post-wrapper">
                                            <div class="tile-post__item">
                                                <img class="post-item-image"
                                                     src="<?php echo esc_url(get_the_post_thumbnail_url($persian_posts[$j]->ID)); ?>"
                                                     alt="<?php echo get_the_title($persian_posts[$j]->ID); ?>">
                                                <?php
                                                persian_get_category($persian_posts[$j]->ID, 'post-item-categories', 'post-item-category');
                                                ?>
                                                <div class="post-item-details">
                                                    <a class="post-item-details__title" href="#">
                                                        <h5><?php echo get_the_title($persian_posts[$j]->ID); ?></h5>
                                                        <!-- .post-item-details__title -->
                                                    </a><!-- .post-item-details__title -->
                                                    <ul class="bourse-post-meta bourse-post-meta--small post-item-details__links">
                                                        <li>
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                                        </li>
                                                        <li><span><?php echo human_time_diff( get_the_time('U', $persian_posts[$j]->ID ), current_time( 'U' ) ) .' '. __('پیش', 'persian_bourse'); ?></span></li>
                                                        <li><span><?php echo read_time( $persian_slider[$i] )   . ' '. __('دقیقه مطالعه', 'persian_bourse'  );?></span></li>
                                                    </ul><!-- .bourse-post-meta -->
                                                </div><!-- .post-item-details -->
                                                <span class="post-item-like persian persian-like"></span>
                                            </div><!-- .tile-post__item -->
                                        </div><!-- .tile-post-wrapper -->
                                    </div><!-- .swiper-slide -->
                                <?php }
                                wp_reset_postdata();
                                }
                                ?>
                            </div><!-- .swiper-wrapper -->
                        </div><!-- .swiper-container -->
                    </div><!-- .container -->
                </div><!-- .tile-post -->
                <?php
                }
elseif(get_row_layout() == 'persian_ads') {

                    ?>
                    <div class="ads">
                        <div class="container">
                            <div>
                                <?php
                                $persian_ads_url = get_sub_field('persian_ads_url');
                                $persian_ads_img = get_sub_field('persian_Advertising_img');
                                $persian_ads_img_url = $persian_ads_img['url'];
                                $persian_ads_img_alt = $persian_ads_img['title'];
                                ?>
                                <a href="<?php echo esc_url($persian_ads_url); ?>">
                                    <img src="<?php echo esc_attr($persian_ads_img_url); ?>"
                                         alt="<?php echo esc_attr($persian_ads_img_alt); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
elseif (get_row_layout() == 'persian_news') {

                    ?>
                    <section class="last-post">
                        <div class="container">
                            <?php
                            $persian_news_title = get_sub_field('persian_news_title');
                            if ($persian_news_title) {
                                ?>
                                <div class="bourse-title">
                                    <h6><?php echo esc_html($persian_news_title); ?></h6>
                                    <a class="bourse-read-more" href="#"><?php _e('مشاهده بیشتر', 'persian_bourse'); ?>
                                        <i
                                                class="persian-arrow-left"></i></a>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row p30">
                                <div class="col-lg-12 col-24">
                                    <?php
                                    $persian_main_news = get_sub_field('persian_main_news');
                                    if ($persian_main_news) {
                                        foreach ($persian_main_news as $post) {
                                            setup_postdata($post);
                                            ?>
                                            <article class="last-post__item">
                                                <div class="post-meta-image-wrapper">
                                                    <div class="post-image">
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            ?>
                                                            <a href="<?php the_permalink() ?>">
                                                                <?php echo get_the_post_thumbnail(); ?>
                                                            </a>
                                                            <?php } ?>
                                    </div>
                                    <div class="post-study-time">
                                        <span><?php echo read_time( $post ); ?></span>
                                        <span><?php _e('دقیقه مطالعه', 'persian_bourse'); ?></span>
                                    </div>
                                    <div class="meta-background">
                                        <span class="persian-back-small"></span>
                                    </div>
                                </div><!-- .post-meta-image-wrapper -->
                                <div class="post-meta post-meta--large">
                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                        <li class="post-meta__date list-inline-item">
                                            <span><i class="persian-date"></i></span>
                                            <span>3 روز پیش</span>
                                        </li>
                                        <li class="post-meta__author list-inline-item">
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                <span><i class="persian-user"></i></span>
                                                <span><?php echo get_the_author(); ?></span>
                                            </a>
                                        </li>
                                        <li class="post-meta__view list-inline-item">
                                            <span><i class="persian-view"></i></span>
                                            <span>1590 بازدید</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <div class="post-title">
                                        <h5>
                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h5>
                                    </div><!-- .post-title -->
                                    <div class="post-excerpt">
                                        <p><?php echo ivahid_get_excerpt(100); ?></p>
                                    </div>
                                </div><!-- .post-content -->
                            </article><!-- .last-post__item -->
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                    <?php
                    $persian_other_news = get_sub_field('persian_other_news');
                    if ($persian_other_news) {
                        $i = 0;
                        foreach ($persian_other_news as $post) {
                            setup_postdata($post);
                            if ($i === 0) {
                                ?>
                                <article class="last-post__item last-post__item--small">
                                    <div class="post-content-image-wrapper">
                                        <div class="post-image">
                                            <?php
                                            if (has_post_thumbnail()) { ?>
                                                            <a href="<?php the_permalink() ?>">
                                                                <?php echo get_the_post_thumbnail(); ?>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div><!-- .post-image -->
                                                    <div class="post-content">
                                                        <div class="post-title">
                                                            <h5>
                                                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                            </h5>
                                                        </div><!-- .post-title -->
                                                        <div class="post-excerpt">
                                                            <p><?php echo ivahid_get_excerpt(100); ?></p>
                                                        </div>
                                                    </div><!-- .post-content -->
                                                </div><!-- .post-content-image-wrapper -->
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="post-meta">
                                                        <ul class="list-inline bourse-post-meta bourse-post-meta--small">
                                                            <li class="post-meta__date list-inline-item">
                                                                <span><i class="persian-date"></i></span>
                                                                <span>3 روز پیش</span>
                                                            </li>
                                                            <li class="post-meta__author list-inline-item">
                                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                                    <span><i class="persian-user"></i></span>
                                                                    <span><?php echo get_the_author(); ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="post-meta__view list-inline-item">
                                                                <span><i class="persian-view"></i></span>
                                                                <span>159 بازدید</span>
                                                            </li>
                                                            <li class="post-study-time list-inline-item">
                                                                <span><i class="persian-time"></i></span>
                                                                <span><span><?php echo read_time( $post ); ?></span> <?php _e('دقیقه مطالعه', 'persian_bourse'); ?></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="post-read-more">
                                                        <a href="<?php the_permalink(); ?>"><?php _e('ادامه مطلب', 'persian_bourse'); ?></a>
                                                    </div>
                                                </div>
                                            </article><!-- .last-post__item  -->
                                            <?php
                                $i = 1; }
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                </div><!-- .col-lg-12 -->
                <div class="col-lg-12 col-24">
                    <?php
                    $persian_other_news = get_sub_field('persian_other_news');
                    if ($persian_other_news) {
                        $j = 0;
                        foreach ($persian_other_news as $post) {
                            setup_postdata($post);
                            if ($j === 0) {
                                $j = 1;
                                continue;
                            }
                            ?>
                            <article class="last-post__item last-post__item--small">
                                <div class="post-content-image-wrapper">
                                    <div class="post-image">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
                                            <a href="<?php the_permalink() ?>">
                                                <?php echo get_the_post_thumbnail(); ?>
                                            </a>
                                            <?php } ?>
                                        ?>
                                    </div><!-- .post-image -->
                                    <div class="post-content">
                                        <div class="post-title">
                                            <h5>
                                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                            </h5>
                                        </div><!-- .post-title -->
                                        <div class="post-excerpt">
                                            <p><?php echo ivahid_get_excerpt(100); ?></p>
                                        </div>
                                    </div><!-- .post-content -->
                                </div><!-- .post-content-image-wrapper -->
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="post-meta">
                                        <ul class="list-inline bourse-post-meta bourse-post-meta--small">
                                            <li class="post-meta__date list-inline-item">
                                                <span><i class="persian-date"></i></span>
                                                <span>3 روز پیش</span>
                                            </li>
                                            <li class="post-meta__author list-inline-item">
                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                    <span><i class="persian-user"></i></span>
                                                    <span><?php echo get_the_author(); ?></span>
                                                </a>
                                            </li>
                                            <li class="post-meta__view list-inline-item">
                                                <span><i class="persian-view"></i></span>
                                                <span>159 بازدید</span>
                                            </li>
                                            <li class="post-study-time list-inline-item">
                                                <span><i class="persian-time"></i></span>
                                                <span><span><?php echo read_time($post); ?></span> <?php _e('دقیقه مطالعه', 'persian_bourse'); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-read-more">
                                        <a href="<?php the_permalink(); ?>"><?php _e('ادامه مطلب', 'persian_bourse'); ?></a>
                                    </div>
                                </div>
                            </article><!-- .last-post__item  -->
                            <?php
                        }
                        wp_reset_postdata();
                    }
    ?>
                    <?php
                    $persian_recommend_news = get_sub_field('persian_recommend_news');
                    if ($persian_recommend_news) {
                        foreach ($persian_recommend_news as $post) {
                            setup_postdata($post);
                            ?>

                                            <div class="last-post__suggestion d-flex align-items-center">
                                                <div class="suggestion-icon">
                                                    <span><i class="persian-fire"></i></span>
                                                </div>
                                                <div class="suggestion-title">
                                                    <p><?php _e('پیشنهاد ما به شما :', 'persian_bourse'); ?></p>
                                                    <p><?php _e('شاید خوشتان آمد!', 'persian_bourse'); ?></p>
                                                </div><!-- .suggestion-title -->
                                                <div class="suggestion-content d-flex align-items-center">
                                                    <div>
                                                        <p><?php the_title(); ?></p>
                                                        <p><?php echo ivahid_get_excerpt(50); ?></p>
                                                    </div>
                                                </div>
                                                <div class="suggest-link">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <span><i class="persian-left"></i></span>
                                                    </a>
                                                </div>
                                            </div><!-- .last-post__suggestion -->
                                            <?php
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div><!-- .col-lg-12 -->
                            </div><!-- .row -->
                        </div><!-- .container -->
                    </section><!-- .last-post -->
                    <?php
                }
elseif (get_row_layout() == 'persian_group') {
                    ?>
                    <section class="offer-posts">
                        <div class="container">
                            <div class="bourse-title bourse-title--blue">
                                <h6><?php
                                    $persian_group_title = get_sub_field('persian_bourse_group_title');
                                    if ($persian_group_title) {
                                        echo esc_html($persian_group_title);
                                    } ?></h6>
                                <a class="bourse-read-more"
                                   href="#"><?php echo esc_html(__('مشاهده بیشتر', 'persian_bourse')); ?><i
                                            class="persian-arrow-left"></i></a>
                            </div>
                            <?php
                            $persian_group_posts = get_sub_field('persian_bourse_group');
                            if ($persian_group_posts) {
                                ?>
                                <div class="offer-posts__slider-container">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php
                                            foreach ($persian_group_posts as $post) {
                                                setup_postdata($post);
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="offer-posts__item">
                                                        <div class="item-image">
                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                                <?php if (has_post_thumbnail()) {
                                                                    the_post_thumbnail();
                                                                } ?>
                                                            </a>
                                                        </div>
                                                        <div class="item-title">
                                                            <p>
                                                                <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a>
                                                            </p>
                                                        </div>
                                                        <?php if (has_excerpt()) { ?>
                                                            <div class="item-content">
                                                                <p><?php echo esc_html(ivahid_get_excerpt(100)); ?></p>
                                                            </div><!-- .item-content -->
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            wp_reset_postdata(); ?>
                                        </div>
                                    </div><!-- .swiper-container -->
                                </div><!-- .offer-posts__slider-container -->
                                <?php
                            }
                            ?>
                        </div>
                    </section><!-- .offer-posts -->

                    <?php
                }
elseif (get_row_layout() == 'persian_tools') {
                    ?>
                    <section class="services-slider">
                        <div class="container">
                            <?php
                            $persian_tools_title = get_sub_field('persian_tools_main_title');
                            if ($persian_tools_title) {
                                ?>
                                <div class="bourse-title bourse-title--blue">
                                    <h6><?php echo $persian_tools_title; ?></h6>
                                    <a class="bourse-read-more"
                                       href="#"><?php echo esc_html(__('مشاهده بیشتر', 'persian_bourse')); ?><i
                                                class="persian-arrow-left"></i></a>
                                </div>
                                <?php

                            }
                            ?>
                            <?php
                            $persian_tools = get_sub_field('persian_bourse_tools');
                            if ($persian_tools) {
                                ?>
                                <div class="services-slider__slider-container">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php
                                            if (have_rows('persian_bourse_tools')) {
                                                while (have_rows('persian_bourse_tools')) {
                                                    the_row();
                                                    $persian_tools_image = get_sub_field('persian_tools_image');

                                                    $persian_tool_title = get_sub_field('persian_tools_item_title');
                                                    $tool_item_title = $persian_tool_title['title'];
                                                    $tool_item_url = $persian_tool_title['url'];

                                                    $persian_tool_excerpt = get_sub_field('persian_tools_item_excerpt');
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <div class="services-container">
                                                            <div class="services-image">
                                                                <?php if ($persian_tools_image) { ?>
                                                                    <img src="<?php echo esc_url($persian_tools_image); ?>"
                                                                         alt="<?php echo esc_attr($tool_item_title); ?>">
                                                                <?php } ?>
                                                            </div>
                                                            <div class="services-content">
                                                                <div class="services-title">
                                                                    <?php if ($tool_item_title) { ?>
                                                                        <h4>
                                                                            <a href="<?php echo esc_url($tool_item_url); ?>"><?php echo esc_html($tool_item_title); ?></a>
                                                                        </h4>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="services-excerpt">
                                                                    <?php if ($persian_tool_excerpt) {
                                                                        echo $persian_tool_excerpt;
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div><!-- .services-slider__slider-container --> <?php
                            }
                            ?>
                        </div><!-- .container -->
                    </section><!-- .services-slider -->
                    <?php
                }
elseif (get_row_layout() == 'persian_comments_posts') {
                    ?>
                    <!-------------------------- Comments and posts --------------------------------->
                    <div class="comments-and-posts">
                        <div class="container">
                            <div class="row p30">
                                <?php
                                $comments_number = get_sub_field('main_page_comments');
                                if ($comments_number > 0) { ?>
                                    <div class="col-lg-12 col-24">
                                        <div class="comments">
                                            <?php
                                            $comments_title = get_sub_field('main_page_comments_title');
                                            if ($comments_title) {
                                                ?>
                                                <div class="bourse-title">
                                                    <h6><?php echo esc_html($comments_title); ?></h6>
                                                </div>
                                            <?php } ?>
                                            <div class="comments__wrapper">
                                                <?php
                                                $comments_number = get_sub_field('main_page_comments');
                                                $comments_args = [
                                                    'status' => 'approve',
                                                    'number' => $comments_number
                                                ];
                                                $comments = get_comments($comments_args);
                                                ?>
                                                <ul>
                                                    <?php foreach ($comments as $comment_item) { ?>
                                                        <li class="d-flex align-items-center">
                                                            <a href="<?php echo get_post_permalink($comment_item->comment_post_ID); ?>"
                                                               class="comment-profile-image">
                                                                <?php echo get_avatar($comment_item); ?>
                                                            </a>
                                                            <div class="comment-content">
                                                                <p><?php echo esc_html($comment_item->comment_author); ?></p>
                                                                <p><?php echo esc_html($comment_item->comment_content); ?></p>
                                                                <a href="<?php echo get_post_permalink($comment_item->comment_post_ID); ?>"
                                                                   class="view-more">
                                                                    <?php _e('مشاهده در مطلب', 'persian_bourse'); ?>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div><!-- .comments__wrapper -->
                                        </div><!-- .comments -->
                                    </div><!-- .col-lg-12 -->
                                <?php } ?>
                                <div class="col-lg-12 col-24">
                                    <div class="slider-post-small">
                                        <?php
                                        if (get_sub_field('main_page_most_visited_posts_title')) {
                                            $most_visited_post_title = get_sub_field('main_page_most_visited_posts_title');
                                            ?>
                                            <div class="bourse-title">
                                                <h6><?php echo esc_html($most_visited_post_title); ?></h6>
                                            </div>
                                        <?php } ?>
                                        <div class="slider-post-small-slider">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <?php $select_most_visited_posts = get_sub_field('main_page_most_visited_posts'); ?>
                                                    <?php
                                                    if ($select_most_visited_posts === 'select_from_category') {
                                                        $post_items_from_category = get_sub_field('most_visited_posts_from_category');
                                                        foreach ($post_items_from_category as $post) {
                                                            setup_postdata($post);
                                                            ?>
                                                            <div class="swiper-slide">
                                                                <?php if (has_post_thumbnail()) {
                                                                    the_post_thumbnail();
                                                                } ?>
                                                                <div class="slider-post-small__content">
                                                                    <div class="post-small-title">
                                                                        <p>
                                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                                                <?php echo esc_html(get_the_title()); ?>
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="slider-post-small__post-meta">
                                                                        <ul class="list-inline">
                                                                            <li class="meta-date list-inline-item">
                                                                                <span><i class="persian-date"></i></span>
                                                                                <span><?php the_date(); ?></span>
                                                                            </li>
                                                                            <li class="meta-author list-inline-item">
                                                                                <span><i class="persian-user"></i></span>
                                                                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                                                    <span><?php echo get_the_author(); ?></span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="meta-view list-inline-item">
                                                                                <span><i class="persian-view"></i></span>
                                                                                <span><?php echo ivahid_get_views(get_the_ID()) . __(' بازدید', 'persian_bourse'); ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                        wp_reset_postdata(); }
                                                    if ($select_most_visited_posts === 'select_by_number') {
                                                        $posts_number = get_sub_field('most_visited_posts_number');
                                                        $most_visited_posts_args = [
                                                            'posts_per_page' => $posts_number,
                                                            'meta_key' => 'views',
                                                            'orderby' => 'meta_value_num'
                                                        ];
                                                        $most_visited_posts_query = new WP_Query($most_visited_posts_args);
                                                        if ($most_visited_posts_query->have_posts()) {
                                                            while ($most_visited_posts_query->have_posts()) {
                                                                $most_visited_posts_query->the_post(); ?>
                                                                <div class="swiper-slide">
                                                                    <?php if (has_post_thumbnail()) {
                                                                        the_post_thumbnail();
                                                                    } ?>
                                                                    <div class="slider-post-small__content">
                                                                        <div class="post-small-title">
                                                                            <p>
                                                                                <a href="<?php echo get_the_permalink(); ?>">
                                                                                    <?php echo esc_html(get_the_title()); ?>
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                        <div class="slider-post-small__post-meta">
                                                                            <ul class="list-inline">
                                                                                <li class="meta-date list-inline-item">
                                                                                    <span><i class="persian-date"></i></span>
                                                                                    <span><?php the_date(); ?></span>
                                                                                </li>
                                                                                <li class="meta-author list-inline-item">
                                                                                    <span><i class="persian-view"></i></span>
                                                                                    <a href="<?php echo esc_html(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                                                        <span><?php echo get_the_author(); ?></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="meta-view list-inline-item">
                                                                                    <span><i class="persian-view"></i></span>
                                                                                    <span><?php echo ivahid_get_views(get_the_ID()) . __(' بازدید', 'persian_bourse'); ?></span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            wp_reset_postdata();
                                                        }
                                                    } ?>
                                                </div><!-- .swiper-wrapper -->
                                                <div class="post-slider-navigation post-slider-navigation--left">
                                                    <div class="navigation-button navigation-button--next"></div>
                                                    <div class="connector persian-connector">
                                                    </div>
                                                    <div class="navigation-button navigation-button--prev"></div>
                                                </div><!-- .post-slider-navigation -->
                                            </div><!-- .swiper-container -->
                                        </div><!-- .slider-post-small-slider -->
                                    </div><!-- .slider-post-small -->
                                </div><!-- .col-lg-12 -->
                            </div><!-- .row -->
                        </div><!-- .container -->
                    </div><!-- .comments-and-posts -->
                    <?php
                }
elseif ( get_row_layout() == 'persian_news_slider' ){
    $news_slider_title = get_sub_field('persian_news_slider_title');
    ?>
    <div class="post-slider">
        <div class="container">
            <div class="bourse-title">
    <?php if ( $news_slider_title ) {
        ?>
        <h6><?php echo esc_html($news_slider_title); ?></h6>
        <?php
    }
    ?>
                <a class="bourse-read-more" href="#"><?php _e( 'مشاهده بیشتر', 'persian_bourse' ); ?><i class="persian-arrow-left"></i></a>
            </div><!-- .bourse-title -->
            <div class="post-slider__slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $news_slider = get_sub_field( 'persian_news_slider_item' );
                        if ( $news_slider ) {

                            foreach ( $news_slider as $post ){
                                setup_postdata( $post );
                                $slider_en_title = get_field( 'persian_english_title', get_the_ID());
                                ?>
                                <div class="swiper-slide">
                                    <?php if ( has_post_thumbnail() ){
                                        echo get_the_post_thumbnail();
                                    } ?>
                                    <div class="post-slider-details">
                                        <div class="post-slider-details__content">
                                            <div class="post-slider-title">
                                                <a href="<?php echo get_the_permalink(); ?>">
                                                    <h5><?php the_title(); ?></h5>
                                                </a>
                                                <?php if ( $slider_en_title ){
                                                    ?>
                                                    <a href="<?php echo get_the_permalink(); ?>">
                                                        <span><?php echo esc_html($slider_en_title); ?></span>
                                                    </a>
                                    <?php
                                                } ?>
                                            </div><!-- .post-slider-title -->
                                        </div><!-- .post-slider-details__content -->
                                        <div class="post-slider-details__back">
                                            <span class="persian-back-large"></span>
                                        </div><!-- .post-slider-details__back -->
                                    </div><!-- .post-slider-details -->
                                    <div class="study-time">
                                        <span><?php echo read_time( $post ); ?></span>
                                        <span><?php _e( 'دقیقه مطالعه', 'persian_bourse' ); ?></span>
                                    </div><!-- .study-time -->
                                </div><!-- .swiper-slide -->
                                <?php
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </div><!-- .swiper-wrapper -->
                    <div class="post-slider-navigation">
                        <div class="navigation-button navigation-button--next"></div>
                        <div class="connector persian-connector">
                        </div>
                        <div class="navigation-button navigation-button--prev"></div>
                    </div><!-- .post-slider-navigation -->
                </div><!-- .swiper-container -->
            </div><!-- .post-slider__slider -->
        </div><!-- .container -->
    </div><!-- .post-slider -->

                <?php
            }
elseif ( get_row_layout() == 'persian_bourse_news' ) { ?>

    <!-------------------------- Bourse news and slider --------------------------------->
    <div class="bourse-news">
        <div class="container">
            <div class="row p30">
                <div class="col-xl-8">
                    <?php if ( is_active_sidebar( 'main_page_sidebar' ) ) {
                        dynamic_sidebar( 'main_page_sidebar' );
                    } ?>
                </div><!-- .col-xl-8 -->
                <div class="col-xl-16">
                    <div class="row p30">
                        <?php $bourse_news_posts_type = get_sub_field( 'persian_bourse_news_posts_type' ); ?>
                        <?php
                            if ( $bourse_news_posts_type === 'select_from_category' ) {
                                $bourse_news_posts = get_sub_field( 'bourse_news_form_category' );
                                    foreach ( $bourse_news_posts as $post ) {
                                        setup_postdata( $post ); ?>
                                            <div class="col-sm-12 col-24">
                                                <div class="post">
                                                <?php if ( has_post_thumbnail() ) { ?>
                                                    <div class="post__image">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="post__content">
                                                    <div class="post-title">
                                                        <p>
                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                            <?php echo esc_html( get_the_title() ); ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div class="post-meta">
                                                        <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                            <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                                <span><i class="persian-date"></i></span>
                                                                <span><?php echo human_time_diff( get_the_time('U'), current_time( 'U' ) ) .' ' . __('پیش', 'persian_bourse'); ?></span>
                                                            </li>
                                                            <li class="post-author d-inline-flex align-items-center list-inline-item">
                                                                <span><i class="persian-user"></i></span>
                                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <span><?php echo get_the_author(); ?></span></a>
                                                            </li>
                                                            <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                                <span><i class="persian-view"></i></span>
                                                                <span><?php echo ivahid_get_views(get_the_ID()) . __(' بازدید', 'persian_bourse'); ?></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            </div><!-- .col-sm-12 -->
                                        <?php
                                    }
                                    wp_reset_postdata();
                                 }elseif ( $bourse_news_posts_type === 'select_most_visited'  ) {
                                    $bourse_news_posts_number = get_sub_field( 'bourse_news_most_visited_posts_number' );
                                    $bourse_news_category_id = get_sub_field( 'bourse_news_most_visited_category' );
                                    $bourse_news_query_args = [
                                            'posts_per_page' => $bourse_news_posts_number,
                                            'cat'            => $bourse_news_category_id,
                                            'meta_key'       => 'views',
                                            'orderby'        => 'meta_value_num'
                                    ];
                                    $bourse_news_query = new WP_Query( $bourse_news_query_args );
                                    if ( $bourse_news_query->have_posts() ){
                                        while (  $bourse_news_query->have_posts() ) {
                                            $bourse_news_query->the_post(); ?>
                                            <div class="col-sm-12 col-24">
                                                <div class="post">
                                                    <?php if ( has_post_thumbnail() ) { ?>
                                                        <div class="post__image">
                                                            <?php the_post_thumbnail(); ?>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="post__content">
                                                        <div class="post-title">
                                                            <p>
                                                                <a href="<?php echo get_the_permalink(); ?>">
                                                                    <?php echo esc_html( get_the_title() ); ?>
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div class="post-meta">
                                                            <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                                <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                                    <span><i class="persian-date"></i></span>
                                                                    <span><?php echo human_time_diff( get_the_time('U'), current_time( 'U' ) ) .' ' . __('پیش', 'persian_bourse'); ?></span>
                                                                </li>
                                                                <li class="post-author d-inline-flex align-items-center list-inline-item">
                                                                    <span><i class="persian-user"></i></span>
                                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <span><?php echo get_the_author(); ?></span></a>
                                                                </li>
                                                                <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                                    <span><i class="persian-view"></i></span>
                                                                    <span><?php echo ivahid_get_views(get_the_ID()) . __(' بازدید', 'persian_bourse'); ?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col-sm-12 -->
                                            <?php
                                        }
                                        wp_reset_postdata();
                                    }
                                 }
                            ?>
                    </div><!-- .row -->
                </div><!-- .col-16 -->

            </div>
        </div>
    </div>
<?php }
                }
                }
                ?>

                <?php get_footer(); ?>
