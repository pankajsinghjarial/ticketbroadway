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
	 global $product;
	$attachment_ids = $product->get_gallery_attachment_ids();
	$countImage = count($attachment_ids);
	$numberPage = ceil($countImage/16);
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
	
	<div id="slideshow-images">
		<div id="main-slideshow-images">
			<div class="slide-image">
			<?php 
				foreach( $attachment_ids as $attachment_id ) {
					$image = wp_get_attachment_url( $attachment_id );
					?>
					<img onclick="slidego('<?php echo $image; ?>')" id="image-gallery-<?php echo $i; ?>" src="<?php echo $image; ?>" alt="">
				<?php
					$i++;
					if($i == 16){
						echo '</div><div class="slide-image">';
						$i=0;
					}
				}
					?>
			</div>
		</div>
	</div>
	<div class="thumb-link">
		<?php for($i=1; $i<=$numberPage; $i++){?>
			<a onclick="slideLeft(<?php echo $i-1; ?>)"><?php echo $i; ?></a>
		<?php } ?>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
