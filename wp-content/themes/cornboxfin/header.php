	<?php wp_head(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
	</style>
	<title> CORNBOX</title>
</head>
 <body>
 	<nav role="navigation" class="navbar navbar-expand-lg navbar-dark bg-dark shdwbot">
      <a class="navbar-brand display-4" style="margin-left:15px;font-size:30px"href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
      <meta name="viewport" content="width=device-width, initial-scale=1">

 		 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   		 <span class="navbar-toggler-icon"></span>
  		 </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container_class'   => ' col',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>    

    <?php get_search_form(); ?>
  </div>

</nav>
