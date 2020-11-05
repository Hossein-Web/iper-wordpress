<?php get_header(); ?>

<div class="container">
    <h2 class="page-title">
        <?php _e( 'نتایج جستجو برای: ', 'persian_bourse' ); ?>
        <span><?php echo get_search_query(); ?></span>
    </h2>
</div>

<div class="container">
    <div class="row">
        <div class="search-content">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template_parts/content', get_post_type() );
                endwhile;
//					else :
//						get_template_part( 'content', 'none' );
            endif;
            ?>
        </div>
    </div>
</div>
	<?php //get_sidebar(); ?>
<?php get_footer(); ?>
