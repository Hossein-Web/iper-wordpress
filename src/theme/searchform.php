<form class="search__form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="inner-content">
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'جستجو', 'persian_bourse' ); ?>" />
        <button type="submit"></button>
	</div>
</form>
