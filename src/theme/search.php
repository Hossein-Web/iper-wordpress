<?php get_header(); ?>

<div class="container">
    <h2 class="page-title">
        <?php _e( 'نتایج جستجو برای: ', 'persian_bourse' ); ?>
        <span><?php echo get_search_query(); ?></span>
    </h2>
    <?php if ( ! is_search_has_results() ){ _e( 'هیچ نتیجه ای یافت نشد', 'persian_bourse' ); } ?>
</div>

<div class="container">
        <div class="row p30">
            <?php if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <div class="col-sm-8 col-24">
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
                    </div><!-- .col-sm-8 -->
                    <?php
                }
            }
            ?>
            <div class="col-24">
                <div class="bourse-news__bourse-pagination">
                    <?php do_action( 'pagination', 1, 2, '<i class="persian-angle-right"></i>', '<i class="persian-angle-left"></i>' ); ?>
                    <div class="other-pages">
                        <a href="#">
                            <p><?php _e( 'سایر', 'persian_bourse' ); ?></p>
                            <p><?php _e( 'صفحه ها', 'persian_bourse' ); ?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- .row -->
</div>
	<?php //get_sidebar(); ?>
<?php get_footer(); ?>
