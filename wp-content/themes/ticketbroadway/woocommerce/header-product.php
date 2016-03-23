<?php 
if(isset($_GET['page']) && $_GET['page'] == 'calendar'){?>
<div id="content" class="col-md-12" role="main">
	<div class="row titleShowRes">
		<div class="col-md-4 col-xs-3 imgProductRes">
			<?php echo get_the_post_thumbnail(get_the_ID(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array() ); ?>
		</div>
		<div class="col-md-8 col-xs-9 titleShow">
			<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?> TICKETS</h1>
			<div class="infoShowRes">
				<p><?php echo $cat; ?></p>
				<img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" alt="Buy Now">
			</div>
		</div>
	</div>
<?php }else{ ?>
<div id="content" class="col-md-10" role="main">

	<div class="row titleShowRes">
		<div class="col-md-4 col-xs-3 imgProductRes">
			<?php echo get_the_post_thumbnail(get_the_ID(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array() ); ?>
		</div>
		<div class="col-md-8 col-xs-9 titleShow">
			<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
			<div class="infoShowRes">
				<p><?php echo $cat; ?></p>
				<a href="./calendar"><img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" alt="Buy Now"></a>
			</div>
		</div>
	</div>
	<?php } ?>