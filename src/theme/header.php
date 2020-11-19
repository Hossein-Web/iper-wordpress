<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="author" content="Luan Gjokaj, and WordPressify contributors"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
 <?php if ( class_exists( 'ACF' ) ){?>

<body <?php body_class(); ?>>
<?php if ( ! is_404() ){ ?>
<div class="menu-wrapper">
    <?php
        $show_digital_currency_slider = get_field( 'digital_currency_slider_display', 'option' );
        if ( $show_digital_currency_slider ) {
            $digital_currency_post_object = get_field( 'digital_currency_slider', 'option' );
            $shortcode_text = '[ccpw id="' . $digital_currency_post_object->ID . '"]';
        }
    ?>
    <div class="top-live-prices">
        <div class="container">
            <?php
            if ( class_exists( 'Crypto_Currency_Price_Widget_Pro' ) ){
                echo do_shortcode( $shortcode_text );
            }
            ?>
        </div><!-- .container -->
    </div><!-- .top-live-prices -->
    <?php $header_sticky = get_field( 'persian-sticky-menu', 'option' ); ?>
    <header class="header" data-sticky="<?php echo $header_sticky ?>">
        <div class="container">
            <div class="header__wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5 col-12">
                        <div class="header__logo">
                            <?php
                            if (class_exists('ACF')) {

                                $persian_logo = get_field('persian-logo', 'option');

                                if ($persian_logo) {
                                    ?>
                                    <a href="<?php echo esc_url(get_home_url()); ?>">
                                        <img src="<?php echo esc_url($persian_logo['url']); ?>"
                                             alt="<?php echo esc_attr($persian_logo['alt']); ?>">
                                    </a>
                                    <?php
                                }
                            }

                            ?>
                        </div><!-- .logo -->
                    </div><!-- .col-xl-5 -->
                    <div class="col-xl-19 col-lg-19 col-12">
                        <div class="header__menu-user-links-wrapper d-flex justify-content-between align-items-center">
                            <div class="mobile-menu-button">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <nav class="main-menu">
                                <?php
                                if (have_rows('persian-menu', 'option')) {
                                    ?>
                                    <ul class="list-inline">
                                        <?php
                                        while (have_rows('persian-menu', 'option')) {
                                            the_row();
                                            $persian_menu_link = get_sub_field('persian-menu-link');
                                            $persian_menu_link_title = $persian_menu_link['title'];
                                            $persian_menu_link_url = $persian_menu_link['url'];
                                            $persian_have_submenu = get_sub_field('persian-have-submenu');
                                            ?>

                                            <li class="list-inline-item mega-menu">
                                                <a href="<?php echo esc_url($persian_menu_link_url); ?>"><?php echo esc_html($persian_menu_link_title); ?></a>
                                                <?php
                                                $megamenu_content = [];
                                                if ($persian_have_submenu) { ?>
                                                    <div class="main-menu__mega-menu" data-tabindex="popular">
                                                        <?php
                                                        if (have_rows('persian-sub-menu', 'option')){
                                                        ?>
                                                        <div class="tab-title ">
                                                            <?php
                                                            while (have_rows('persian-sub-menu', 'option')) {
                                                                the_row();
//                                                                persian_var_dump( get_sub_field('persian-select-megamenu') );

                                                                $persian_submenu_title = get_sub_field('persian-submenu-title');
                                                                $persian_megamenu = get_sub_field('persian-select-megamenu');

                                                                if ( $persian_submenu_title ){

                                                                    $megamenu_content ['main_title'.get_row_index() ] = $persian_submenu_title;
                                                                    $megamenu_content[ get_row_index() ] = $persian_megamenu;
                                                                    ?>
                                                                    <div <?php if ( get_row_index() === 1 ){ echo 'class = "active"'; } ?> data-tab="apps-<?php echo get_row_index(); ?>"
                                                                         data-parent="popular">
                                                                        <span><?php echo esc_html($persian_submenu_title); ?></span>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                            }
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="tab-content">
                                                            <?php
                                                            foreach ( $megamenu_content as $item_index => $item_value ) {
                                                                ?>
                                                                <div class="mega-menu-wrapper"
                                                                     data-tabc="apps-<?php echo $item_index;?>"
                                                                     data-parent="popular">
                                                                    <div class="mega-menu-header">
                                                                        <p><?php echo esc_html( $megamenu_content['main_title'. $item_index] ); ?></p>
                                                                    </div><!-- .mega-menu-header -->
                                                                    <div class="mega-menu-content">
                                                                        <?php echo $item_value; ?>
                                                                    </div><!-- .mega-menu-content -->
                                                                </div><!-- .mega-menu-wrapper -->
                                                                <?php
                                                            }?>
                                                        </div><!-- .tab-content -->
                                                    </div><!-- .main-menu__mega-menu -->
                                                <?php } ?>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </nav><!-- .main-menu-->
                            <div class="user-links">
                                <ul class="list-inline">
                                    <?php
                                    if (have_rows('persian-header-links-group', 'option')){
                                    while (have_rows('persian-header-links-group', 'option')){
                                    the_row();
                                    $persian_header_links = get_sub_field('persian-header-links');
                                    //                                        }
                                    //                                    }
                                    //                                   $persian_header_links = get_field('persian-header-links' ,'options');
                                    foreach ($persian_header_links as $link) {
                                        switch ($link['value']) {
                                            case 'search':
                                                ?>
                                                <li class="search list-inline-item">
                                                    <span><i class="persian-search"></i></span>
                                                    <?php get_search_form(); ?>
                                                </li>
                                                <?php
                                                break;
                                            case 'user':
                                                ?>
                                                <?php if ( is_user_logged_in() ) { ?>
                                                    <li class="user-profile list-inline-item">
                                                        <a href="<?php echo bp_loggedin_user_domain(); ?>">
                                                            <span><i class="persian-user"></i></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <?php
                                                break;
                                            case 'notification':
                                                ?>
                                                <?php
                                                if ( is_user_logged_in() ){
                                                    $notifications = bp_notifications_get_notifications_for_user( bp_loggedin_user_id(), 'object' );
                                                    ?>
                                                <li class="notification list-inline-item">
                                                    <a href="#">
                                                        <span><i class="persian-notification"></i></span>
                                                        <?php if ( $notifications ){?>
                                                            <span class="notification__is-active"></span>
                                                        <?php
                                                        } ?>
                                                    </a>
                                                    <?php if ( $notifications ){
                                                        ?>

                                                    <div class="notification__notification-list">
                                                        <ul>
                                                            <?php foreach ( (array)$notifications as $notification ){
                                                                ?>
                                                                <li><a href="<?php echo $notification->href; ?>"><?php echo $notification->content ?></a></li>
                                                        <?php
                                                            } ?>
                                                        </ul>
                                                    </div><!-- .notification__list -->
                                                        <?php
                                                    } ?>
                                                </li>
                                                        <?php
                                                    }
                                                ?>
                                                <?php
                                                break;
                                        }
                                    }
                                    ?>
                                </ul>
                                <?php
                                $persian_have_header_btn = get_sub_field('persian-have-header-btn');
                                if ($persian_have_header_btn) {
                                    $persian_header_btn = get_sub_field('persian-header-btn');
                                    if ($persian_header_btn) {
                                        ?>
                                        <div class="where-button">
                                            <a href="<?php echo esc_url($persian_header_btn['link']); ?>">
                                                <?php echo esc_html($persian_header_btn['title']); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                <?php }
                                }
                                } ?>
                            </div><!-- .header__user-links -->
                        </div><!-- .header__menu-user-links-wrapper -->
                    </div><!-- .col-xl-19 -->
                </div><!-- .row -->
            </div><!-- .header__wrapper -->
        </div><!-- .container -->
    </header><!-- .header -->
</div>
<div id="main-page">
    <?php persian_social_media_share(); ?>
    <?php get_template_part( 'template_parts/header_bottom' ); ?>
    <div class="container">
        <div class="persian_edit_post">
            <?php edit_post_link( __( 'ویرایش', 'persian_bourse' ), '<p class="edit-button">', '</p>'); ?>
        </div>
    </div>
<?php } ?>

<?php } ?>
