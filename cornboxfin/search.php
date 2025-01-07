<?php get_header(); ?>
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
       
      _e("<h2 style='color:#000;margin:20px 0px 0px 50px;'>Search Results for: ".get_query_var('s')."</h2>"); ?>
      <div style="display: inline-flex;flex-direction: row;flex-wrap:wrap;margin:20px"> <?php

        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
                    <div style="text-align:center;margin:0px 30px;">
              <div class="imghov"style="width:auto;height:auto;display: inline-block;"><?php the_post_thumbnail(array(200, 200));?></div>
              <br><br>
              <h5 style="width:200px"><?php the_title(); ?></h5>
              <p><?php the_field('artist');?></p>
            </div>
                 <?php
        }
      ?></div><?php
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>

<?php get_footer(); ?>