<?php
/**
 * Created by PhpStorm.
 * User: ivahid_pc4
 * Date: 10/31/2020
 * Time: 1:48 PM
 */

?>
<?php if ( class_exists( 'ACF' ) ){ ?>

<div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="latest-news-articles">
                        <?php  $persian_slider_title = get_field( 'persian-slider-title', 'option' );
                        if ( $persian_slider_title ){
                            ?>
                            <span class="latest-news-articles__title"><?php if ( $persian_slider_title ) { echo esc_html( $persian_slider_title ); } ?></span> <!-- .latest-news-articles__title -->
                            <?php
                        }
                        ?>
                        <?php
                                $persian_sliders = get_field( 'persian_header_bottom_slider', 'option' );
                                if ( $persian_sliders ){
                                    ?>
                                    <div class="latest-news-articles__slider">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php
                                                    foreach ( $persian_sliders as $slider ){
                                                ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php echo get_permalink( $slider->ID ); ?>"><?php echo esc_html( $slider->post_title ); ?></a>
                                                </div>
                                                        <?php

                                                    }
                                                ?>
                                            </div><!-- .swiper-wrapper -->
                                        </div>
                                    </div><!-- .latest-news-articles__slider -->
                                    <?php
                                }
                        ?>
                    </div><!-- .latest-news-articles -->
                </div><!-- .col-lg-12 -->
                <div class="col-lg-12">
                    <?php $persian_header_bottom_menu = get_field( 'persian-bottom-header-menu', 'option' );
                    if ( $persian_header_bottom_menu ){
                        ?>
                    <ul class="secondary-menu">
                    <?php
                    $persian_bottom_menu = wp_get_nav_menu_items( $persian_header_bottom_menu );
                    foreach ( $persian_bottom_menu as $item ){
                        ?>
                        <li class="secondary-menu__item">
                            <a href="<?php echo esc_url(  $item->url );  ?>"><?php echo esc_html( $item->title ); ?></a>
                        </li><!-- .secondary-menu__item -->
                    <?php
                    }
                     ?>
                    </ul>
                        <?php
                    } ?>
                </div><!-- .col-lg-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .header-bottom -->

<?php } ?>