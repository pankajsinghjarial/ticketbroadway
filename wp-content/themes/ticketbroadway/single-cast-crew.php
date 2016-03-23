<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$custom_fields = get_post_custom(get_the_ID());
$image = $custom_fields['wpcf-image-actor'];

get_header(); ?>
<div id="content" class="col-md-10 col-xs-12" role="main">
	<h1><?php the_title(); ?></h1>
	<?php  echo '<img src="'.$image[0].'" style="width: 40%;" alt="'.get_the_title().'"/>'; ?>	
	<div class="row">
		<?php echo apply_filters('the_content', the_content());?>
	</div><!-- .entry-content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>