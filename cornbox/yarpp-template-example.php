<?php 
/*
YARPP Template: Simple
Author: YARPP Team
Description: A simple example YARPP template.
*/
?>
<?php if (have_posts()):?>
	<h2 style="text-align:center;">Discover more from <?php the_field('artist')?></h2>
	<div class="row">
	<div class="justify-content-center"style="display:inline-flex;flex-wrap:wrap">
	<?php while (have_posts()) : the_post(); ?>
  						<div style="text-align:center;margin-right:25px;">
  						<?php the_post_thumbnail(array(200, 200));?>
  	 					<h5><?php the_title(); ?></h5>
  	 					</div>
  	 					
	<?php endwhile; ?>
	</div>
</div>
<?php else: ?>
<?php endif; ?>


