<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="searchbox">
		<!-- <span class="screen-reader-text hidden"><?php _ex( 'Search for:', 'label', 'spiestation' ); ?></span> -->
		<input type="search" class="searchfield" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'spielstation' ); ?>" value="<?php //echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<!-- <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'spielstation' ); ?>"> -->
</form>
