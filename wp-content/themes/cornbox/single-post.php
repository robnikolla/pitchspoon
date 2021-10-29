<?php get_header(); ?>

		<?php 
		if(have_posts()):
			while(have_posts()): the_post(); ?>
				<article id="post-<?php the_ID();?>">
					<div class="row justify-content-center">
					<div class="col-7">
						<div style="text-align:center;"><?php the_post_thumbnail('large');?></div>
						<br><br>
						<h5 ><?php the_category($separator = " | "); ?></h5>
						<h1><?php the_title(); ?></h1>
						
						<h5>Written by <?php the_field('author');?> | <?php the_date( 'Y-m-d') ?>  </h5>
						
						<br>
						<p style="width:auto;"><?php the_content(); ?></p>
						<br>
					</div>
				
				</article>

			 ?>

			<?php endwhile;endif;?>
		 
	</div>
</div>
<?php get_footer(); ?>