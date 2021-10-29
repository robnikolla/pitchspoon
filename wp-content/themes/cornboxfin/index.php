<?php 
?>
<!--
    ####################################################
    C A R O U S E L
    ####################################################
    -->
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="https://bootstrapcreative.com/">
                    <!-- 
                    If you need more browser support use https://scottjehl.github.io/picturefill/
                    If a picture looks blurry on a retina device you can add a high resolution like this
                    <source srcset="img/blog-post-1000x600-2.jpg, blog-post-1000x600-2@2x.jpg 2x" media="(min-width: 768px)">

                    What image sizes should you use? This can help - https://codepen.io/JacobLett/pen/NjramL
                     -->
                     <picture>
                      <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/geometric-background-memphis-style_52683-35346.jpg" media="(min-width: 1400px)">
                      <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/geometric-background-memphis-style_52683-35346.jpg" media="(min-width: 769px)">
                       <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/geometric-background-memphis-style_52683-35346.jpg" media="(min-width: 577px)">
                      <img srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/geometric-background-memphis-style_52683-35346.jpg" alt="responsive image" class="d-block img-fluid" style="width:100%">
                    </picture>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/">
                     <picture>
                      <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/AudioRoom-Qobuz.jpg" media="(min-width: 1400px)">
                      <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/AudioRoom-Qobuz.jpg" media="(min-width: 769px)">
                       <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/AudioRoom-Qobuz.jpg" media="(min-width: 577px)">
                      <img srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/AudioRoom-Qobuz.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>

            
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/">
                     <picture>
                      <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/geometric-background-memphis-style_52683-35346.jpghttps://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/61cf36b48a147359fe43fbb898194a21.jpg" media="(min-width: 1400px)">
                      <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/61cf36b48a147359fe43fbb898194a21.jpg" media="(min-width: 769px)">
                       <source srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/61cf36b48a147359fe43fbb898194a21.jpg" media="(min-width: 577px)">
                      <img srcset="https://digitalschool.cc/robertnikolla/wp-content/uploads/2021/02/61cf36b48a147359fe43fbb898194a21.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>

                
                </a>
            </div>
            <!-- /.carousel-item -->
        </div>
        <!-- /.carousel-inner -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->
<!-- /.container -->











 <br>

  <?php $args = array( 'post_type' => 'album' , 'posts_per_page' => 3);
        $the_query = new WP_Query ($args);  ?>
     <?php if($the_query-> have_posts()):?>
      <div class="row" style="margin:0px 5%">
        <div class="col-md">
      <h2 style="text-align:center;"> Featured Albums </h2>
      <br>

      <div class="row justify-content-center">
      <?php while($the_query-> have_posts()): $the_query -> the_post(); ?> 
        <div class="col" style="text-align: center;"> 
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
<div class="row align-items-center bg-dark text-white " style="margin-right:0%;text-align:center; height:300px">
    <div class="col">
      <h1> Subscribe to our newsletter </h1>
      <h5>Be the first to know about new Album Reviews!</h5> 
      <br><div style="display:inline;">
		<input type="email" name="email_address" class="email newsletter__email-		input" placeholder="Your Email Address"style="font-size:16px;width:250px;padding:8px;margin:7px" id="newsletter-banner-email-input">
      <input type="submit" value="Sign Up" class="newsletter__submit-button">
		</div>
      
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

<?php get_footer();