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
$theatre = get_field('venue')->post_name;
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
	 $title = get_post_custom_values('wpcf-introduction-reviews', get_the_ID());
	 $reviewsInfo = array();
	 	if( have_rows('Magazine_reviews') ):
			$countTotal = count(get_field('Magazine_reviews')).'';
		// loop through the rows of data
			while ( have_rows('Magazine_reviews') ) : the_row();
				$Magazine_title = get_sub_field('Magazine_title');
				$magazine_url = get_sub_field('magazine_url');
				$review_text = get_sub_field('review_text');
				$review_title = get_sub_field('review_title');
				$note = get_sub_field('note');
				$width = $note * 20;
				array_push($reviewsInfo, array('magTitle'=>$Magazine_title,'magUrl'=>$magazine_url,'magRevText'=>$review_text, 'magRevTitle'=>$review_title, 'magNote'=>$note,'magWidth'=>$width));
			endwhile;
		endif;
	
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
		<li class="col-md-3 col-xs-3 selected-li">
			<a href="<?php the_permalink(); ?>reviews">Reviews</a>
		</li>
	</ul>
</div>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="shows" <?php post_class(); ?>>
	<h2 class="mag_reviews">Reviews</h2>
	<p>Average Rating based on <?php echo $countTotal; ?>  reviews</p>
	<div class="star-rating ratingReviews"><span style="width: <?php echo getReviews(); ?>%;"></span></div>
	<h2 class="mag_reviews">Review Summary</h2>
	<p><?php echo apply_filters('the_content', $title[0]); ?></p>
	<?php foreach($reviewsInfo as $key => $review){?>
	<div class="row">
		<div class="col-md-3 list-reviews">
			<p class="starTitle">Stars: </p><div class="star-rating ratingOneReview"><span style="width: <?php echo $review['magWidth']; ?>%"><?php echo $review['magNote']; ?></span></div>
			<p>Author : <?php echo $review['magTitle']; ?></p>
		</div>
		<div class="col-md-9">
			<h3><?php echo $review['magRevTitle']; ?></h3>
			<p class="actor_l_description"><?php echo apply_filters('the_content', $review['magRevText']); ?></p>
		</div>
	</div>
	<?php
		}
		?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
