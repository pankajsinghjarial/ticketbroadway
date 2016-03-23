<?php 
	$args = array(
			'post_type' => 'product',
			'posts_per_page' => 4,
			'orderby' => 'ASC',
			);
	$the_query = new WP_Query( $args );
	$array_product = array();
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$product = new WC_product(get_the_ID());			$duration = get_post_custom_values('wpcf-duration', get_the_ID());			$venue = get_field('venue');			$slideshow_image = get_post_custom_values('wpcf-slideshow-image', get_the_ID());
			array_push($array_product, array($product, $duration[0], $venue, $slideshow_image[0]));
		}
	} else {
		// no posts found
	}
?>
<div id="slideshow">
	<div id="main-slide" class="main-slide"></div>
	<div class="thumbnails-slides">
		<?php foreach($array_product as $key => $show){ ?>
			<div class="thumbnail-show" id="<?php echo 'thumb-'.$key; ?>" onclick="select(<?php echo $key; ?>);">				<?php $image = get_the_post_thumbnail($show[0]->id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array('title'	=> 'Image title','alt'	=> 'image alt') ); ?>				<div class="img-thumbslide">					<?php echo $image; ?>				</div>				<div class="right-thumbslide">					<p class="title"><?php echo $show[0]->post->post_title; ?></p>					<p class="theatre"><a href="<?php echo $show[2]->post_name; ?>"><?php echo $show[2]->post_title; ?></a></p>					<button class="buy-button-home">BUY TICKETS</button>				</div>
			</div>
		<?php } ?>
	</div>
</div>
<script>var tab = [];</script>
<?php	
foreach($array_product as $product){		
	$product[0]->get_image();		
	echo "<script>tab.push([".$product[0]->id.", '".$product[0]->post->post_title."', '".$product[0]->get_image()."', '".$product[1]."', '".$product[2]->post_name."','".$product[2]->post_title."','".$product[3]."']);</script>";	
}
?>
<script>	
	document.getElementById('main-slide').innerHTML = '<div class="right-side-content-slide"><h2><?php echo $array_product[0][0]->post->post_title; ?></h2><h3>theatre</h3><p><a href="<?php echo $array_product[0][2]->post_name; ?>"><?php echo $array_product[0][2]->post_title; ?></a></p><h3>Duration</h3><p><?php echo $array_product[0][1]; ?></p></div>';	
	document.getElementById('main-slide').style.background = "url('<?php echo $array_product[0][3]; ?>')";	
	document.getElementById('thumb-0').className = 'thumbnail-show thumb-select';
	function select(id){
		$.ajax({
			type: 'post',
			url: '/ticketbroadway/wp-content/themes/ticketbroadway/exeslide.php',
			data: {
			   idshow: id, 			   
			   tabshows: tab
			},
			success: function(result) {				
				var foo = JSON.parse(result);
				document.getElementById('main-slide').innerHTML = foo[0];				
				document.getElementById('main-slide').style.background = "url('" + foo[1] + "')";				
				tab.forEach(function logArrayElements(element, index, array) {					
					document.getElementById('thumb-' + index).className = 'thumbnail-show';	
				});	
				document.getElementById('thumb-' + id).className = 'thumbnail-show thumb-select';
			}
		  });
	}
</script>



