<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 
custom_breadcrumbs();
?>

	<div class="col-md-10 col-xs-12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			<?php if(!is_page(array(327,8))){ ?>
				<h1><?php

					
				the_title(); ?></h1>
			<?php } the_content(); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
