<?php
get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<br>

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
			?><div class="row align-items-center" style="margin-right:0;">
				<div class="col" style="text-align:right;">
					<h1><?php the_title(); ?></h1>
					<p><?php the_field('artist'); ?>  - <small><?php the_field('date')?></small></p>
				</div>
				<div class="col justify-content-center" style="text-align:center;">
					<?php the_post_thumbnail(array(500, 500));?>
				</div>
				<div class="col" style="text-align:left;">
					<h5>Rating: </h5>
					<h3 class="rating-a"> <?php the_field('rating') ?> </h3>
				</div>
			</div>
			<br>
				<div class="row justify-content-center" style="margin-right:0;">
					<div class="col-lg-6">
						<p style="width:auto;"><?php the_content(); ?></p>
						<br>
						
					
						<br><br>
					<?php comments_template(); ?> 
					</div>
					<div class="col-lg-3"><?php get_sidebar(); ?><br><h3>Stream "<?php the_title();?>" on Spotify:</h3><?php the_field('tracklist');?></div>

	
				</div>

			
<?php
			endwhile; // End the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<br>
<?php
get_footer(); ?>
