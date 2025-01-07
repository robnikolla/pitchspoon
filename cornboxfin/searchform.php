<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search" id="searchform" style="margin-right:3%;">
	<label for="search">Search Reviews</label>
	<input type="text" name="s" style="width:300px" class="email newsletter__email-input" placeholder="Search" id="newsletter-banner-email-input" value="<?php echo get_search_query(); ?>">
	<input type="hidden" name="post_type[]" value="album" />
</form>