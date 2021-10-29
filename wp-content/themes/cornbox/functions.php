<?php 
/*   Enqueue Scripts */
function add_theme_scripts() {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css',array());
	wp_enqueue_style('style1',get_stylesheet_directory_uri().'/css/style1.css', array(), rand(111,9999), 'all');

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'), '20120206', true );
	wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array('jquery'), '20120206', true);
}
add_action('wp_enqueue_scripts','add_theme_scripts');

/*  Navigation Menus  */

function cb_setup(){

    add_theme_support('menus');
    register_nav_menus(
	array(
 		'primary' => __( 'Primary Menu','cornbox'),
 		'secondary' => __('Secondary Menu', 'cornbox'),
 		)
 	);	
 
}

add_action('init','cb_setup');

 
/*  Register Custom Navigation Walker   */
require_once('wp_bootstrap_navwalker.php');
/* Search Bar on Nav Menu  */
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    ob_start();
    get_search_form();
    $searchform = ob_get_contents();
    ob_end_clean();
    return $items;
}

/* Enable Thumbnails*/
	add_theme_support( 'post-thumbnails' );


/*  Register Custom Post Type */
function custom_album(){
	$labels = [
		'name'					=> _x('Albums','post type general name'),
		'singular_name'			=> _x('Album','post type singular name'),
		'add_new'				=> _x('Add New','album'),
		'add_new_item'			=> __('Add New Album'),
		'edit_item'				=> __('Edit Album'),
		'new_item' 				=> __('New Album'),
		'all_items'				=> __('All Albums'),
		'view_items' 			=> __('View Album'),
		'search_items'			=> __('Search Albums'),
		'not_found'				=> __('No Albums found'),
		'not_found_in_trash'	=> __('No Albums found in the Trash'),
		'menu_name'				=> 'Albums',
	];
	$args = [
		'labels' 				=> $labels,
		'description' 			=> 'Albums and single album details',
		'public' 				=> true,
		'menu_position'			=> 5,
		'supports'				=> array('title','editor','thumbnail','excerpt','comments'),
		'has_archive'			=> true,
		'menu_icon'   			=> 'dashicons-format-audio',
	];
	register_post_type('album', $args);
}
add_action('init','custom_album');
 
/* Featured Image Link */
function wpb_autolink_featured_images( $html, $post_id, $post_image_id ) {
    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
    return $html;
    }
    add_filter( 'post_thumbnail_html', 'wpb_autolink_featured_images', 10, 3 );

/* Register Artists */
function register_taxonomy_artists(){
	$labels = [
		'name'					=> _x('Artists','taxonomy general name'),
		'singular_name'			=> _x('Artist','taxonomy singular name'),
		'search_items'			=> __('Search Artist'),
		'all_items'				=> __('All Artists'),
		'edit_item'				=> __('Edit Artist'),
		'update_item'			=> __('Update Artist'),
		'add_new_item'			=> __('Add New Artist'),
		'new_item_name'			=> __('New Artist Name'),
		'menu_name'				=> __('Artists'),
	];
	$args = [
		'hierarchical'			=> true,
		'labels' 				=> $labels,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'query_var'				=> true,
		'rewrite'				=> ['slug' => 'artists'],
		'menu_icon'   			=> 'dashicons-format-audio',
		
	];

	register_taxonomy('type',array('album'),$args);
}
add_action('init','register_taxonomy_artists');




/* Comment Customizing  */
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
  
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom'); 

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}
//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'ci_comment_rating_rating_field' );
add_action( 'comment_form_after_fields', 'ci_comment_rating_rating_field' );
function ci_comment_rating_rating_field () {
	?>
	<label for="rating">Rating<span class="required">*</span></label>
	<fieldset class="comments-rating">
		<span class="rating-container">
			<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
				<input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
			<?php endfor; ?>
			<input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
		</span>
	</fieldset>
	<?php
}
//Enqueue the plugin's styles.
add_action( 'wp_enqueue_scripts', 'ci_comment_rating_styles' );
function ci_comment_rating_styles() {

	wp_register_style( 'ci-comment-rating-styles', plugins_url( '/', __FILE__ ) . 'assets/style.css' );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'ci-comment-rating-styles' );
}
//Save the rating submitted by the user.
add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
function ci_comment_rating_save_comment_rating( $comment_id ) {
	if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
	$rating = intval( $_POST['rating'] );
	add_comment_meta( $comment_id, 'rating', $rating );
}
//Make the rating required.
add_filter( 'preprocess_comment', 'ci_comment_rating_require_rating' );
function ci_comment_rating_require_rating( $commentdata ) {
	if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) )
	wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
	return $commentdata;
}
//Display the rating on a submitted comment.
add_filter( 'comment_text', 'ci_comment_rating_display_rating');
function ci_comment_rating_display_rating( $comment_text ){

	if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
		$stars = '<p class="stars">';
		for ( $i = 1; $i <= $rating; $i++ ) {
			$stars .= '<span class="dashicons dashicons-star-filled"></span>';
		}
		$stars .= '</p>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {
		return $comment_text;
	}
}
 
//Get the average rating of a post.
function ci_comment_rating_get_average_ratings( $id ) {
	$comments = get_approved_comments( $id );

	if ( $comments ) {
		$i = 0;
		$total = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$i++;
				$total += $rate;
			}
		}

		if ( 0 === $i ) {
			return false;
		} else {
			return round( $total / $i, 2 );
		}
	} else {
		return false;
	}
}

//Display the average rating above the content.
add_filter( 'the_content', 'ci_comment_rating_display_average_rating' );
function ci_comment_rating_display_average_rating( $content ) {

	global $post;

	if ( false === ci_comment_rating_get_average_ratings( $post->ID ) ) {
		return $content;
	}
	
	$stars   = '';
	$average = ci_comment_rating_get_average_ratings( $post->ID );

	for ( $i = 1; $i <= $average + 1; $i++ ) {
		
		$width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

		if ( 0 === $width ) {
			continue;
		}

		$stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="dashicons dashicons-star-filled"></span>';

		if ( $i - $average > 0 ) {
			$stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="dashicons dashicons-star-empty"></span>';
		}
	}
	
	$custom_content  = '<p class="average-rating">This albums community average rating is: ' . $average .' ' . $stars .'</p>';
	$custom_content .= $content;
	return $custom_content;
}

add_filter('widget_posts_args', 'widget_posts_args_add_custom_type'); 
function widget_posts_args_add_custom_type($params) {
   $params['post_type'] = array('post','album');
   return $params;
}
?>



