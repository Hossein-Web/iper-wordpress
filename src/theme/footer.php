<?php if ( !is_404() ){ ?>
</div><!-- #main-page -->
<footer>
    <div class="container">
        <div class="row p30">
            <div class="col-lg-4 col-sm-5 col-12">
                <?php
                if (is_active_sidebar('footer_sidebar_1')) {
                    dynamic_sidebar('footer_sidebar_1');
                }

                ?>
            </div><!-- .col-lg-4 -->
            <div class="col-lg-4 col-sm-5 col-12">
                <?php
                if (is_active_sidebar('footer_sidebar_2')) {
                    dynamic_sidebar('footer_sidebar_2');
                }

                ?>
            </div><!-- .col-xl-4 -->
            <div class="col-lg-16 col-sm-14 col-24">
                <?php
                if (is_active_sidebar('footer_sidebar_3')) {
                    dynamic_sidebar('footer_sidebar_3');
                }

                ?>
            </div><!-- .col-xl- 16 -->
        </div><!-- .row -->
    </div><!-- .container -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <div>
                            <a href="#"></a>
                        </div>
                        <div class="copy-right-text-wrapper">
                            <p>اين وبسايت متعلق به ميباشد و تمامی حقوق آن محفوظ ميباشد.</p>
                            <p>طراحی سایت توسط تیم طراحی سایت آی وحید</p>
                        </div><!-- .copy-right-text-wrapper -->
                    </div><!-- .footer-copy-right -->
                </div><!-- .col-lg-12 -->
                <div class="col-lg-12">
                    <?php if ( class_exists('ACF') ) { ?>
                        <div class="footer-social-media">
                                <ul>
                                    <?php
                                    if ( get_field( 'persian_telegram_address', 'option' ) ) {
                                        $telegram_address = get_field( 'persian_telegram_address', 'option' );
                                        ?>
                                        <li class="active">
                                            <div class="social-text-wrapper">
                                                <span><?php echo esc_html( $telegram_address[ 'title' ] );?><i class="persian-angle-right"></i></span>
                                            </div><!-- .social-text-wrapper -->
                                            <a href="<?php echo esc_url( $telegram_address[ 'url' ] );?>"><i class="footer-social-icon persian-telegram"></i></a>
                                        </li>
                                    <?php } ?>

                                    <?php
                                    if ( get_field( 'persian_instagram_address', 'option' ) ) {
                                        $instagram_address = get_field( 'persian_instagram_address', 'option' );
                                        ?>
                                        <li>
                                            <div class="social-text-wrapper">
                                                <span><?php echo esc_html( $instagram_address[ 'title' ] );?><i class="persian-angle-right"></i></span>
                                            </div><!-- .social-text-wrapper -->
                                            <a href="<?php echo esc_url( $instagram_address[ 'url' ] );?>"><i class="footer-social-icon persian-instagram"></i></a>
                                        </li>
                                    <?php } ?>

                                    <?php
                                    if ( get_field( 'persian_whatsapp_address', 'option' ) ) {
                                        $whatsapp_address = get_field( 'persian_whatsapp_address', 'option' );
                                        ?>
                                        <li>
                                            <div class="social-text-wrapper">
                                                <span><?php echo esc_html( $whatsapp_address[ 'title' ] );?><i class="persian-angle-right"></i></span>
                                            </div><!-- .social-text-wrapper -->
                                            <a href="<?php echo esc_url( $whatsapp_address[ 'url' ] );?>"><i class="footer-social-icon persian-whatsapp"></i></a>
                                        </li>
                                    <?php } ?>

                                    <?php
                                    if ( get_field( 'persian_twitter_address', 'option' ) ) {
                                        $twitter_address = get_field( 'persian_twitter_address', 'option' );
                                        ?>
                                        <li>
                                            <div class="social-text-wrapper">
                                                <span><?php echo esc_html( $twitter_address[ 'title' ] );?><i class="persian-angle-right"></i></span>
                                            </div><!-- .social-text-wrapper -->
                                            <a href="<?php echo esc_url( $twitter_address[ 'url' ] );?>"><i class="footer-social-icon persian-twitter"></i></a>
                                        </li>
                                    <?php } ?>

                                    <?php
                                    if ( get_field( 'persian_facebook_address', 'option' ) ) {
                                        $facebook_address = get_field( 'persian_facebook_address', 'option' );
                                        ?>
                                        <li>
                                            <div class="social-text-wrapper">
                                                <span><?php echo esc_html( $facebook_address[ 'title' ] );?><i class="persian-angle-right"></i></span>
                                            </div><!-- .social-text-wrapper -->
                                            <a href="<?php echo esc_url( $facebook_address[ 'url' ] );?>"><i class="footer-social-icon persian-facebook"></i></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                        </div><!-- .footer-social-media -->
                    <?php } ?>
                </div><!-- .col-lg-12 -->
            </div>
        </div>
    </div><!-- .footer-bottom -->
</footer>
<div id="mobile-overlay">

</div>
<div class="header__mobile-menu-wrapper">
    <div class="mobile-menu-header">
        <div class="mobile-close-button">
            <!--<span class="mobile-close-button__top"></span>-->
            <!--<span class="mobile-close-button__bottom"></span>-->
        </div>
        <div class="mobile-logo">
            <?php
            $persian_mobile_logo = get_field( 'persian_mobile_logo', 'option' );


            if ( $persian_mobile_logo ){
                $persian_mobile_logo_url = $persian_mobile_logo['url'];
                $persian_mobile_logo_alt = $persian_mobile_logo['alt'];
                ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url( $persian_mobile_logo_url ); ?>" alt="<?php if ( $persian_mobile_logo_alt ){
                        echo esc_attr( $persian_mobile_logo_alt );
                    } ?>">
                </a>
            <?php
            }
            ?>
        </div><!-- .mobile-logo -->
        <div class="mobile-links">
            <?php if ( have_rows( 'persian_mobile_btn_group' ,'option' ) ){
                ?>
            <ul class="list-inline">
            <?php
                while ( have_rows( 'persian_mobile_btn_group', 'option' ) ) {
                    the_row();
                    $persian_mobile_links = get_sub_field('persian_mobile_links');
                    foreach ($persian_mobile_links as $link) {
                        switch ($link['value']) {
                            case 'search':
                                ?>
                                <li class="search list-inline-item">
                                    <span><i class="persian-search"></i></span>
                                </li>
                                <?php
                                break;
                            case 'user':
                                ?>
                                <li class="user-profile list-inline-item">
                                    <a href="#">
                                        <span><i class="persian-user"></i></span>
                                    </a>
                                </li>
                                <?php
                                break;
                            case 'notification':
                                ?>
                                <li class="notification list-inline-item">
                                    <a href="#">
                                        <span><i class="persian-notification"></i></span>
                                        <span class="notification__is-active"></span>
                                    </a>
                                </li>
                                <?php
                                break;
                        }
                    }

                    ?>
                    </ul>
        </div>
        <div class="mobile-links-content">
            <?php get_search_form(); ?>
            <div class="notification__notification-list">
                <ul>
                    <li><a href="#">آیتم اول</a></li>
                    <li><a href="#">آیتم دوم</a></li>
                    <li><a href="#">آیتم سوم</a></li>
                    <li><a href="#">آیتم چهارم</a></li>
                    <li><a href="#">آیتم پنجم</a></li>
                </ul>
            </div><!-- .notification__list -->
        </div><!-- .user-links-content -->
    </div><!-- .mobile-menu-header -->
    <?php
    }

    } ?>
    <div class="mobile-menu-body">
        <?php
        if ( have_rows( 'persian_mobile_btn_group', 'option' ) ){
            while ( have_rows( 'persian_mobile_btn_group', 'option' ) ) {
                the_row();
                $mobile_btn_active = get_sub_field('persian_mobile_btn_active');
                $mobile_btn = get_sub_field('persian_mobile_btn');
                if ($mobile_btn_active) {
                if ($mobile_btn) {
                    $mobile_btn_link = $mobile_btn['url'];
                    $mobile_btn_title = $mobile_btn['title'];

                    ?>
                    <div class="where-button">
                        <a href="<?php echo esc_url($mobile_btn_link); ?>">
                            <?php echo esc_html($mobile_btn_title); ?>
                        </a>
                    </div>
                    <?php
                }
            }

            }
        }
        ?>
        <?php
        if ( have_rows( 'persian_mobile_menu','option' ) ){
                ?>
                <div class="mobile-menu">
                    <ul>
            <?php
                while ( have_rows( 'persian_mobile_menu', 'option' ) ){
                    the_row();

                $item = get_sub_field( 'persian_mobile_item_link' );
                $mobile_has_submenu = get_sub_field( 'persian_mobile_have_submenu' );
                $persian_submenu_term = get_sub_field( 'persian_mobile_submenu' );


                if ( $item ) {
                    $item_title = $item['title'];
                    $item_url = $item['url'];

                    ?>
                    <li class="<?php if ( $mobile_has_submenu ) { echo 'has_submenu'; }?>"  >
                        <a href="<?php echo esc_url($item_url); ?>"><?php echo esc_html($item_title); ?></a>
                        <?php
                        if ( $mobile_has_submenu ){
                        $mobile_sub_menu = wp_get_nav_menu_items($persian_submenu_term);
                        if ($mobile_sub_menu){
                        ?>
                        <ul>

                            <?php
                            foreach ($mobile_sub_menu as $sub_item) {
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( $sub_item->url ); ?>"><?php echo esc_html($sub_item->title); ?></a>
                                </li>
                                <?php
                            }?>
                            </ul>
                            <?php
                        }
                        }?>
                    </li>
                    <?php
                }
                }
                ?>
                    </ul>
                </div><!-- .mobile-menu -->
        <?php
        }

        ?>
    </div>
    <div class="mobile-menu-footer">

    </div>
</div><!-- .header__mobile-menu-wrapper -->
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>


