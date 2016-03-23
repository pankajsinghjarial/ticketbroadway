<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 

$product = get_post(get_the_ID());
$image = get_the_post_thumbnail(get_the_ID(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array('title'	=> $image_title,'alt'	=> $image_title) );
$theatre_link = get_field('venue')->post_name;
$theatre_title = get_field('venue')->post_title;
$meta = get_post_custom_values('wpcf-datetime', get_the_ID());
$lowest = $meta[0];
$last = $meta[0];
foreach($meta as $key => $date){
	if($lowest > $date){
		$lowest = $date;
	}else if($last < $date){
		$last = $date;
	}
}
			
?>
<div style="width: 78%; float: left;" id="container">
	<div id="content" role="main">
		<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
		<?php 
			if(isset($_GET['page']) && $_GET['page'] == "cast-crew"){
				include 'content-single-show-castcrew.php';
			}else{
				include 'content-single-show-main.php';
			}
		?>
	</div>
</div>
<div class="sidebar-product">
		<?php echo $image; ?>
		<button class="buy-button">BUY TICKETS</button>
		<button class="buy-button">GROUP TICKETS</button>
		<hr>
		<p>THEATRE</p>
		<a href="./venue/<?php echo $theatre_link; ?>"><?php echo $theatre_title; ?></a>
		<p>DURATION</p>
		<?php $met = get_post_custom_values('wpcf-duration', get_the_ID());
			echo $met[0].'<br><br>';
			echo 'First Show : '.date('m/d/Y', $lowest).' at '.date('H:i:s', $lowest).'<br>';
			echo 'Last Show : '.date('m/d/Y', $last).' at '.date('H:i:s', $last).'<br>';?>
		<hr>
		<?php getReviews(); ?>
		<hr>
		<?php 
			$price_text = get_post_custom_values('wpcf-price-information', get_the_ID());
			echo '<p style="color: gold; font-weight: bold;">PRICE INFORMATION</p>'.$price_text[0].'';
		
		?>
	</div>
<?php get_footer(); ?>