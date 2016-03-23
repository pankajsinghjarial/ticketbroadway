<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
	
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 $theatre = get_field('venue')->post_name;
	 $videos = get_post_custom_values('wpcf-video', get_the_ID());
	 $i = 0;
?>
<?php include 'header-product.php'; ?>
<div class="row">
	<ul id="menu-product">
		<li class="col-md-3 col-xs-3">
			<a href="<?php the_permalink(); ?>">The Show</a>
		</li>
		<li class="col-md-3 col-xs-3">
			<a href="<?php the_permalink(); ?>cast-crew">Cast & Crew</a>
		</li>
		<li class="col-md-3 col-xs-3">
			<a href="<?php the_permalink(); ?>venue/<?php echo $theatre; ?>">Venue</a>
		</li>
		<li class="col-md-3 col-xs-3">
			<a href="<?php the_permalink(); ?>reviews">Reviews</a>
		</li>
	</ul>
</div>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="slideshow-video">
		<div id="main-slideshow-images">
			<div class="slide-image">
				<?php foreach($videos as $key => $video){ ?>
						<video id="video-<?php echo $key; ?>" poster="<?php echo get_template_directory_uri(); ?>/images/back-video.png" width="100%">
							<source src="<?php echo $video; ?>" type="video/mp4">
							Your browser does not support the video tag.
						</video>
						<script>$('#video-<?php echo $key; ?>').click(function(){this.paused?this.play():this.pause();});</script>
						<?php
						$i++;
						if($i == 1){
							echo '</div><div class="slide-image">';
							$i=0;
						} 
					} ?>
			</div>
		</div>
	</div>
	<div class="thumb-link">
		<?php for($i=1; $i<=count($videos); $i++){?>
			<a onclick="slideLeft(<?php echo $i-1; ?>)"><?php echo $i; ?></a>
		<?php } ?>
	</div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
