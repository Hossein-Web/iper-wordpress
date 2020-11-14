<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>
<div class="not-found">
    <div class="d-flex justify-content-center">
        <img src="<?php echo get_template_directory_uri(); ?>/img/404_back2.png" alt="404">
    </div>
    <div class="not-found__content-wrapper">
        <div class="logo-content-wrapper d-flex align-items-center">
            <div class="logo">
                <?php
                  if ( class_exists( 'ACF' ) ) {

                      $persian_logo = get_field('persian-logo', 'option');

                      if ($persian_logo) {
                          ?>
                          <img src="<?php echo esc_url($persian_logo['url']); ?>"
                               alt="<?php echo esc_attr($persian_logo['alt']); ?>">
                          <?php
                      }

                  }
                ?>
            </div>
            <div class="not-found__content">
                <h4><?php _e( 'این‌جا صفحه‌ای وجود ندارد!', 'persian_bourse' ); ?></h4>
                <p><?php _e( 'احتمالا صفحه مورد نظرتان حذف شده یا آدرس را اشتباه وارد کرده‌اید. به دیگر صفحات وب‌سایت سر بزنید.','persian_bourse' ); ?></p>
            </div>
        </div><!-- .logo-content-wrapper -->
        <div class="not-found__links d-flex align-items-center">
            <a href="<?php echo home_url();
            ?>" class="d-flex align-items-center"><i class="persian persian-home"></i><?php _e( 'بازگشت به صفحه اصلی', 'persian_bourse' ); ?></a>
            <span><img src="<?php echo get_template_directory_uri(); ?>/img/connector.png" alt="connector"></span>
            <a href="#" class="d-flex align-items-center"><i class="persian persian-warning"></i><?php _e( 'گزارش خرابی لینک', 'persian_bourse' ); ?></a>
        </div><!-- .not-found__links -->
    </div>
</div><!-- .not-found -->
<?php get_footer(); ?>
