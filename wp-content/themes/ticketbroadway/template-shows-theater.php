<?php
/**
* Template Name: Shows and Theater
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/


global $wpdb;


while ( have_posts() ) : the_post(); 
	$idCity = get_the_content();
endwhile; 
$titleCity = get_post($idCity)->post_title;
$myArray = explode(' - ', $titleCity);
$venues = 'SELECT DISTINCT post_title, ID FROM wp_posts, wp_postmeta WHERE meta_value LIKE "%'.$myArray[0].'%" and post_id = ID and post_type = "venues"';
$allShow = array();
$infoVenues = array();
$result2 = $wpdb->get_results($venues);

foreach($result2 as $key => $venue){
	$getShow = 'SELECT DISTINCT ID FROM wp_posts, wp_postmeta WHERE meta_value = "'.$venue->ID.'" and post_id = ID and post_type = "product"';
	
	$shows = $wpdb->get_results ($getShow);
	foreach($shows as $show){
	
		$post = get_post($show->ID);
		if($post->post_content != ""){
			$image_link  = getPoster($show->ID);
			array_push($allShow, array("title" => $post->post_title, "postName" => $post->post_name, "urlShow" => $image_link));
		}
	}
	
	$title = $venue->post_title;
	$address = get_field('address', $venue->ID);
	$image = get_field('gallery', $venue->ID);
	$description = get_post($venue->ID)->post_content;
	if($description == ""){
		$description = "No description for this venue yet";
	}else{
		$description = str_replace('<h3><em>HISTORY</em></h3>', '', get_post($venue->ID)->post_content);
	}
	array_push($infoVenues, array("title" => $title, "post_name" => get_post($venue->ID)->post_name, "address" => $address, "description" => $description));
}
$state = get_field('state', $idCity);
$tips_and_tricks = get_field('tips_and_tricks', $idCity);
$introductionCity = get_field('introductionCity', $idCity);
$teasing_paragraph = get_field('teasing_paragraph', $idCity);
$theatrical_history = get_field('theatrical_history', $idCity);
$imagecity = get_field('imagecity', $idCity);

get_header();
custom_breadcrumbs();?>
<style>#innerSlideshowProduct{
	<?php if(count($allShow) > 10){?>
		width: 2480px;
	<?php }else{?>
		width: <?php echo (count($allShow)*220).'px'; ?>;
	<?php } ?>
}</style>
<div class="col-md-10 col-xs-12" id="content">
	<?php if($introductionCity != ""){ ?>
	<div class="row showInFront">
		<div class="arrowSlide" id="goLeftProduct">
			<img src="<?php echo get_template_directory_uri(); ?>/images/arrowLeft.png" alt="Image alt">
		</div>
		<div id="slideshowProduct">
			<div id="innerSlideshowProduct">
				<?php foreach($allShow as $key => $show){ ?>
				<div class="imgSlideshowProduct" id="imgSlideshowProduct-<?php echo $key; ?>">
					<div class="innerImgSlideshowProduct" id="inner-imgSlideshowProduct-<?php echo $key; ?>">
						<a href="<?php echo '/shows/'.$show['postName']; ?>/calendar"><img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" style="width: 55%; margin: 230px auto 0;" alt="Buy Now"></a>
					</div>
					<img src="<?php echo $show['urlShow']; ?>" class="imgSlide" alt="Image alt">
					
				</div>
				<?php 
						if($key == 9){
							break;
						}
					} ?>
			</div>
		</div>
		<div class="arrowSlide" id="goRightProduct">
			<img src="<?php echo get_template_directory_uri(); ?>/images/arrowRight.png" alt="Image alt">
		</div>
	</div>
	<h1><?php echo get_the_title(); ?></h1>
	<div class="row introductionCity">
		<div class="col-md-5">
			<img src="<?php echo $imagecity[0]['image_city']['url']; ?>" alt="Image alt">
		</div>
		<div class="col-md-7">
			<?php echo apply_filters('the_content', $introductionCity); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 teasing_paragraph">
			<?php echo apply_filters('the_content', $teasing_paragraph); ?>
		</div>
		<div class="col-md-6">
			<div class="tipandtricks">
				<div class="tipsandtrickContent">
					<p class="tiptitle">TIPS & TRICKS</p>
					<ul>
						<?php foreach($tips_and_tricks as $key => $tips){ ?>
							<li><?php echo $tips['tip_or_trick']; ?></li>
						<?php 
							if($key == 2){
								break;
							}
						} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row margin-top-30">
		<h3>THEATRICAL HISTORY AND GEE WHIZ</h3>
		<div class="col-md-7 theatrical_history">
			<?php echo apply_filters('the_content', $theatrical_history); ?>
		</div>
		<div class="col-md-5">
			<img src="<?php echo $imagecity[1]['image_city']['url']; ?>" alt="Image alt">
		</div>
	</div>
	<?php } ?>
	<h3>THEATRES</h3>
	<?php foreach($infoVenues as $key => $venue){ ?>
		<div class="row rowTheater">
			<div class="col-md-3">
				<img src="<?php echo get_template_directory_uri(); ?>/images/bigstock-Fisheye-lens-photo-of-Times-Sq-110965532.jpg" alt="Image alt">
			</div>
			<div class="col-md-9">
				<a href="/venues/<?php echo $venue['post_name']; ?>">
					<p class="title"><?php echo $venue['title']; ?></p>
					<p style="font-weight: 100;     margin-top: 5px;"><?php echo substr($venue['description'], 0, 250).'...'; ?></p>
					<p class="address"><?php echo str_replace(',', ', ', $venue['address']); ?></p>
				</a>
			</div>
		</div>
	<?php } ?>
</div>
<script>
	$('#goLeftProduct').click(function(){
		if($('#innerSlideshowProduct').css('left') == '0px'){
			var gotoLeft = $('.imgSlideshowProduct').length * 132;
			$('#innerSlideshowProduct').animate({left: -gotoLeft});
		}else{
			$('#innerSlideshowProduct').animate({left: '+=220px'});
		}
	});
	
	$('#goRightProduct').click(function(){
		if($('#innerSlideshowProduct').css('left') == '-'+($('.imgSlideshowProduct').length * 132)+'px'){
			$('#innerSlideshowProduct').animate({left: '0px'});
		}else{
			$('#innerSlideshowProduct').animate({left: '-=220px'});
		}
		
	});
	
	$('.imgSlideshowProduct').mouseenter(function(){
		console.log('#inner-'+$(this).attr('id'));
		$('#inner-'+$(this).attr('id')).fadeIn('slow');
	});
	
	$('.imgSlideshowProduct').mouseleave(function(){
		$('#inner-'+$(this).attr('id')).fadeOut('slow');
	});
</script>
   <?php get_sidebar('city');	?>
<?php get_footer();	?>