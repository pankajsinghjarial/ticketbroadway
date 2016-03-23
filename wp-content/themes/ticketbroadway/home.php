<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 

/************* GET PRODUCT BEST SELLER *****************/
$args = array(
	'post_type' => 'product',
	'meta_key' => 'total_sales',
	'orderby' => 'meta_value_num',
	'post_status' => 'publish'
);
$the_query = new WP_Query( $args );
$bsInfo = array();
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$product = new WC_product(get_the_ID());
		$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
		
		if($image_link === false){
			$image_link = '/wp-content/themes/ticketbroadway/images/nothumbnail.png';
		}
		$stars = getReviews();
		//$image = get_the_post_thumbnail(get_the_ID(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array('title'	=> $image_title,'alt'	=> $image_title) );
		array_push($bsInfo, array("title" => $product->post->post_title, "postname" => $product->post->post_name, "reviews" => $stars, "image" => $image_link));
		if(count($bsInfo) == 9){
			break;
		}
	}
} else {
	// no posts found
}
wp_reset_postdata(); 
//Fill the tab with show if not enough show
if(count($bsInfo) <= 9){
	$y = 9 - count($bsInfo);
	for($i=0; $i<$y; $i++){
		array_push($bsInfo, array("title" => 'No show found', "post-name" => '',  "reviews" => '0', "image" => get_template_directory_uri().'/images/bs_notfound.png'));
	}
}

/************* END GET PRODUCT BEST SELLER *****************/


/************* GET LATEST REVIEWS *****************/

global $wpdb;
$req = 'SELECT DISTINCT ID FROM `wp_posts` WHERE post_type = "product" AND post_status = "publish" ORDER BY post_date DESC';
$res = $wpdb->get_results ($req);

$listReviews = array();
foreach($res as $key => $val){
		$product = new WC_product($val->ID);
		$image_link  = wp_get_attachment_url(get_post_thumbnail_id($val->ID));
		if( have_rows('Magazine_reviews', $val->ID) ){
			while ( have_rows('Magazine_reviews', $val->ID) ) : the_row();
				$note = get_sub_field('note');
				$title = get_sub_field('review_title');
				
				if(get_sub_field('review_image') != null){
					$images = get_sub_field('review_image');
					$image = $images['url'];
				}else{
					$image = $image_link;
					if($image_link === false){
						$image_link = '/wp-content/themes/ticketbroadway/images/nothumbnail.png';
					}
				}
				
				
				if(count($listReviews) < 8){
					array_push($listReviews, array("showTitle" => $product->post->post_title, "showName" => $product->post->post_name, "imageShow" => $image, "note" => $note*20, "reviewTitle" => $title));
					break;
				}else{
					//break;
				}
			endwhile;
		}else{
			
		}
}
//Disposition reviews where 0=mainReview, 1=lessReview, 2=lessReview + col-md-3, 3=mainReview + col-md-3
$disposition = array(3,1,2,0,3,1,2,0);
/************* END GET LATEST REVIEWS *****************/

/************* GET TESTIOMONIALS *****************/
$args = array('post_type' => 'testimonial', 'posts_per_page' => 4, 'post_status' => 'publish');
// The Query
$the_query = new WP_Query( $args );


$testimonials = array();
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		array_push($testimonials, array(get_permalink(get_the_ID()), get_the_post_thumbnail(get_the_ID()), get_the_title(), get_the_content("Read More...")));
	}
} else {
	// no posts found
}

/* Restore original Post Data */
wp_reset_postdata(); 
/************* END GET TESTIMONIALS *****************/
?>
<div class="row">
	<?php include 'slider.php';?>
</div>
<div class="row contentFront" >
	<h2 id="tleft" class="selectedTab">TOP SELLERS</h2>
	<div id="tabTop">
	<?php foreach($bsInfo as $key => $show){ ?>
		<style>#bestSeller-<?php echo $key; ?>{
					background: url('<?php echo $show["image"] ?>') no-repeat;
					background-size: 100% 100%;
					height: 245px;
					background-repeat: no-repeat;
					background-origin: content-box;
					<?php if($key != 0){ ?>
						padding-left: 7px;
					<?php } ?>
					margin-bottom: 7px;
				}
				
				@media (max-width: 992px){
					<?php if($key % 2 == 0){ ?>
						#bestSeller-<?php echo $key; ?>{
							background: white !important;
							margin-bottom: 0px;
						}
					<?php }else{ ?>
						#bestSeller-<?php echo $key; ?>{
							background: #D6D4D4 !important;
							margin-bottom: 0px;
						}
					<?php } ?>
				}
		</style>
		<?php if($key == 0){ ?>
		<div class="col-md-4 col-xs-12 theBestSeller" id="bestSeller-<?php echo $key; ?>" onmouseleave="hideDetails(<?php echo $key; ?>)" onmouseover="showDetails(<?php echo $key; ?>)">
			<p class="topSellPin">MONTH'S TOP SELLER</p>
			<div class="bsContent" id="bsContent-<?php echo $key; ?>" style="display: none;">
				<div class="bsContentInner">
					<div class="titleRating">
						<h3><?php echo $show["title"] ?></h3>
						<div class="star-rating" style="margin-top: 10px; margin-bottom: 10px;">
							<span style="width:<?php echo $show["reviews"]; ?>%;"></span>
						</div>
					</div>
					<div class="">
						<a href="shows/<?php echo $show["postname"]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" class="buyTicketTopSell" alt="Buy Now"><p class="buyTicketTopSellRes">BUY TICKETS ></p></a>
						<p><a href="shows/<?php echo $show["postname"]; ?>">Read More ></a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-xs-12">
		<?php }else{ ?>
			<div class="col-md-3 col-xs-12 bestSellers" id="bestSeller-<?php echo $key; ?>" onmouseleave="hideDetails(<?php echo $key; ?>)" onmouseover="showDetails(<?php echo $key; ?>)">
				<div class="bsContent" id="bsContent-<?php echo $key; ?>" style="display: none;">
					<div class="bsContentInner">
						<div class="titleRating">
							<h3><?php echo $show["title"] ?></h3>
							<div class="star-rating" style="margin-top: 10px; margin-bottom: 10px;">
								<span style="width:<?php echo $show["reviews"]; ?>%;color: #c20000;"></span>
							</div>
						</div>
						<div class="">
							<a href="shows/<?php echo $show["postname"]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" class="buyTicketTopSell" alt="Buy Now"><p class="buyTicketTopSellRes">BUY TICKETS ></p></a>
							<p><a href="shows/<?php echo $show["postname"]; ?>">Read More ></a></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	</div>
	</div>
</div>
<div class="row contentFront pub">
	<div class="col-md-12 col-xs-12">
		<a href="<?php echo esc_url( get_permalink(23691) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/pub_front.png" class="img-responsive" alt="pub hotel"/></a>
	</div>
</div>
<div class="row contentFront latestReviews">
	<h2 id="tright">LATEST REVIEWS</h2>
	<div id="tabLat">
<?php 
	foreach($listReviews as $key => $review){
		switch($disposition[$key]){
			case 0:
				echo '<div class="mainReview reviewDiv" id="review-'.$key.'">';
				break;
			case 1:
				echo '<div class="lessReview reviewDiv" id="review-'.$key.'">';
				break;
			case 2:
				echo '<div class="col-md-3 col-xs-12 holdReview">';
				echo '<div class="lessReview reviewDiv" id="review-'.$key.'">';
				break;
			case 3:
				echo '<div class="col-md-3 col-xs-12 holdReview">';
				echo '<div class="mainReview reviewDiv" id="review-'.$key.'">';
				break;
		}
	?>		
		<a href="shows/<?php echo $review['showName'] ?>/reviews">
			<div class="bsContent">
				<div class="bsContentInner">
					<h4><?php echo $review['showTitle'] ?></h4>
					<div class="star-rating starReviews" style="">
						<span style="width:<?php echo $review['note'] ?>%;color: #c20000;"></span>
					</div>
					<h3><?php echo $review['reviewTitle'] ?></h3>
					<p class="readMoreReviews">Read More</p>
				</div>
			</div>
		</a>
	</div>
	<style>
	#review-<?php echo $key; ?>{
		background: url('<?php echo $review['imageShow']; ?>');
		    background-size: 100% 100%;
		background-repeat: no-repeat;
		background-origin: content-box;
	}
	
	@media (max-width: 992px){
		<?php if($key % 2 == 0){ ?>
			#review-<?php echo $key; ?>{
				background: white !important;
			}
		<?php }else{ ?>
			#review-<?php echo $key; ?>{
				background: #D6D4D4 !important;
			}
		<?php } ?>
	}
	</style>
<?php switch($disposition[$key]){
			case 0:
				echo '</div>';
				break;
			case 1:
				echo '</div>';
				break;
		}
		
 } ?>
	</div>
</div><!--
<div class="row contentFront pub">
	<div class="col-md-12 col-xs-12">
		<img src="<?php echo get_template_directory_uri(); ?>/images/pub_front.png" class="img-responsive" alt="pub hotel"/>
	</div>
</div>
<div class="row contentFront divTesti">
	<div class="col-md-6 col-xs-12">
	
	</div>
	<div class="col-md-6 col-xs-12 testimonialsHome">
		<h2>TESTIMONIALS</h2>
		<?php foreach($testimonials as $key => $testimonial){ ?>
				<div id="testi-<?php echo $key ?>" class="col-md-6 col-xs-12 testimonial">
					<div class="col-md-4 col-xs-12">
						<p><?php echo $testimonial[1]; ?></p>
					</div>
					<div class="col-md-8 col-xs-12">
						<p class="testiTitle"><?php echo $testimonial[2]; ?></p>
					</div>
					<div class="col-md-12 col-xs-12">
						<p class="testiContent"><?php echo $testimonial[3]; ?></p>
					</div>
				</div>
		<?php } ?>
		
	</div>
	<div class="dotRes" style="margin-top: 260px; width: 80px; margin: 0 auto;">
		<div id="dot-0" onclick="slideTesti(0)" class="dot dotGrey"></div>
		<div id="dot-1" onclick="slideTesti(1)" class="dot"></div>
		<div id="dot-2" onclick="slideTesti(2)" class="dot"></div>
		<div id="dot-3" onclick="slideTesti(3)" class="dot"></div>
	</div>
</div>-->

<script>
	$('#review-1, #review-2, #review-5, #review-6').css('background-size', 'cover');

	var width = $(window).width();
	function showDetails(id){
		if((width > 980)){
			$('#bsContent-' + id).fadeIn(500);
		}
	}
	
	function hideDetails(id){
		if((width > 980)){
			$('#bsContent-' + id).fadeOut(500);
		}
	}
	
	$('#tleft').click(function (){
		if((width < 980)){
			$('#tright').attr("class", " ");
			$('#tleft').attr("class", "selectedTab");
			$('#tabTop').css('display', 'block');
			
		}
	});
	
	$('#tright').click(function (){
		if((width < 980)){
			$('#tright').attr("class", "selectedTab");
			$('#tleft').attr("class", " ");
			$('#tabTop').css('display', 'none');
		}
	});
	
	function slideTesti(id){
		switch(id){
			case 0:
				$('#testi-0').css('z-index', '20');
				$('#testi-1').css('z-index', '10');
				$('#testi-2').css('z-index', '10');
				$('#testi-3').css('z-index', '10');
				$('#dot-0').attr('class', 'dot dotGrey');
				$('#dot-1').attr('class', 'dot');
				$('#dot-2').attr('class', 'dot');
				$('#dot-3').attr('class', 'dot');
				break;
			case 1:
				$('#testi-0').css('z-index', '10');
				$('#testi-1').css('z-index', '20');
				$('#testi-2').css('z-index', '10');
				$('#testi-3').css('z-index', '10');
				$('#dot-1').attr('class', 'dot dotGrey');
				$('#dot-0').attr('class', 'dot');
				$('#dot-2').attr('class', 'dot');
				$('#dot-3').attr('class', 'dot');
				break;
			case 2:
				$('#testi-0').css('z-index', '10');
				$('#testi-1').css('z-index', '10');
				$('#testi-2').css('z-index', '20');
				$('#testi-3').css('z-index', '10');
				$('#dot-2').attr('class', 'dot dotGrey');
				$('#dot-0').attr('class', 'dot');
				$('#dot-1').attr('class', 'dot');
				$('#dot-3').attr('class', 'dot');
				break;
			case 3:
				$('#testi-0').css('z-index', '10');
				$('#testi-1').css('z-index', '10');
				$('#testi-2').css('z-index', '10');
				$('#testi-3').css('z-index', '20');
				$('#dot-3').attr('class', 'dot dotGrey');
				$('#dot-0').attr('class', 'dot');
				$('#dot-1').attr('class', 'dot');
				$('#dot-2').attr('class', 'dot');
				break;
		}
		
	}
</script>

<?php get_footer(); ?>