<?php ivahid_set_views(); ?>
<?php if ( is_single() || is_search() ){
    ?>
    <section class="last-post last-post--single">
        <div class="container">
            <div class="row p30">
                <div class="col-lg-12 col-24">
                    <article class="last-post__item">
                        <div class="post-meta-image-wrapper">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="post-image">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <figure>
                                            <?php the_post_thumbnail( 'large_post_image' ); ?>
                                        </figure>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="post-study-time">
                                <span><?php echo read_time( $post ); ?></span>
                                <span><?php _e( 'دقیقـه مطالعه', 'persian_bourse' ); ?></span>
                            </div>
                            <div class="meta-background">
                                <span class="persian-back-small"></span>
                            </div>
                        </div><!-- .post-meta-image-wrapper -->
                        <div class="post-meta post-meta--large">
                            <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                <li class="post-meta__date list-inline-item">
                                    <span><i class="persian-date"></i></span>
                                    <span><?php echo human_time_diff(get_the_time('U' ), current_time('U')) . ' ' . __('پیش', 'persian_bourse'); ?></span>
                                </li>
                                <li class="post-meta__author list-inline-item">
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                        <span><i class="persian-user"></i></span>
                                        <span><?php echo get_the_author(); ?></span>
                                    </a>
                                </li>
                                <li class="post-meta__view list-inline-item">
                                    <span><i class="persian-view"></i></span>
                                    <span><?php echo ivahid_get_views( get_the_ID() ) . __( 'بازدید ', 'persian_bourse' ); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-title">
                                <h5>
                                    <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                                </h5>
                            </div><!-- .post-title -->
                            <div class="post-excerpt">
                                <?php if ( class_exists( 'ACF' ) ){?>
                                    <?php
                                    if ( get_field( 'persian_english_title' ) ){
                                        $english_title = get_field( 'persian_english_title' );
                                        ?>
                                        <p>
                                            <?php echo esc_html( $english_title ); ?>
                                        </p>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div><!-- .post-content -->
                    </article><!-- .last-post__item -->
                </div><!-- .col-lg-12 -->
                <div class="col-lg-12 col-24">
                    <?php if ( is_singular() || is_search()  ) { ?>
                        <div class="last-post__excerpt">
                            <?php echo ivahid_get_excerpt(100); ?>
                        </div>
                    <?php } ?>

                </div><!-- .col-lg-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .last-post -->
<?php
}elseif ( is_page() ){
    ?>
    <div class="container">
        <h1 class="page-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>
    </div>
<?php
}
?>
<?php if ( ! is_search() ){
    ?>
    <div class="container">
        <div class="row">
            <div class="single-content">
                <?php the_content(); ?>
            </div><!-- .single-content -->
        </div><!-- .row -->
    </div><!-- .container -->

    <div class="suggest-bourse suggest-bourse--single">
        <div class="container">
            <div class="bourse-title bourse-title--blue">
                <h6>سبد <span>سهام</span></h6>
                <a class="bourse-read-more" href="#">مشاهده بیشتر<i class="persian-arrow-left"></i></a>
            </div>
            <div class="suggest-bourse__slider-container">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="suggest-bourse__item-wrapper">
                                <div class="suggest-bourse-img-wrapper">
                                    <img src="./assets/img/suggest-bourse/suggest-bourse-1.jpg" alt="bourse item">
                                </div><!-- .suggest-bourse-img-wrapper -->
                                <div class="suggest-bourse-details">
                                    <a href="#">
                                        <h6>خبر فارسی</h6>
                                    </a>
                                    <p>3 روز پیش</p>
                                </div><!-- .suggest-bourse-details -->
                                <div class="suggest-bourse-read-more">
                                    <a href="#">مشاهده</a>
                                </div><!-- .suggest-bourse-read-more -->
                            </div><!-- .suggest-bourse__item-wrapper -->
                        </div><!-- .swiper-slide -->
                        <div class="swiper-slide">
                            <div class="suggest-bourse__item-wrapper">
                                <div class="suggest-bourse-img-wrapper">
                                    <img src="./assets/img/suggest-bourse/suggest-bourse-2.jpg" alt="bourse item">
                                </div><!-- .suggest-bourse-img-wrapper -->
                                <div class="suggest-bourse-details">
                                    <a href="#">
                                        <h6>دیجی کالا</h6>
                                    </a>
                                    <p>5 روز پیش</p>
                                </div><!-- .suggest-bourse-details -->
                                <div class="suggest-bourse-read-more">
                                    <a href="#">مشاهده</a>
                                </div><!-- .suggest-bourse-read-more -->
                            </div><!-- .suggest-bourse__item-wrapper -->
                        </div><!-- .swiper-slide -->
                        <div class="swiper-slide">
                            <div class="suggest-bourse__item-wrapper">
                                <div class="suggest-bourse-img-wrapper">
                                    <img src="./assets/img/suggest-bourse/suggest-bourse-3.jpg" alt="bourse item">
                                </div><!-- .suggest-bourse-img-wrapper -->
                                <div class="suggest-bourse-details">
                                    <a href="#">
                                        <h6>فارسروید</h6>
                                    </a>
                                    <p>8 روز پیش</p>
                                </div><!-- .suggest-bourse-details -->
                                <div class="suggest-bourse-read-more">
                                    <a href="#">مشاهده</a>
                                </div><!-- .suggest-bourse-read-more -->
                            </div><!-- .suggest-bourse__item-wrapper -->
                        </div><!-- .swiper-slide -->
                        <div class="swiper-slide">
                            <div class="suggest-bourse__item-wrapper">
                                <div class="suggest-bourse-img-wrapper">
                                    <img src="./assets/img/suggest-bourse/suggest-bourse-4.jpg" alt="bourse item">
                                </div><!-- .suggest-bourse-img-wrapper -->
                                <div class="suggest-bourse-details">
                                    <a href="#">
                                        <h6>گلدیران</h6>
                                    </a>
                                    <p>2 روز پیش</p>
                                </div><!-- .suggest-bourse-details -->
                                <div class="suggest-bourse-read-more">
                                    <a href="#">مشاهده</a>
                                </div><!-- .suggest-bourse-read-more -->
                            </div><!-- .suggest-bourse__item-wrapper -->
                        </div><!-- .swiper-slide -->
                        <div class="swiper-slide">
                            <div class="suggest-bourse__item-wrapper">
                                <div class="suggest-bourse-img-wrapper">
                                    <img src="./assets/img/suggest-bourse/suggest-bourse-5.jpg" alt="bourse item">
                                </div><!-- .suggest-bourse-img-wrapper -->
                                <div class="suggest-bourse-details">
                                    <a href="#">
                                        <h6>آی وحید</h6>
                                    </a>
                                    <p>4 روز پیش</p>
                                </div><!-- .suggest-bourse-details -->
                                <div class="suggest-bourse-read-more">
                                    <a href="#">مشاهده</a>
                                </div><!-- .suggest-bourse-read-more -->
                            </div><!-- .suggest-bourse__item-wrapper -->
                        </div><!-- .swiper-slide -->
                        <div class="swiper-slide">
                            <div class="suggest-bourse__item-wrapper">
                                <div class="suggest-bourse-img-wrapper">
                                    <img src="./assets/img/suggest-bourse/suggest-bourse-6.jpg" alt="bourse item">
                                </div><!-- .suggest-bourse-img-wrapper -->
                                <div class="suggest-bourse-details">
                                    <a href="#">
                                        <h6>زرین پال</h6>
                                    </a>
                                    <p>8 روز پیش</p>
                                </div><!-- .suggest-bourse-details -->
                                <div class="suggest-bourse-read-more">
                                    <a href="#">مشاهده</a>
                                </div><!-- .suggest-bourse-read-more -->
                            </div><!-- .suggest-bourse__item-wrapper -->
                        </div><!-- .swiper-slide -->
                    </div><!-- .swiper-wrapper -->
                </div><!-- .swiper-container -->
            </div><!-- .suggest-bourse__slider-container -->
        </div><!-- .container -->
    </div><!-- .suggest-bourse -->
<?php
} ?>