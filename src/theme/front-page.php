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
$persian_slider_type = get_field('persian_slider_type');

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

if ($persian_slider_type == 'select'){
$persian_slider = get_field('persian_main_slider');
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
                                            <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
                                        </li>
                                        <li><span>دو روز پیش</span></li>
                                        <li><span>5 دقیقه مطالعه</span></li>
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
                                            <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
                                        </li>
                                        <li><span>دو روز پیش</span></li>
                                        <li><span>5 دقیقه مطالعه</span></li>
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
                                            <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
                                        </li>
                                        <li><span>دو روز پیش</span></li>
                                        <li><span>5 دقیقه مطالعه</span></li>
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
                                for ($j = 0; $j < count($persian_posts); $j++) { ?>
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
                                                            <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
                                                        </li>
                                                        <li><span>دو روز پیش</span></li>
                                                        <li><span>5 دقیقه مطالعه</span></li>
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
                                                            <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
                                                        </li>
                                                        <li><span>دو روز پیش</span></li>
                                                        <li><span>5 دقیقه مطالعه</span></li>
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
                                                            <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
                                                        </li>
                                                        <li><span>دو روز پیش</span></li>
                                                        <li><span>5 دقیقه مطالعه</span></li>
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
                <div class="ads">
                    <div class="container">
                        <div>
                            <?php
                            $persian_ads_url = get_field( 'persian_ads_url' );
                            $persian_ads_img = get_field( 'persian_Advertising_img' );
                            $persian_ads_img_url = $persian_ads_img['url'];
                            $persian_ads_img_alt = $persian_ads_img['title'];
                            ?>
                            <a href="<?php echo esc_url( $persian_ads_url ); ?>">
                                <img src="<?php echo esc_attr( $persian_ads_img_url ); ?>" alt="<?php echo esc_attr( $persian_ads_img_alt ); ?>">
                            </a>
                        </div>
                    </div>
                </div>
                <?php get_footer(); ?>
