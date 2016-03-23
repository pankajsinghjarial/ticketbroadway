<?php
   /**
    * Template Name: Actors
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */
   
   
   
   get_header(); ?>
   
   <div id="primary" class="site-content">
			<div id="content" class="row" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php 
					$args = array('post_type' => 'cast-crew', 'post_status' => 'publish');
					// The Query
					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$custom_fields = get_post_custom(get_the_ID());
							 $image = $custom_fields['wpcf-image-actor'];
							echo '<a href="'.get_permalink(get_the_ID()).'"><div class="actors_li"><h2>' . get_the_title() . '</h2>
							<img src="'.$image[0].'" alt="'.get_the_title().'"/>
							</div></a>';
						}
					} else {
						// no posts found
					}
					
					/* Restore original Post Data */
					wp_reset_postdata(); ?>
				<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
   
   
   <?php get_sidebar(); ?>
<?php 
	get_footer();

	?>