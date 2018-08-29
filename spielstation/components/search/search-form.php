<div class="SearchForm SearchForm--yellow">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label class="searchbox">
			<input type="text" pattern=".{3,}" placeholder="SUCHEN" value="<?php echo get_search_query(); ?>" name="s" required>
		</label>
		<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'spielstation' ); ?>">
	</form>
</div>
