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

                <!-------------------------- Comments and posts --------------------------------->
                <div class="comments-and-posts">
                    <div class="container">
                        <div class="row p30">
                            <?php if ( get_field( 'main_page_comments' ) > 0 ) { ?>
                                <div class="col-lg-12 col-24">
                                    <div class="comments">
                                        <?php
                                            if ( get_field( 'main_page_comments_title' ) ) {
                                                $comments_title = get_field( 'main_page_comments_title' );
                                            ?>
                                            <div class="bourse-title">
                                                <h6><?php echo esc_html( $comments_title ); ?></h6>
                                            </div>
                                        <?php } ?>
                                        <div class="comments__wrapper">
                                            <?php
                                                $comments_number = get_field( 'main_page_comments' );
                                                $comments_args = [
                                                        'status' => 'approve',
                                                        'number' => $comments_number
                                                ];
                                                $comments = get_comments( $comments_args );
                                            ?>
                                            <ul>
                                                <?php foreach ( $comments as $comment_item ) { ?>
                                                    <li class="d-flex align-items-center">
                                                        <a href="<?php echo get_post_permalink( $comment_item->comment_post_ID ); ?>" class="comment-profile-image">
                                                            <?php echo get_avatar( $comment_item ); ?>
                                                        </a>
                                                        <div class="comment-content">
                                                            <p><?php echo esc_html( $comment_item->comment_author ); ?></p>
                                                            <p><?php echo esc_html( $comment_item->comment_content ); ?></p>
                                                            <a href="<?php echo get_post_permalink( $comment_item->comment_post_ID ); ?>" class="view-more">
                                                                <?php _e( 'مشاهده در مطلب', 'persian_bourse' ); ?>
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
                                    <div class="bourse-title">
                                        <h6>پربازدیدترین مطالب</h6>
                                    </div>
                                    <div class="slider-post-small-slider">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="./assets/img/slider-post-small.jpg" alt="slider post">
                                                    <div class="slider-post-small__content">
                                                        <div class="post-small-title">
                                                            <p><a href="#">ثبت افزایش سرمایه 328 میلیاردی غشهداب</a></p>
                                                        </div>
                                                        <div class="slider-post-small__post-meta">
                                                            <ul class="list-inline">
                                                                <li class="meta-date list-inline-item">
                                                                    <span><i class="persian-date"></i></span>
                                                                    <span>3 روز پیش</span>
                                                                </li>
                                                                <li class="meta-author list-inline-item">
                                                                    <span><i class="persian-view"></i></span>
                                                                    <a href="#">
                                                                        <span>وحید دانا فرد</span>
                                                                    </a>
                                                                </li>
                                                                <li class="meta-view list-inline-item">
                                                                    <span><i class="persian-view"></i></span>
                                                                    <span>1590 بازدید</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="./assets/img/slider-post-small.jpg" alt="slider post">
                                                    <div class="slider-post-small__content">
                                                        <div class="post-small-title">
                                                            <p><a href="#">ثبت افزایش سرمایه 328 میلیاردی غشهداب</a></p>
                                                        </div>
                                                        <div class="slider-post-small__post-meta">
                                                            <ul class="list-inline">
                                                                <li class="meta-date list-inline-item">
                                                                    <span><i class="persian-date"></i></span>
                                                                    <span>3 روز پیش</span>
                                                                </li>
                                                                <li class="meta-author list-inline-item">
                                                                    <span><i class="persian-user"></i></span>
                                                                    <a href="#">
                                                                        <span>وحید دانا فرد</span>
                                                                    </a>
                                                                </li>
                                                                <li class="meta-view list-inline-item">
                                                                    <span><i class="persian-view"></i></span>
                                                                    <span>1590 بازدید</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="./assets/img/slider-post-small.jpg" alt="slider post">
                                                    <div class="slider-post-small__content">
                                                        <div class="post-small-title">
                                                            <p><a href="#">ثبت افزایش سرمایه 328 میلیاردی غشهداب</a></p>
                                                        </div>
                                                        <div class="slider-post-small__post-meta">
                                                            <ul class="list-inline">
                                                                <li class="meta-date list-inline-item">
                                                                    <span><i class="persian-date"></i></span>
                                                                    <span>3 روز پیش</span>
                                                                </li>
                                                                <li class="meta-author list-inline-item">
                                                                    <span><i class="persian-user"></i></span>
                                                                    <a href="#">
                                                                        <span>وحید دانا فرد</span>
                                                                    </a>
                                                                </li>
                                                                <li class="meta-view list-inline-item">
                                                                    <span><i class="persian-view"></i></span>
                                                                    <span>1590 بازدید</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
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

                <?php get_footer(); ?>
