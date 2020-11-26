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
                                    <span><?php echo ivahid_get_views( get_the_ID() ) . ' ' . __( 'بازدید', 'persian_bourse' ); ?></span>
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
    <?php if ( ! is_page() ) { ?>
        <section class="offer-posts">
        <div class="container">
            <div class="bourse-title bourse-title--blue">
                <h2><?php _e( 'مطالب <span>مرتبط</span>', 'persian_bourse' ); ?></h2>
                <?php
                    $offer_posts_categories = get_the_category();
//                    $offer_post_cat = get_category_link( $offer_posts_categories[0] );
                    $offer_posts_category_ids = [];
                    foreach ( $offer_posts_categories as $category_item ) {
                        $offer_posts_category_ids[] = $category_item->term_id;
                    }
                ?>
                <a class="bourse-read-more" href="<?php echo get_post_type_archive_link( 'post' ); ?>"><?php echo esc_html( __( 'مشاهده بیشتر', 'persian_bourse' ) ); ?><i class="persian-arrow-left"></i></a>
            </div>
            <?php
            $offer_posts_query_args = [
                    'posts_per_page' => 10,
                    'category__in'   => $offer_posts_category_ids
            ];
            $offer_posts_query = new WP_Query( $offer_posts_query_args );
            ?>
            <?php if ( $offer_posts_query->have_posts() ) {?>
                <div class="offer-posts__slider-container">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            while ( $offer_posts_query->have_posts() ) {
                                $offer_posts_query->the_post();
                                ?>
                                <div class="swiper-slide">
                                    <div class="offer-posts__item">
                                        <div class="item-image">
                                            <a href="<?php echo get_the_permalink(); ?>">
                                                <?php if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail();
                                                } ?>
                                            </a>
                                        </div>
                                        <div class="item-title">
                                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                                        </div>
                                        <div class="item-content">
                                            <p><?php echo ivahid_get_excerpt(100); ?></p>
                                        </div><!-- .item-content -->
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div><!-- .swiper-container -->
                </div><!-- .offer-posts__slider-container -->
            <?php } ?>
        </div>
    </section><!-- .offer-posts -->
    <?php }
} ?>