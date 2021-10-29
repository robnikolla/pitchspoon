<?php 
  /* Template Name: Reviews*/
  get_header();
?> <br>
  <?php $args = array( 'post_type' => 'album' , 'posts_per_page' => 3);
        $the_query = new WP_Query ($args);  ?>
     <?php if($the_query-> have_posts()):?>
      <div class="row" style="margin:0px 15%">
        <div class="col-md">
      <h2 style="text-align:center;"> Featured Albums </h2>
      <br>

      <div class="row justify-content-center">
      <?php while($the_query-> have_posts()): $the_query -> the_post(); ?> 
        <div class="col-md" style="text-align: center;"> 
          <div class="imghov"style="width:auto;height:auto;display: inline-block;"><?php the_post_thumbnail(array(350, 350)); ?></div> 
          <br><br>
          <h4 style="text-align:center;"><?php the_title(); ?></h4>
        </div>
      <?php endwhile; ?>
     </div>
    </div>
    </div>
     <?php endif; ?>
     <br> <br>
<div class="row align-items-center bg-dark text-white " style="text-align:center; height:300px">
    <div class="col">
      <h1> Subscribe to our newsletter </h1>
      <h5>Be the first to know about new Album Reviews!</h5> 
      <br>
      <input type="email" name="email_address" class="email newsletter__email-input" placeholder="Your Email Address" id="newsletter-banner-email-input">
      <input type="submit" value="Sign Up" class="newsletter__submit-button">
    </div> 
</div>





      <br> <br>
     
<div class="container" style="padding-top:10px;">
    <h4 style="text-align:center;"> Latest Releases </h4>
    <br>
    <?php $args = array( 'post_type' => 'album' , 'posts_per_page' => 10);
        $the_query = new WP_Query ($args);  ?>
        <?php $count = 0; ?>
      <?php if($the_query-> have_posts()):?>
        <div class="row justify-content-center">
          <?php while($the_query-> have_posts()): $the_query -> the_post(); ?> 
            <div class="col-sm" style="text-align:center;">
              <div class="imghov"style="width:auto;height:auto;display: inline-block;"><?php the_post_thumbnail(array(200, 200));?></div>
              <br><br>
              <h5><?php the_title(); ?></h5>
              <p><?php the_field('artist');?></p>
            </div>
          <?php 
          if($count == 4){ $count = 0; echo '</div><div class="row justify-content-center">'; } else{ $count++;};



          ?>
          <?php endwhile; ?>



        </div>
      <?php endif;?>

</div>

<br><br>






<?php get_footer();?>