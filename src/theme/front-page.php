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
                                    <?php
                                        if ( get_field( 'main_page_most_visited_posts_title' ) ) {
                                            $most_visited_post_title = get_field( 'main_page_most_visited_posts_title' );
                                        ?>
                                            <div class="bourse-title">
                                                <h6><?php echo esc_html( $most_visited_post_title ); ?></h6>
                                            </div>
                                        <?php } ?>
                                    <div class="slider-post-small-slider">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php $select_most_visited_posts = get_field( 'main_page_most_visited_posts' ); ?>
                                                <?php
                                                if ( $select_most_visited_posts === 'select_from_category' ) {
                                                     $post_items_from_category = get_field( 'most_visited_posts_from_category' );
//                                                     persian_var_dump( $post_items_from_category );
                                                     foreach ( $post_items_from_category as $post ) {
                                                         setup_postdata( $post );
                                                         ?>
                                                         <div class="swiper-slide">
                                                             <?php if ( has_post_thumbnail( ) ) {
                                                                 the_post_thumbnail();
                                                             } ?>
                                                             <div class="slider-post-small__content">
                                                                 <div class="post-small-title">
                                                                     <p>
                                                                         <a href="<?php echo get_the_permalink(); ?>">
                                                                             <?php echo esc_html( get_the_title() ); ?>
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
                                                                             <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                                                                 <span><?php echo get_the_author(); ?></span>
                                                                             </a>
                                                                         </li>
                                                                         <li class="meta-view list-inline-item">
                                                                             <span><i class="persian-view"></i></span>
                                                                             <span><?php echo ivahid_get_views( get_the_ID() ) . __( ' بازدید', 'persian_bourse' ); ?></span>
                                                                         </li>
                                                                     </ul>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     <?php }
                                                     wp_reset_postdata();
                                                     } ?>
                                                <?php
                                                if ( $select_most_visited_posts === 'select_by_number' ) {
                                                    $posts_number = get_field( 'most_visited_posts_number' );
                                                    $most_visited_posts_args = [
                                                        'type'           => 'post',
                                                        'posts_per_page' => $posts_number,
                                                        'meta_key'       => 'views',
                                                        'orderby'        => 'meta_value_num'
                                                    ];
                                                    $most_visited_posts_query = new WP_Query( $most_visited_posts_args );
                                                    if ( $most_visited_posts_query->have_posts() ) {
                                                        while ( $most_visited_posts_query->have_posts() ) {
                                                            $most_visited_posts_query->the_post(); ?>
                                                                <div class="swiper-slide">
                                                                <?php if ( has_post_thumbnail() ) {
                                                                    the_post_thumbnail();
                                                                } ?>
                                                                <div class="slider-post-small__content">
                                                                    <div class="post-small-title">
                                                                        <p>
                                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                                                <?php echo esc_html( get_the_title() ); ?>
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
                                                                                <a href="<?php echo esc_html( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                                                                    <span><?php echo get_the_author(); ?></span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="meta-view list-inline-item">
                                                                                <span><i class="persian-view"></i></span>
                                                                                <span><?php echo ivahid_get_views( get_the_ID() ) . __( ' بازدید', 'persian_bourse' ); ?></span>
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

                <!-------------------------- Bourse news and slider --------------------------------->
                <div class="post-slider">
                    <div class="container">
                        <div class="bourse-title">
                            <h6>اخبار بورس</h6>
                            <a class="bourse-read-more" href="#">مشاهده بیشتر<i class="persian-arrow-left"></i></a>
                        </div><!-- .bourse-title -->
                        <div class="post-slider__slider">
                            <div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-rtl">
                                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                    <div class="swiper-slide swiper-slide-active" style="width: 1170px;">
                                        <img src="../assets/img/post-slider-image.jpg" alt="news slider">
                                        <div class="post-slider-details">
                                            <div class="post-slider-details__content">
                                                <div class="post-slider-title">
                                                    <a href="#">
                                                        <h5>تولیدات مدل‌های جدید سری می میکس</h5>
                                                    </a>
                                                    <a href="#">
                                                        <span>Production of new models of Mi Mix series</span>
                                                    </a>
                                                </div><!-- .post-slider-title -->
                                            </div><!-- .post-slider-details__content -->
                                            <div class="post-slider-details__back">
                                                <span class="persian-back-large"></span>
                                            </div><!-- .post-slider-details__back -->
                                        </div><!-- .post-slider-details -->
                                        <div class="study-time">
                                            <span>5</span>
                                            <span>دقیقه مطالعه</span>
                                        </div><!-- .study-time -->
                                    </div><!-- .swiper-slide -->
                                    <div class="swiper-slide swiper-slide-next" style="width: 1170px;">
                                        <img src="../assets/img/post-slider-image.jpg" alt="news slider">
                                        <div class="post-slider-details">
                                            <div class="post-slider-details__content">
                                                <div class="post-slider-title">
                                                    <a href="#">
                                                        <h5>تولیدات مدل‌های جدید سری می میکس</h5>
                                                    </a>
                                                    <a href="#">
                                                        <span>Production of new models of Mi Mix series</span>
                                                    </a>
                                                </div><!-- .post-slider-title -->
                                            </div><!-- .post-slider-details__content -->
                                            <div class="post-slider-details__back">
                                                <span class="persian-back-large"></span>
                                            </div><!-- .post-slider-details__back -->
                                        </div><!-- .post-slider-details -->
                                        <div class="study-time">
                                            <span>5</span>
                                            <span>دقیقه مطالعه</span>
                                        </div><!-- .study-time -->
                                    </div><!-- .swiper-slide -->
                                    <div class="swiper-slide" style="width: 1170px;">
                                        <img src="../assets/img/post-slider-image.jpg" alt="news slider">
                                        <div class="post-slider-details">
                                            <div class="post-slider-details__content">
                                                <div class="post-slider-title">
                                                    <a href="#">
                                                        <h5>تولیدات مدل‌های جدید سری می میکس</h5>
                                                    </a>
                                                    <a href="#">
                                                        <span>Production of new models of Mi Mix series</span>
                                                    </a>
                                                </div><!-- .post-slider-title -->
                                            </div><!-- .post-slider-details__content -->
                                            <div class="post-slider-details__back">
                                                <span class="persian-back-large"></span>
                                            </div><!-- .post-slider-details__back -->
                                        </div><!-- .post-slider-details -->
                                        <div class="study-time">
                                            <span>5</span>
                                            <span>دقیقه مطالعه</span>
                                        </div><!-- .study-time -->
                                    </div><!-- .swiper-slide -->
                                </div><!-- .swiper-wrapper -->
                                <div class="post-slider-navigation">
                                    <div class="navigation-button navigation-button--next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                    <div class="connector persian-connector">
                                    </div>
                                    <div class="navigation-button navigation-button--prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                                </div><!-- .post-slider-navigation -->
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><!-- .swiper-container -->
                        </div><!-- .post-slider__slider -->
                    </div><!-- .container -->
                </div>

                <div class="bourse-news">
                    <div class="container">
                        <div class="row p30">
                            <div class="col-xl-8">
                                <?php if ( is_active_sidebar( 'main_page_sidebar' ) ) {
                                    dynamic_sidebar( 'main_page_sidebar' );
                                } ?>
                                <div data-tabindex="side-tab" class="side-tab">
                                    <div class="tab-title side-tab__tab-links">
                                        <div data-tab="side-tab-link-1" data-parent="side-tab" class="active">آخرین مطالب</div>
                                        <div data-tab="side-tab-link-2" data-parent="side-tab">مطالب جدید</div>
                                        <div data-tab="side-tab-link-3" data-parent="side-tab">اطلاعیه مهم</div>
                                    </div><!-- .side-tab__tab_links -->
                                    <div class="tab-content">
                                        <div class="side-tab__tab-content active" data-tabc="side-tab-link-1" data-parent="side-tab" style="">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <h6>انعقاد قرارداد دولتی در قزوین</h6>
                                                    </a>
                                                    <p>انعقاد قرارداد دولتی در قزوین به گزارش پرشین بورس، شرکت کارخانجات قند قزوين
                                                        (سهامی
                                                        عام) با نماد قزوین، اخذ قرارداد ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>افزایش 22 درصدی نرخ فروش فروس</h6>
                                                    </a>
                                                    <p>افزایش 22 درصدی نرخ فروش فروس به گزارش پرشین بورس، شرکت فروسيليس ايران (سهامی
                                                        عام) با
                                                        نماد فروس، از دریافت ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>سودآوری میلیاردی کاما از فروش فروی</h6>
                                                    </a>
                                                    <p>سودآوری میلیاردی کاما از فروش فروی به گزارش پرشین بورس، شرکت باما (سهامی عام) با
                                                        نماد
                                                        کاما، از فروش ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>سودآوری میلیاردی کاما از فروش فروی</h6>
                                                    </a>
                                                    <p>سودآوری میلیاردی کاما از فروش فروی به گزارش پرشین بورس، شرکت باما (سهامی عام) با
                                                        نماد
                                                        کاما، از فروش ...</p>
                                                </li>
                                            </ul>
                                        </div><!-- .side-tab__tab-content -->
                                        <div data-tabc="side-tab-link-2" data-parent="side-tab" class="side-tab__tab-content" style="display: none;">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <h6>انعقاد قرارداد دولتی در قزوین2</h6>
                                                    </a>
                                                    <p>انعقاد قرارداد دولتی در قزوین به گزارش پرشین بورس، شرکت کارخانجات قند قزوين
                                                        (سهامی
                                                        عام) با نماد قزوین، اخذ قرارداد ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>افزایش 22 درصدی نرخ فروش فروس</h6>
                                                    </a>
                                                    <p>افزایش 22 درصدی نرخ فروش فروس به گزارش پرشین بورس، شرکت فروسيليس ايران (سهامی
                                                        عام) با
                                                        نماد فروس، از دریافت ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>سودآوری میلیاردی کاما از فروش فروی</h6>
                                                    </a>
                                                    <p>سودآوری میلیاردی کاما از فروش فروی به گزارش پرشین بورس، شرکت باما (سهامی عام) با
                                                        نماد
                                                        کاما، از فروش ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>سودآوری میلیاردی کاما از فروش فروی</h6>
                                                    </a>
                                                    <p>سودآوری میلیاردی کاما از فروش فروی به گزارش پرشین بورس، شرکت باما (سهامی عام) با
                                                        نماد
                                                        کاما، از فروش ...</p>
                                                </li>
                                            </ul>
                                        </div><!-- .side-tab__tab-content -->
                                        <div data-tabc="side-tab-link-3" data-parent="side-tab" class="side-tab__tab-content" style="display: none;">
                                            <!-- .side-tab__tab-content -->
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <h6>انعقاد قرارداد دولتی در قزوین3</h6>
                                                    </a>
                                                    <p>انعقاد قرارداد دولتی در قزوین به گزارش پرشین بورس، شرکت کارخانجات قند قزوين
                                                        (سهامی
                                                        عام) با نماد قزوین، اخذ قرارداد ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>افزایش 22 درصدی نرخ فروش فروس</h6>
                                                    </a>
                                                    <p>افزایش 22 درصدی نرخ فروش فروس به گزارش پرشین بورس، شرکت فروسيليس ايران (سهامی
                                                        عام) با
                                                        نماد فروس، از دریافت ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>سودآوری میلیاردی کاما از فروش فروی</h6>
                                                    </a>
                                                    <p>سودآوری میلیاردی کاما از فروش فروی به گزارش پرشین بورس، شرکت باما (سهامی عام) با
                                                        نماد
                                                        کاما، از فروش ...</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <h6>سودآوری میلیاردی کاما از فروش فروی</h6>
                                                    </a>
                                                    <p>سودآوری میلیاردی کاما از فروش فروی به گزارش پرشین بورس، شرکت باما (سهامی عام) با
                                                        نماد
                                                        کاما، از فروش ...</p>
                                                </li>
                                            </ul>
                                        </div><!-- .side-tab__tab-content -->
                                    </div><!-- .tab-content -->
                                </div><!-- .side-tab -->
                                <div class="side-populars">
                                    <div class="title title--blue title--small">
                                        <h6><span>پربازدیدترین </span>مطالب</h6>
                                        <a href="#">آرشیو</a>
                                    </div><!-- .title -->
                                    <ul class="side-populars__items-wrapper">
                                        <li>
                                            <div class="img-wrapper">
                                                <img src="../assets/img/side-populars/side-populars-img1.jpg" alt="post image">
                                            </div><!-- .img-wrapper -->
                                            <div class="post-details">
                                                <a href="#">
                                                    <h6>تحلیل تکنیکال لوتوس</h6>
                                                </a>
                                                <p>5 روز پیش</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="img-wrapper">
                                                <img src="../assets/img/side-populars/side-populars-img2.jpg" alt="post image">
                                            </div><!-- .img-wrapper -->
                                            <div class="post-details">
                                                <a href="#">
                                                    <h6>انجام مقدمات افزایش سرمایه</h6>
                                                </a>
                                                <p>یک هفته پیش</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="img-wrapper">
                                                <img src="../assets/img/side-populars/side-populars-img3.jpg" alt="post image">
                                            </div><!-- .img-wrapper -->
                                            <div class="post-details">
                                                <a href="#">
                                                    <h6>انرژی در مزایده فرابورس شرکت ...</h6>
                                                </a>
                                                <p>یک ماه پیش</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .side-populars -->
                                <div class="side-video">
                                    <div class="side-video__title">
                                        <h6>ویدیو آموزشی</h6>
                                        <a href="#">آرشیو ویدیو ها</a>
                                    </div><!-- .side-video__title -->
                                    <div class="side-video__content">
                                        <div class="poster-wrapper">
                                            <img src="../assets/img/video-post-poster.jpg" alt="video post poster">
                                            <a href="#">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div><!-- .poster-wrapper -->
                                        <h6 class="video-post-title">
                                            <a href="#">اموزش الگوی ماشین در جدول بورس !</a>
                                        </h6>
                                        <ul class="video-post-meta">
                                            <li><span><i class="persian-date"></i></span><span>3 روز پیش</span></li>
                                            <li><span><i class="persian-user"></i></span><span><a href="#">وحید دانا فرد</a></span></li>
                                            <li><span><i class="persian-view"></i></span><span>1590 بازدید</span></li>
                                        </ul>
                                    </div><!-- .side-video__content -->
                                </div><!-- .side-video -->
                            </div><!-- .col-xl-8 -->
                            <div class="col-xl-16">
                                <div class="row p30">
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_1.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">تولیدات مدل‌های جدید سری می میکس</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>3 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"> <span>وحید دانا فرد</span></a>
                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>1590 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_2.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">وضعیت بازار بیت کوین در سال 2020</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>6 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">

                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"><span>وحید دانا فرد</span></a>

                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>2560 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_3.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">تلاش چین برای تبدیل شدن به قدرت برتر بلاک چین</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>7 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">

                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"><span>وحید دانا فرد</span></a>

                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>6522 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_4.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">آیا کامپیوتر های کوانتمی میتوانند بیت کوین را شک...</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>9 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">

                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"> <span>وحید دانا فرد</span></a>

                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>1590 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_5.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">آمار جدید از آخرین قیمت ارزهای دیجیتالی</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>2 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">

                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"> <span>وحید دانا فرد</span></a>

                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>154 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_6.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">احتمال سقوط بیشتر بیت کوین وجود دارد!</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>2 روز پیش</span>
                                                        </li>
                                                        <li class="post-author list-inline-item">
                                                            <a href="#">
                                                                <span><i class="persian-user"></i></span>
                                                                <span>وحید دانا فرد</span>
                                                            </a>
                                                        </li>
                                                        <li class="post-view list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>256 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_7.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">علاقه شدید مردم ترکیه به بیت کوین در پی تورم</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>3 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">

                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"> <span>وحید دانا فرد</span>
                                                            </a>
                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>1590 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                    <div class="col-sm-12 col-24">
                                        <div class="post">
                                            <div class="post__image">
                                                <img src="./assets/img/posts/post_1.jpg" alt="post">
                                            </div>
                                            <div class="post__content">
                                                <div class="post-title">
                                                    <p><a href="#">تولیدات مدل‌های جدید سری می میکس</a></p>
                                                </div>
                                                <div class="post-meta">
                                                    <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                        <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-date"></i></span>
                                                            <span>3 روز پیش</span>
                                                        </li>
                                                        <li class="post-author d-inline-flex align-items-center list-inline-item">

                                                            <span><i class="persian-user"></i></span>
                                                            <a href="#"> <span>وحید دانا فرد</span>
                                                            </a>
                                                        </li>
                                                        <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                            <span><i class="persian-view"></i></span>
                                                            <span>1590 بازدید</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col-sm-12 -->
                                </div><!-- .row -->
                            </div><!-- .col-16 -->
                        </div>
                    </div>
                </div>

                <?php get_footer(); ?>
