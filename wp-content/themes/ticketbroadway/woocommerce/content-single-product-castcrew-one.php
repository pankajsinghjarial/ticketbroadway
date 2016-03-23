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
 
 if ( post_password_required() ) {
	echo get_the_password_form();
	return;
 }
$theatre = get_field('venue')->post_name;
$actorInformation = array();

$postname = $_GET['page']; 
preg_match('/(.*)-as-(.*)/', $_GET['page'], $matches);
$actor_name = substr($matches[1], 10);
$actors = get_field('actors');
$descriptionRole;
$castOrCrew;
foreach($actors as $actor){
	$actorName = $actor['actor_name']->post_name;
	if($actorName == $actor_name){
		$descriptionRole = $actor['role_description'];
		$castOrCrew = $actor['cast_or_crew'];
	}
}
$args=array(
	'name' => $actor_name,
    'post_type' => 'cast-crew',
    'post_status' => 'publish',
    'posts_per_page' => 1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
	while ($my_query->have_posts()) : $my_query->the_post();	
		$images = get_field('cast-crew-gallery');
		$actorInformation["imagesActor"] = array();
		if($images != false){
			foreach($images as $key => $value){
				array_push($actorInformation["imagesActor"], array("urlImage" => $value["cast-crew-gallery-image"]["url"], "thumbnailImage" => $value['cast-crew-gallery-image']['sizes']['thumbnail'])) ;
			}
			
			if(count($actorInformation["imagesActor"]) < 4){
				for($i=0; $i<(4-count($actorInformation["imagesActor"])); $i++){
					array_push($actorInformation["imagesActor"], array("urlImage" => get_template_directory_uri()."/images/actorComingSoon.png", "thumbnailImage" => get_template_directory_uri()."/images/actorComingSoonThumb.png"));
				}
			}
		}
		$actorDescription = get_the_content();
		$actorTitle = get_the_title();
		$actorInformation["actorDescription"] = $actorDescription;
		$actorInformation["actorTitle"] = $actorTitle;
	endwhile;
}
wp_reset_query(); 

?>
<?php include 'header-product.php'; ?>
<div class="row">
	<ul id="menu-product">
		<li class="col-md-3 col-xs-3">
			<a href="<?php the_permalink(); ?>">The Show</a>
		</li>
		<li class="col-md-3 col-xs-3 selected-li">
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
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" style="margin-top: 25px;" id="shows" <?php post_class(); ?>>
	<div class="row">
		<h2><?php echo $actorInformation["actorTitle"]; ?></h2>
	</div>
	<?php if($images != false){ ?>
	<div class="row gallery-venue">
		<?php foreach($actorInformation["imagesActor"] as $key => $value){
				if($key == 0){?>
					<div class="col-md-6 col-xs-12 colMainCastOne">
						<img src="<?php echo $value["urlImage"]; ?>" title="<?php echo $value["urlImage"] ?>" class="img-gallery-<?php echo $key; ?>" alt="">
					</div>
					<div class="col-md-6 col-xs-12 thumbTheatre">
		  <?php }else if($key > 2){
						break;
				}else{ ?>
					<div class="thumbnails-gallery" id="thb-<?php echo $key; ?>">
						<img src="<?php echo $value["urlImage"]; ?>" title="<?php echo $value["urlImage"]; ?>" class="img-gallery-<?php echo $key; ?>" alt="">
					</div>
		  <?php } ?>
	    <?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<?php if($castOrCrew != 'Crew'){ ?><h2>Role Description</h2><?php } ?>
			<p><?php echo apply_filters('the_content', $descriptionRole);?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<p><?php echo apply_filters('the_content', $actorInformation["actorDescription"]);?></p>
		</div>
	</div>
</div>
<script>
$('.img-gallery-0, .img-gallery-1, .img-gallery-2, .img-gallery-3').click(function (){
	$('#pop-up').fadeIn('slow');
	$('#content-popup').html('<img src="'+$(this).attr('title')+'" alt="Image pop up">');
});
</script>
<?php
	do_action( 'woocommerce_after_single_product' ); ?>
