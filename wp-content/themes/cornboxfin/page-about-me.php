
<?php
/* Template Name: About Us */

 get_header(); ?>

<?php 
if (have_posts() ) :
	while (have_posts()):the_post();?>
		<br><br>
   <div class="row justify-content-center">
   	<div class="col-6"> <h3 class="text-center"><?php the_title(); ?></h3> 
   <hr>
   <p><?php the_content(); ?></p>
</div>
   </div>
   
  

<?php endwhile;
endif;
 ?>

<br><br><br>
<?php get_footer();  ?>