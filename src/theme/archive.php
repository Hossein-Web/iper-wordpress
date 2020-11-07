<?php get_header(); ?>
<div class="bourse-news">
    <div class="container">
        <div class="row p30">
            <div class="col-xl-8">
                <?php if ( is_active_sidebar( 'archive_page_sidebar' ) ) {
                    dynamic_sidebar( 'archive_page_sidebar' );
                } ?>
                <div class="side-categories">
                    <h6 class="categories-title">دسته بندی ها</h6>
                    <ul>
                        <li><a href="#">اخبار</a></li>
                        <li><a href="#">آموزش بورس</a></li>
                        <li class="has-subcategory">
                            <span>اقتصاد</span>
                            <ul>
                                <li><a href="#">افزایش سرمایه</a></li>
                                <li><a href="#">تاریخ مجامع</a></li>
                                <li><a href="#">سود تقسیمی مجامع</a></li>
                            </ul>
                        </li><!-- .has-subcategory -->
                        <li><a href="#">عرضه اولیه</a></li>
                        <li><a href="#">عملکرد مالی</a></li>
                        <li><a href="#">شرکت های بورسی</a></li>
                        <li><a href="#">تماس با سرمایه نیوز</a></li>
                    </ul>
                </div><!-- .side-categories -->
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
                    <?php
                        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $archive_args = [
                                    'post_type'      => 'post',
                                    'posts_per_page' => 1
                                ];
                        $persian_archive_query = new WP_Query( $archive_args );
                    ?>
                    <?php if ( $persian_archive_query->have_posts() ) {
                        while ( $persian_archive_query->have_posts() ) {
                            $persian_archive_query->the_post();
                            ?>
                            <div class="col-sm-12 col-24">
                                <div class="post">
                                    <?php if ( has_post_thumbnail() ){ ?>
                                        <div class="post__image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="post__content">
                                        <div class="post-title">
                                            <p>
                                                <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                                            </p>
                                        </div>
                                        <div class="post-meta">
                                            <ul class="list-inline bourse-post-meta bourse-post-meta--medium">
                                                <li class="post-date d-inline-flex align-items-center list-inline-item">
                                                    <span><i class="persian-date"></i></span>
                                                    <span><?php the_date(); ?></span>
                                                </li>
                                                <li class="post-author d-inline-flex align-items-center list-inline-item">
                                                    <span><i class="persian-user"></i></span>
                                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                                        <span><?php echo get_the_author(); ?></span>
                                                    </a>
                                                </li>
                                                <li class="post-view d-inline-flex align-items-center list-inline-item">
                                                    <span><i class="persian-view"></i></span>
                                                    <span><?php echo ivahid_get_views( get_the_ID() ) . __( 'بازدید', 'persian_bourse' ); ?></span>
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
                    ?>
                    <div class="col-24">
                        <div class="bourse-news__bourse-pagination">
                            <?php do_action( 'pagination', 1, 2, '<i class="persian-angle-right"></i>', '<i class="persian-angle-left"></i>', $persian_archive_query ); ?>
                            <div class="other-pages">
                                <a href="#">
                                    <p><?php _e( 'سایر', 'persian_bourse' ); ?></p>
                                    <p><?php _e( 'صفحه ها', 'persian_bourse' ); ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- .col-16 -->
        </div>
    </div>
</div><!-- .bourse-news -->
<div class="suggest-bourse">
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
                                <img src="../assets/img/suggest-bourse/suggest-bourse-1.jpg" alt="bourse item">
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
                                <img src="../assets/img/suggest-bourse/suggest-bourse-2.jpg" alt="bourse item">
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
                                <img src="../assets/img/suggest-bourse/suggest-bourse-3.jpg" alt="bourse item">
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
                                <img src="../assets/img/suggest-bourse/suggest-bourse-4.jpg" alt="bourse item">
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
                                <img src="../assets/img/suggest-bourse/suggest-bourse-5.jpg" alt="bourse item">
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
                                <img src="../assets/img/suggest-bourse/suggest-bourse-6.jpg" alt="bourse item">
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
<?php get_footer(); ?>
