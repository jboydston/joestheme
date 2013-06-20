<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php
	   $args = array(
			'post_type' => 'advertisements'
//			'meta_key' => 'section',
//			'meta_value' => 'a' 
		);
	   $ad_posts = new WP_Query($args);

	   if($ad_posts->have_posts()) : 
	      while($ad_posts->have_posts()) : 
	         $ad_posts->the_post();
	?>

<?php   the_post_thumbnail(); ?>

	<?php
	   endwhile;
	   else: 
	?>

Oops, there are no posts.

	<?php
	   endif;
	?>
	
</div><!-- #secondary -->
	