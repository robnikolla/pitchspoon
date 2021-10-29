<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<br>

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
			?><div class="row align-items-center justify-content-center"  >
				<div class="col" style="text-align:center;">
					<h1><?php the_title(); ?></h1>
					<p><?php the_field('artist'); ?>  - <small><?php the_field('date')?></small></p>
				</div>
				<div class="col-md justify-content-center" style="text-align:center;margin-bottom:15px">
					<?php the_post_thumbnail(array(500, 500));?>
				</div>
				
				<div class="col-md justify-content-center" style="text-align:center;display:flex;justify-content:center">
					<h3 class="rating-a" style="text-align:center;"> <?php the_field('rating') ?> </h3>
				</div>
			</div>
			<br>
				<div class="row justify-content-center" style="margin:0px 10px">
					<div class="col-lg-6" >
						<p style="width:auto;"><?php the_content(); ?></p>
						<br>
						<h3>Stream "<?php the_title();?>" on Spotify:</h3>
						<?php the_field('tracklist');?>
						<br>
						<?php comments_template(); ?> 
					</div>
					
				







				</div>

			
<?php
			endwhile; // End the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<br>
<?php
get_footer();
