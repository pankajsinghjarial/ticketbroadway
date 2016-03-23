<?php 

	$args = array(
			'post_type' => 'product',
			'posts_per_page' => 4,
			'post_status' => 'publish',
			'order' => 'ASC',
			'orderby' => 'date'
			);
	$the_query = new WP_Query( $args );
	$array_product = array();
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$product = new WC_product(get_the_ID());			
			$duration = get_post_custom_values('wpcf-duration', get_the_ID());			
			$venue = get_field('venue');			
			$slideshow_image = get_post_custom_values('wpcf-slideshow-image', get_the_ID());
			array_push($array_product, array($product, $duration[0], $venue, $slideshow_image[0]));?>
			
		<?php 
		}
	} else {
	}
?>
<div id="slideshow">
	<?php foreach($array_product as $key => $show){ ?>
		<div id="main-slide-<?php echo $key;?>" style="background: url(<?php echo $show[3]; ?>); background-size: 100% 100%;" class="main-slide">
			<a id="goLeft" onclick="select(3)" > < </a>
			<div class="left-side-content-slide">
				<a class="buyNow" href="./shows/<?php echo $show[0]->post->post_name; ?>"><?php $image = get_the_post_thumbnail($show[0]->id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array('title'	=> 'Image title','alt'	=> 'image alt') ); 
				echo $image; ?></a>
			</div>
			<div class="right-side-content-slide">
				<h2><?php echo $show[0]->post->post_title; ?></h2>
				<h3>Theatre</h3>
				<p class="ptheatre"><a href="<?php echo $show[2]->post_name; ?>"><?php echo $show[2]->post_title; ?></a></p>
				<h3>Duration</h3>
				<p class="pduration"><?php echo $show[1]; ?></p>
				<a class="buyNow" href="./shows/<?php echo $show[0]->post->post_name; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" class="margin-20" alt="Buy Now"></a>
				<p class="moreInfoSlide margin-10"><a href="./shows/<?php echo $show[0]->post->post_name; ?>">More Info</a> ></p>
			</div>
			<a id="goRight" onclick="select(1)"> > </a>
		</div>
	<?php } ?>
	<div class="thumbnails-slides">
		<div id="thumbnails-slides-selected" style="top: 0px"></div>
		<?php foreach($array_product as $key => $show){ ?>
			<div class="thumbnail-show" id="<?php echo 'thumb-'.$key; ?>" onclick="select(<?php echo $key; ?>);">				
				<?php $image = get_the_post_thumbnail($show[0]->id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array('title'	=> 'Image title','alt'	=> 'image alt') ); ?>				
				<div class="img-thumbslide">					
					<a href="./shows/<?php echo $show[0]->post->post_name; ?>"><?php echo $image; ?>	</a>			
				</div>				
				<div class="right-thumbslide">					
					<p class="title"><?php echo $show[0]->post->post_title; ?></p>					
					<p class="theatre"><a href="<?php echo $show[2]->post_name; ?>"><?php echo $show[2]->post_title; ?></a></p>					
					<button class="buy-button-home width-80"><a href="./shows/<?php echo $show[0]->post->post_name; ?>">BUY TICKETS</a></button>				
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<script>	
var i = 0;
function slide(){
	var numberProduct = <?php echo count($array_product); ?>;
	var initial_top = $('#thumbnails-slides-selected').css('top');
	var top1 = parseInt(initial_top);
	switch(initial_top){
		case '0px':
			$("#main-slide-1").fadeIn("slow");
			$("#main-slide-0").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(3)");
			$('#goRight').attr("onclick", "select(1)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[1][0]->post->post_name; ?>");
			$("#thumbnails-slides-selected").animate({top: '125px'});
			break;
		case '125px':
			$("#main-slide-2").fadeIn("slow");
			$("#main-slide-1").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(0)");
			$('#goRight').attr("onclick", "select(2)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[2][0]->post->post_name; ?>");
			$("#thumbnails-slides-selected").animate({top: '250px'});
			break;
		case '250px':
			$("#main-slide-3").fadeIn("slow");
			$("#main-slide-2").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(1)");
			$('#goRight').attr("onclick", "select(3)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[3][0]->post->post_name; ?>");
			$("#thumbnails-slides-selected").animate({top: '375px'});
			break;
		case '375px':
			$("#main-slide-0").fadeIn("slow");
			$("#main-slide-3").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(2)");
			$('#goRight').attr("onclick", "select(0)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[0][0]->post->post_name; ?>");
			$("#thumbnails-slides-selected").animate({top: '0px'});
			break;
	}
}
setInterval("slide()", 4000);

function select(id){
	switch (id){
		case 0 : 
			$("#thumbnails-slides-selected").animate({top: '0px'});
			$("#main-slide-0").fadeIn("slow");
			$("#main-slide-1").fadeOut("slow");
			$("#main-slide-2").fadeOut("slow");
			$("#main-slide-3").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(3)");
			$('#goRight').attr("onclick", "select(1)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[0][0]->post->post_name; ?>");
			break;
		case 1 :
			$("#thumbnails-slides-selected").animate({top: '125px'});
			$("#main-slide-1").fadeIn("slow");
			$("#main-slide-0").fadeOut("slow");
			$("#main-slide-2").fadeOut("slow");
			$("#main-slide-3").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(0)");
			$('#goRight').attr("onclick", "select(2)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[1][0]->post->post_name; ?>");
			break;
		case 2 :
			$("#thumbnails-slides-selected").animate({top: '250px'});
			$("#main-slide-2").fadeIn("slow");
			$("#main-slide-0").fadeOut("slow");
			$("#main-slide-1").fadeOut("slow");
			$("#main-slide-3").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(1)");
			$('#goRight').attr("onclick", "select(3)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[2][0]->post->post_name; ?>");
			break;
		case 3 :
			$("#thumbnails-slides-selected").animate({top: '375px'});
			$("#main-slide-3").fadeIn("slow");
			$("#main-slide-0").fadeOut("slow");
			$("#main-slide-1").fadeOut("slow");
			$("#main-slide-2").fadeOut("slow");
			$('#goLeft').attr("onclick", "select(2)");
			$('#goRight').attr("onclick", "select(0)");
			$('#buyTicketsRes').attr("href", "./shows/<?php echo $array_product[3][0]->post->post_name; ?>");
			break;
	}
}
</script>



