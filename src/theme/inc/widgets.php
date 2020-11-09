<?php

function footer_sidebars()
{
    //Register sidebars
    register_sidebar(
        array(
            'name' => __( 'ناحیه فوتر اول', 'persian_bourse' ),
            'id' => 'footer_sidebar_1',
            'before_widget' => '<div class="footer-widget-wrapper">',
            'after_widget' => '</div><!-- .footer-widget-wrapper -->',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        )
    );

    register_sidebar(
        array(
            'name' => __( 'ناحیه فوتر دوم', 'persian_bourse' ),
            'id' => 'footer_sidebar_2',
            'before_widget' => '<div class="footer-widget-wrapper">',
            'after_widget' => '</div><!-- .footer-widget-wrapper -->',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        )
    );

    register_sidebar(
        array(
            'name' => __( 'ناحیه فوتر سوم', 'persian_bourse' ),
            'id' => 'footer_sidebar_3',
            'before_widget' => '<div class="footer-widget-wrapper">',
            'after_widget' => '</div><!-- .footer-widget-wrapper -->',
            'before_title' => '<h6>',
            'after_title' => '</h6>',
        )
    );

    //Register widgets
//    register_widget('list_widget');
}

add_action('widgets_init', 'footer_sidebars');

function main_page_sidebar() {

    // Register main page sidebar
    register_sidebar(
        [
            'name' => __( 'ناحیه ابزارک اصلی', 'persian_bourse' ),
            'id' => 'main_page_sidebar',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ]
    );

    // Register widgets
    register_widget( 'Persian_Recent_Posts' );
    register_widget( 'Persian_Side_Tab' );
    register_widget( 'Persian_Side_Video' );
}
add_action( 'widgets_init', 'main_page_sidebar' );

class list_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_options = [
            'classname' => 'footer-widget-wrapper',
            'description' => 'دسترسی سریع'
        ];
        parent::__construct('list_widget', 'list widget', $widget_options);
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['title']);
            echo $args['after_title'];
        }
        echo $args['after_widget'];
    }
//    public function form($instance)
//    {
//        return parent::form($instance); // TODO: Change the autogenerated stub
//    }
//    public function update($new_instance, $old_instance)
//    {
//        return parent::update($new_instance, $old_instance); // TODO: Change the autogenerated stub
//    }
}

class Persian_Recent_Posts extends WP_Widget {

    /**
     * Sets up a new Recent Posts widget instance.
     *
     * @since 2.8.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname'    => 'side-populars',
            'description'  => __( 'نوشته های اخیر همراه با تصویر', 'persian_bourse' )
        );
        parent::__construct( 'persian-recent-posts', __( 'نوشته های اخیر آی وحید', 'persian_bourse' ), $widget_ops );
    }

    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget( $args, $instance ) {

        $default_title = __( 'نوشته های پربازدید', 'persian_bourse' );
        $title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
        $persian_query_args = [
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ];
        $most_visited_posts_query = new WP_Query( $persian_query_args );
        if ( ! $most_visited_posts_query->have_posts() ) {
            return;
        }?>
        <div class="side-populars">
            <?php
            if ( $title ) { ?>
                <div class="title title--blue title--small">
                    <h6><?php echo $title; ?></h6>
                    <a href="#"><?php _e( 'آرشیو', 'persian_bourse' ); ?></a>
                </div>
                <?php
            }
            if ( $most_visited_posts_query->have_posts() ) { ?>
                <ul class="side-populars__items-wrapper">
                    <?php while ( $most_visited_posts_query->have_posts() ) {
                        $most_visited_posts_query->the_post();
                        ?>
                        <li>
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="img-wrapper">
                                    <?php the_post_thumbnail(); ?>
                                </div><!-- .img-wrapper -->
                            <?php } ?>
                            <div class="post-details">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                </a>
                                <p><?php echo human_time_diff( get_the_time( 'U' ), current_time( 'U' ) ) . ' ' . __( 'پیش', 'persian_bourse' );  ?></p>
                            </div>
                        </li>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            <?php }
            ?>
        </div><!-- .side-populars -->
    <?php
        }

    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance              = $old_instance;
        $instance['title']     = $new_instance['title'];
        $instance['number']    = (int) $new_instance['number'];
        return $instance;
    }

    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:', 'persian_bourse' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'تعداد پست ها:', 'persian_bourse' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
        </p>

        <?php
    }
}

// Side tab widget class
class Persian_Side_Tab extends WP_Widget {
    public  function __construct()
    {
        $widget_ops = [
            'description' => __( 'نمایش نوشته ها به صورت تب', 'persian_bourse' )
        ];
        parent::__construct( 'persian-side-tab', __( 'نوشته ها به صورت تب', 'persian_bourse' ), $widget_ops );
    }

    public function widget($args, $instance)
    {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        $id = 'widget_' . $args['widget_id'];

        if ( have_rows( 'side_tab_items', $id ) ){ ?>
            <div data-tabindex="side-tab" class="side-tab">
                <div class="tab-title side-tab__tab-links">
            <?php
            // Display tab links
            while ( have_rows( 'side_tab_items', $id ) ) {
                the_row();
                ?>
                        <div data-tab="<?php echo 'side-tab-link-' . get_row_index() ?>" data-parent="side-tab"
                            <?php if ( get_row_index() === 1 ) { ?> class="active" <?php } ?> >
                            <?php
                                $tab_title = get_sub_field( 'side_tab_title' );
                                echo esc_html( $tab_title );
                            ?>
                        </div>
                <?php } ?>
                </div><!-- .side-tab__tab_links -->
                <div class="tab-content">
                    <?php
            while ( have_rows( 'side_tab_items', $id ) ) {
                            the_row();
                            $posts_type = get_sub_field( 'select_posts_type' ); ?>
                                <div class="side-tab__tab-content <?php if ( get_row_index() === 1 ) echo 'active'; ?>" data-tabc="<?php echo 'side-tab-link-' . get_row_index() ?>" data-parent="side-tab">
                                    <ul>
                                        <?php if ( $posts_type === 'select_by_category' ) {
                                                $post_items = get_sub_field( 'side_tab_posts_by_category' );
                                                global $post;
                                                foreach ( $post_items as $post ) {
                                                    setup_postdata( $post );
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo get_the_permalink(); ?>">
                                                            <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                                        </a>
                                                        <?php if ( has_excerpt() ) { ?>
                                                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                                                        <?php } ?>
                                                    </li>
                                                <?php }
                                                wp_reset_postdata();
                                        }elseif ( $posts_type === 'select_most_visited_posts' ) {
                                            $posts_number = get_sub_field( 'side_tab_most_visited_posts' );
                                            $query_args = [ 'posts_per_page' => $posts_number,
                                                            'meta_key'       => 'views',
                                                            'orderby'        => 'meta_value_num'
                                            ];
                                            $posts_query = new WP_Query( $query_args );
                                            if ( $posts_query->have_posts() ) {
                                                while ( $posts_query->have_posts() ) {
                                                    $posts_query->the_post();
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo get_the_permalink(); ?>">
                                                            <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                                        </a>
                                                        <?php if ( has_excerpt() ) { ?>
                                                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                                                        <?php } ?>
                                                    </li>
                                                <?php }
                                                wp_reset_postdata();
                                            }
                                            ?>

                                        <?php } ?>
                                        </ul>
                                </div><!-- .side-tab__tab-content -->
                        <?php } ?>
                </div><!-- .tab-content -->
            </div><!-- .side-tab -->
            <?php
        }
    }

    public function form($instance)
    {}
}

// Side video posts
class Persian_Side_Video extends WP_Widget {
    public function __construct()
    {
        $widget_ops = [
            'description' => __( 'نمایش نوشته های ویدئویی', 'persian_bourse' )
        ];
        parent::__construct( 'persian-side-video', __( 'نوشته های ویدئویی آی وحید', 'persian_bourse' ), $widget_ops );
    }

    public function widget($args, $instance)
    {
        if ( ! isset( $args['widget_id'] ) ) {
        $args['widget_id'] = $this->id;
         }
        $id = 'widget_' . $args['widget_id'];
        ?>
        <div class="side-video">
            <?php
                $side_video_title = get_field( 'side_video_title', $id );
                $side_video_posts_category = get_field( 'side_video_most_visited_posts_category', $id );
                if ( $side_video_title ) { ?>
                    <div class="side-video__title">
                        <h6><?php echo esc_html( $side_video_title ); ?></h6>
                        <?php $side_video_posts_type = get_field( 'side_video_select_posts_type', $id ); ?>
                        <?php
                            if ( $side_video_posts_type === 'posts_from_category' ) {
                                $side_video_link = get_field( 'side_video_link', $id );
                            ?>
                            <a href="<?php echo esc_url( $side_video_link['url'] ) ?>"><?php echo esc_html( $side_video_link['title'] ); ?></a>
                        <?php }elseif ( $side_video_posts_type === 'select_most_visited' ) {
                                $side_video_link_title = get_field( 'side_video_link_title', $id );
                                $category_link = get_category_link( $side_video_posts_category );
                                ?>
                                <a href="<?php echo esc_url( $category_link ) ?>"><?php echo esc_html( $side_video_link_title ); ?></a>
                            <?php } ?>
                    </div><!-- .side-video__title -->
                <?php } ?>
                    <div class="side-video-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php if ( $side_video_posts_type === 'posts_from_category' ) {
                                        $side_video_posts = get_field( 'side_video_posts_from_category', $id );
                                        global $post;
                                        foreach ( $side_video_posts as $post ) {
                                            setup_postdata( $post );
                                            ?>
                                                <div class="swiper-slide">
                                                <div class="side-video__content">
                                                    <?php if ( has_post_thumbnail() ) { ?>
                                                        <div class="poster-wrapper">
                                                            <?php the_post_thumbnail(); ?>
                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </a>
                                                        </div><!-- .poster-wrapper -->
                                                    <?php } ?>
                                                    <h6 class="video-post-title">
                                                        <a href="<?php echo get_the_permalink(); ?>">
                                                            <?php echo esc_html( get_the_title() ); ?>
                                                        </a>
                                                    </h6>
                                                    <ul class="video-post-meta">
                                                        <li><span><i class="persian-date"></i></span><span><?php echo human_time_diff( get_the_time( 'U' ), current_time( 'U' ) ) . ' ' . __( 'پیش', 'persian_bourse' );  ?></span></li>
                                                        <li>
                                                            <span><i class="persian-user"></i></span>
                                                            <span>
                                                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                                                    <?php echo get_the_author(); ?>
                                                                </a>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="persian-view"></i>
                                                            </span>
                                                            <span>
                                                                <?php echo ivahid_get_views( get_the_ID() ) . __( 'بازدید', 'persian_bourse' ); ?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div><!-- .side-video__content -->
                                            </div><!-- .swiper-slide -->
                                            <?php
                                        }
                                        wp_reset_postdata();
                                }elseif( $side_video_posts_type === 'select_most_visited' ) {
                                    $side_video_posts_number = get_field( 'side_video_most_visited_posts_number', $id );
                                    $side_video_query_args = [
                                        'posts_per_page' => $side_video_posts_number,
                                        'meta_key'       => 'views',
                                        'orderby'        => 'meta_value_num',
                                        'cat'            => $side_video_posts_category
                                    ];
                                    $side_video_query = new WP_Query( $side_video_query_args );
                                    if ( $side_video_query->have_posts() ) {
                                        while ( $side_video_query->have_posts() ) {
                                            $side_video_query->the_post();
                                            ?>
                                                <div class="swiper-slide">
                                                <div class="side-video__content">
                                                    <?php if ( has_post_thumbnail() ) { ?>
                                                        <div class="poster-wrapper">
                                                            <?php the_post_thumbnail(); ?>
                                                            <a href="<?php echo get_the_permalink(); ?>">
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </a>
                                                        </div><!-- .poster-wrapper -->
                                                    <?php } ?>
                                                    <h6 class="video-post-title">
                                                        <a href="<?php echo get_the_permalink(); ?>">
                                                            <?php echo esc_html( get_the_title() ); ?>
                                                        </a>
                                                    </h6>
                                                    <ul class="video-post-meta">
                                                        <li><span><i class="persian-date"></i></span><span><?php echo human_time_diff( get_the_time( 'U' ), current_time( 'U' ) ) . ' ' . __( 'پیش', 'persian_bourse' );  ?></span></li>
                                                        <li>
                                                            <span><i class="persian-user"></i></span>
                                                            <span>
                                                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                                                    <?php echo get_the_author(); ?>
                                                                </a>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="persian-view"></i>
                                                            </span>
                                                            <span>
                                                                <?php echo ivahid_get_views( get_the_ID() ) . __( 'بازدید', 'persian_bourse' ); ?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div><!-- .side-video__content -->
                                            </div><!-- .swiper-slide -->
                                            <?php
                                        }
                                        wp_reset_postdata();
                                    }
                                } ?>
                            </div><!-- .swiper-wrapper -->
                        </div>
                    </div><!-- .side-video-slider -->
                </div><!-- .side-video --> <?php
    }
    public function form( $instance )
    {}
}

function archive_page_sidebar(){

    // Register archive page sidebar
    register_sidebar(
            [
                'name'              => __( 'ناحیه ابزارک برگه آرشیو', 'persian_bourse' ),
                'id'                => 'archive_page_sidebar',
                'before_widget'     => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            ]
    );
    register_widget( 'persian_category' );
}
add_action( 'widgets_init', 'archive_page_sidebar' );

class persian_category extends WP_Widget{
    /**
     * Sets up a persian new Categories widget instance.
     *
     * @since 2.8.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname'                   => 'side-categories',
            'description'                 => __( 'یک لیستی از دسته بندی ها را نمایش می دهد' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'persian_categories', __( 'دسته بندی های پرشین بورس', 'persian_bourse' ), $widget_ops );
    }

    public function widget( $args, $instance ) {

        $default_title = __( 'دسته بندی ها', 'persian_bourse' );
        $title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;
        $title = apply_filters( 'widget_title', $title, $instance );
        $persian_hierarchical = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $persian_cat = get_categories();
        if( ! empty( $persian_cat ) ){
            ?>
            <div class="side-categories">
                <?php if ( $title ){
                    ?>
                    <h6 class="categories-title"><?php echo $title; ?></h6>
                    <?php
                } ?>
                <ul>
                    <?php
                    if ( $persian_hierarchical === '1' ){
                        foreach ( $persian_cat as $cat ){
                            if ( $cat->category_parent === 0 ){
                                $persian_args = [ 'parent' => $cat->cat_ID ];
                                $children_cat = get_categories( $persian_args );
                                ?>
                                <li class="<?php if ( !empty($children_cat )) { echo 'has-subcategory'; } ?>">
                                    <?php if ( empty( $children_cat ) ){
                                        ?>
                                        <a href="<?php echo esc_url(get_category_link( $cat->cat_ID )); ?>"><?php echo esc_html( $cat->cat_name ); ?></a>
                                        <?php
                                    }else{
                                        ?>
                                        <span><?php echo esc_html( $cat->cat_name ); ?></span>
                                    <?php
                                    } ?>
                                    <?php
                                    if ( !empty( $children_cat ) ){
                                        ?>
                                        <ul>
                                            <?php
                                            foreach ( $children_cat as $child ){
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( get_category_link( $child->cat_ID ) ); ?>"><?php echo esc_html( $child->cat_name ); ?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>

                                        </ul>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                        }
                    }
                    elseif( $persian_hierarchical === '0' ){
                        foreach ( $persian_cat as $cat ) {
                            ?>
                            <li>
                                <a href="<?php echo esc_url(get_category_link($cat->id)); ?>"><?php echo esc_html($cat->cat_name); ?></a>
                            </li>
                            <?php
                        }
                    }
                    ?>

                </ul>
                <?php

                ?>
            </div><!-- .side-categories -->
            <?php
        }

    }

    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );
        $instance['hierarchical'] = ! empty( $new_instance['hierarchical'] ) ? 1 : 0;

        return $instance;
    }

    public function form( $instance ) {
        // Defaults.
        $instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

        <p>
            <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'hierarchical' ); ?>" name="<?php echo $this->get_field_name( 'hierarchical' ); ?>"<?php checked( $hierarchical ); ?> />
            <label for="<?php echo $this->get_field_id( 'hierarchical' ); ?>"><?php _e( 'Show hierarchy' ); ?></label>
        </p>
        <?php
    }
}
