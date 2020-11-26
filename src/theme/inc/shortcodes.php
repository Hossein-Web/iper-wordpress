<?php
// Post like shortcode
function persian_post_suggestion_shortcode( $atts ) {
    ob_start();
    $attributes = shortcode_atts(
        [
            'post_id' => '',
            'title'   => ''
        ],
        $atts
    );
    $post_id = esc_html( trim( $attributes['post_id'] ) );
    $args = [
        'post__in' => [ $post_id ],
        'ignore_sticky_posts' => true
    ];
    $like_post = new WP_Query( $args );
    ?>
    <div class="post-like">
        <div class="post-like__title">
            <h3><?php echo esc_html( $attributes['title'] ); ?></h3>
        </div>
        <?php if ( $like_post->have_posts() ){
            while ( $like_post->have_posts() ){
                $like_post->the_post();
                ?>
                <div class="post-like__content-wrapper">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post-like__image">
                        <figure>
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </figure>
                    </div>
                    <?php } ?>
                    <div class="post-like__content">
                        <h4><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div>
                            <span class="post-like__date"><?php the_date(); ?></span>
                        </div>
                        <?php echo ivahid_get_excerpt(100); ?>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'post_suggestion', 'persian_post_suggestion_shortcode' );

function persian_offer_posts_shortcode( $atts ) {
    ob_start();
    $attributes = shortcode_atts(
            [
            'post_ids' => '',
            'title'    => ''
            ],
        $atts
    );
    ?>
    <section class="offer-posts">
        <div class="container">
            <div class="bourse-title bourse-title--blue">
                <h2><?php echo $attributes['title']; ?></h2>
                <a class="bourse-read-more" href="#"><?php echo esc_html( __( 'مشاهده بیشتر', 'persian_bourse' ) ); ?><i class="persian-arrow-left"></i></a>
            </div>
            <?php
            $post_ids = StrToArr( $attributes['post_ids'], ',' );
                $args = [
                        'post__in' => $post_ids
                ];
                $offer_posts_query = new WP_Query( $args );
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
                                        <p><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></p>
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
    <?php
    return ob_get_clean();
}
//add_shortcode( 'offer_posts', 'persian_offer_posts_shortcode' );