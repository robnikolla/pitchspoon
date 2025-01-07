<?php
get_header();
if (have_posts() ) { ?>
      <div class="row justify-content-center" style="margin-right:0px">
      <div class="container-fluid"style="display: inline-flex;flex-direction: row;justify-content:center;flex-wrap:wrap;width:70%;margin-top:20px;"> <?php

        while (have_posts() ) { the_post();
                 ?>
                    <div style="text-align:center;margin:0px 20px;">
              <div class="imghov"style="width:auto;height:auto;display: inline-block;"><?php the_post_thumbnail(array(200, 200));?></div>
              <br><br>
              <h5 style="width:200px"><?php the_title(); ?></h5>
              <p style="width:200px"><?php the_field('artist');?> / <?php the_field('rating');?></p>
            </div>
                 <?php
        } 
        ?> </div></div><p style="width:100%;text-align:center;"> <?php the_posts_pagination(array(
    'mid_size'  => 2,
    'prev_text' => __( 'Back', 'textdomain' ),
    'next_text' => __( 'Onward', 'textdomain' ),
    'screen_reader_text' => __( ' ','textdomain'),
) );?> </p>
      <?php
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?><br><br><br> <?php
get_footer();
?>