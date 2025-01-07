<?php  
	/* 
		The template for displaying 404 pages (Not Found)
	*/
		get_header();
?>
<div id="primary" class="content-area justify-content-center text-center" style="height:300px;width:100%;margin:7% 0px 15% 0px">
       <h1 style="color:#212529;font-size:60px;">4 <span style="color:#ff6763">0</span> 4</h1>
        <h2>UH OH! You're lost.</h2>
        <p style="font-size:25px;width:50%;margin:0px 25%;">The page you are looking for does not exist.
          How you got here is a mystery. But you can click the button below
          to go back to the homepage.
        </p> <br><br>
        <a class="newsletter__submit-button" id="hovblck"href="<?php echo home_url(); ?>" style="text-decoration:none;font-size:20px">HOME</a>
			


	</div><!-- #primary -->
<div style="margin-top:8%">
<?php
get_footer();
?>
</div>
