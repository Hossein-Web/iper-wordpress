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
            <a href="#">
                <img src="./assets/img/logo.png" alt="پرشین بورس">
            </a>
        </div><!-- .mobile-logo -->
        <div class="mobile-links">
            <ul class="list-inline">
                <li class="search list-inline-item">
                    <span><i class="persian-search"></i></span>
                </li>
                <li class="user-profile list-inline-item">
                    <a href="#">
                        <span><i class="persian-user"></i></span>
                    </a>
                </li>
                <li class="notification list-inline-item">
                    <a href="#">
                        <span><i class="persian-notification"></i></span>
                        <span class="notification__is-active"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mobile-links-content">
            <form class="search__form" action="#" method="get">
                <input type="search" placeholder="جستجو">
                <button type="submit">
                </button>
            </form>
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
    <div class="mobile-menu-body">
        <div class="where-button">
            <a href="#">
                ازکجا شروع کنم؟
            </a>
        </div>
        <div class="mobile-menu">
            <ul>
                <li><a href="#">ابزارهای معاملاتی</a></li>
                <li><a href="#">اخبار</a></li>
                <li><a href="#">آموزش</a></li>
                <li><a href="#">گروه های بورس</a></li>
                <li><a href="#">عرضه اولیه</a></li>
                <li><a href="#">تبلیغات</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">ارتباط با ما</a></li>
            </ul>
        </div><!-- .mobile-menu -->
    </div>
    <div class="mobile-menu-footer">

    </div>
</div><!-- .header__mobile-menu-wrapper -->
<?php wp_footer(); ?>
</body>
</html>