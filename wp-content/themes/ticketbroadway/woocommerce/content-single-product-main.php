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

do_action( 'woocommerce_before_single_product' );
	global $post, $product, $wpdb;
	$dateNow = strtotime("now");
	$req = "SELECT * FROM wp_showDate WHERE idShow = '".get_the_ID()."' AND dateShow > '".$dateNow."' ORDER BY dateShow";
	$dateShow = $wpdb->get_results ($req);
	$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
	$title = get_post_custom_values('wpcf-introduction-cast-crew', get_the_ID());
	$meta = get_post_custom_values('wpcf-duration', get_the_ID());
	$price_text = get_post_custom_values('wpcf-price-information', get_the_ID());
	$video = get_post_custom_values('wpcf-video', get_the_ID());
	if(get_post_custom_values('wpcf-story-summary-h2', get_the_ID()) != null){
		$storySummaryH2 = get_post_custom_values('wpcf-story-summary-h2', get_the_ID());
	}else{
		$storySummaryH2 = array('Story Summary');
	}
	
	if(get_post_custom_values('wpcf-opening-day-h2', get_the_ID()) != null){
		$openingDayH2 = get_post_custom_values('wpcf-opening-day-h2', get_the_ID());
	}else{
		$openingDayH2 = array('Opening Day');
	}
	
	if(get_post_custom_values('wpcf-recent-reviews-h2', get_the_ID()) != null){
		$recentReviewsH2 = get_post_custom_values('wpcf-recent-reviews-h2', get_the_ID());
	}else{
		$recentReviewsH2 = array('Recent Reviews');
	}
	
	if(get_post_custom_values('wpcf-cast-crew-h2', get_the_ID()) != null){
		$castCrewH2 = get_post_custom_values('wpcf-cast-crew-h2', get_the_ID());
	}else{
		$castCrewH2 = array('Cast & Crew');
	}
	$openingDay = get_post_custom_values('wpcf-opening-day', get_the_ID());
	$theatre = get_field('venue')->post_name;
	$i=0;
	$y = count(get_field('Magazine_reviews')) - 3;
	$reviews = array();
	while ( have_rows('Magazine_reviews') ) : the_row();
		if($i>$y){
			$magazine_title = get_sub_field('Magazine_title');
			$review_title = get_sub_field('review_title');
			$magazine_url = get_sub_field('magazine_url');
			$review_text = get_sub_field('review_text');
			$note = get_sub_field('note');
			$width = $note * 20;
			
			array_push($reviews, array($magazine_title, $review_title, $magazine_url, $review_text, $note, $width));
		}
		$i++;
	endwhile;

?>
<?php include 'header-product.php'; ?>
<div class="row">
	<ul id="menu-product">
		<li class="col-md-3 col-xs-3 selected-li">
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
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="shows" <?php post_class(); ?>>
	<div class="row photoVideo">
		<div class="col-md-6 col-xs-12 video">
			<p class="view-all">
				<a href="./videos">View all ></a>
			</p>
			<h2>Video</h2>
			<video poster="<?php echo get_template_directory_uri(); ?>/images/back-video.png" width="100%">
				<source src="<?php echo $video[0]; ?>" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
		<div class="col-md-6 col-xs-12" id="images-gallery">
			<p class="view-all">
				<a href="./images">View all ></a>
			</p>
			<h2>Photos</h2>
			<?php do_action( 'woocommerce_product_thumbnails' ); ?>
		</div>
	</div>
	
	<div class="row theaterMainRes">
		<span class="upDiv" onclick="showDiv('theaterH2')" id="upDiv-theaterH2" > - </span>
		<h2 onclick="showDiv('theaterH2')">THEATER INFO </h2>
		<div class="theaterH2">
			<?php getTheatre();?>
		</div>
	</div>
	<div class="row runtimeMainRes">
		<span class="upDiv" id="upDiv-runtimeH2" > - </span>
		<h2 onclick="showDiv('runtimeH2')">RUNTIME </h2>
		<div class="runtimeH2">
			<?php if($meta[0] != ""){ ?>
			<p><?php echo $meta[0]; ?></p>
			<?php }else{ ?>
			<p>There is no runtime information for this show yet</p>
			<?php } ?>
			
		</div>
	</div>
	<div class="row margin-20 calendarShow">
		<h2>SHOW TICKETS</h2>
		<div style="" class="filterCalendar">
			<select id="month">	
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select id="year">	
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016" selected="selected">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
			</select>
		</div>
		<div id="calendarMain" class="col-md-12 col-xs-12">
			
		</div>
		<?php if(count($dateShow) == 0){ ?>
		<div class="notifyMe">
			<p class="noShow">NO SHOWS CURRENTLY SCHEDULED</p>
			<p>Get Notified of The Next Performance Dates</p>
			<button id="notifPop">Notify Me</button>
		</div>
		
		<?php } ?>
	</div>
	<div class="row margin-20" >
		<span class="upDiv" id="upDiv-storySummary" > - </span>
		<h2 onclick="showDiv('storySummary')"><?php echo $storySummaryH2[0]; ?></h2>
		<div class="col-md-12 col-xs-12 storySummary">
			<?php if(get_the_content() != ""){ ?>
			<?php the_content(); ?>
			<?php }else{ ?>
			<p>There is no story summary for this show yet</p>
			<?php } ?>
		</div>
	</div>
	<div class="row margin-20" >
		<span class="upDiv" id="upDiv-openingDayH2" > - </span>
		<h2 onclick="showDiv('openingDayH2')"><?php echo $openingDayH2[0]; ?></h2>
		<div class="col-md-12 col-xs-12 openingDayH2">
			<?php if($openingDay[0] != ""){ ?>
			<p><?php echo $openingDay[0]; ?></p>
			<?php }else{ ?>
			<p>There is no opening day information for this show yet</p>
			<?php } ?>
		</div>
	</div>
	<div class="row margin-20">
		<p class="view-all"><a href="./reviews">View all ></a></p>
		<h2 id="recentReviews"><?php echo $recentReviewsH2[0]; ?></h2>
		<div class="col-md-6 col-xs-12 recentReviews" style="    padding-right: 30px;">
			<?php if($reviews[0] != ""){ ?>
			<h3><?php echo $reviews[0][1]; ?></h3>
			<div class="star-rating">
				<span style="width:<?php echo $reviews[0][5]; ?>%"><?php echo $reviews[0][4]; ?></span>
			</div>
			<?php echo $reviews[0][3]; ?>
			<p class="review_mag_name">Review by <?php echo $reviews[0][0]; ?></p>
			<?php }else{ ?>
			<p>There is no reviews for this show yet</p>
			<?php } ?>
		</div>
		<div class="col-md-6 col-xs-12 recentReviews" style="    padding-right: 30px;">
			<?php if($reviews[1] != ""){ ?>
			<h3><?php echo $reviews[1][1]; ?></h3>
			<div class="star-rating">
				<span style="width:<?php echo $reviews[1][5]; ?>%"><?php echo $reviews[1][4]; ?></span>
			</div>
			<?php echo $reviews[1][3]; ?>
			<p class="review_mag_name">Review by <?php echo $reviews[1][0]; ?></p>
			<?php }else{ ?>
			<p>There is no reviews for this show yet</p>
			<?php } ?>
		</div>
	</div>
	<div class="row margin-20">
		<p class="view-all"><a href="./cast-crew">View all ></a></p>
		<h2 id="castCrewH2"><?php echo $castCrewH2[0]; ?></h2>
		<div class="col-xs-12 col-md-12 margin-20b castCrewH2">
			<?php echo apply_filters('the_content', $title[0]); ?>
		</div>
		<div class="col-xs-12 col-md-6 border-right castCrewH2">
			<h2 class="w90">Cast</h2>
			<?php getCastMain('Casting'); ?>
		</div>
		<div class="col-xs-12 col-md-6 crewP castCrewH2">
			<h2>Crew</h2>
			<?php getCastMain('Crew'); ?>
		</div>
	</div>
	<a href="./calendar"><img src="<?php echo get_template_directory_uri(); ?>/images/button-front.png" class="buyNowResBottom" style="" alt="Buy Now"></a>
</div>

<script>
	/*var d = new Date(), n = d.getMonth();
	$('#month option:eq('+n+')').prop('selected', true);*/
	
	$('#day').on('change', function(){goToMonth();});
	$('#month').on('change', function(){goToMonth();});
	$('#year').on('change', function(){goToMonth();});
	
	
	
	function goToMonth(){
		var montht = $('#month').val();
		var yeart = $('#year').val();
		var local = $.fullCalendar.moment(yeart+'-'+montht+'-01T12:00:00');
		$('#calendarMain').fullCalendar('gotoDate', local);
	}

	function showDiv(classDiv){
		if($('.'+classDiv).css('display') == 'none'){
			$('.'+classDiv).slideDown('slow');
			$('#upDiv-'+classDiv).html('-');
		}else{
			$('.'+classDiv).slideUp('slow');
			$('#upDiv-'+classDiv).html('+');
		}
	}
	
	var width = $(window).width();
	if((width < 980)){
		$('.upDiv').html('+');
	}
	
	$('#recentReviews').click(function(){
		if($('.recentReviews').css('display') == 'none'){
			$('.recentReviews').slideDown('slow');
		}else{
			$('.recentReviews').slideUp('slow');
		}
	});
	
	$('#castCrewH2').click(function(){
		if($('.castCrewH2').css('display') == 'none'){
			$('.castCrewH2').slideDown('slow');
		}else{
			$('.castCrewH2').slideUp('slow');
		}
	});
	
	$('#notifPop').click(function (){
		if($('#popUpNotifyMe').css('display') == 'none'){
			$('#popUpNotifyMe').fadeIn('slow');
		}else{
			$('#popUpNotifyMe').fadeOut('slow');
		}
	});
	
	
</script>
<?php 
	
	$script_start = "<script>
	$(document).ready(function() {
		// page is now ready, initialize the calendar...
		$('#calendarMain').fullCalendar({
			height: 300,
			defaultView: 'basicWeek',
			firstDay: 1,
			header: {
			  left: 'title, next',
			  center: '',
			  right: ''
			},
		  eventLimit: true,
		  events: [";
	$count_meta = count($dateShow);
	$i=1;
	foreach($dateShow as $date){
		$time_formated = date('Y-m-d', $date->dateShow).'T'.date('H:i:s', $date->dateShow);
		if($i == $count_meta){
			$script_start .= "{title: '', start: '".$time_formated."', url: 'http://ticketsbroadway.com/ticket-result/?eventID=".$date->idDateApi."'}";	 
		}else{
			$script_start .= "{title: '', start: '".$time_formated."', url: 'http://ticketsbroadway.com/ticket-result/?eventID=".$date->idDateApi."'},";	
		}
		$i++;
	}
	$script_end = " ],
		eventClick: function(event) {
			if (event.url) {
				window.open(event.url);
				return false;
			}
		},
		timeFormat: 'h:mmA'
		});
	});	
	</script>";
	echo $script_start.$script_end;	
	?>
<script>$('.video').click(function(){this.paused?this.play():this.pause();});
$( document ).ready(function() {
	
	var firstDate = '<?php echo date('Y-m-d', $dateShow[0]->dateShow).'T'.date('H:i:s', $dateShow[0]->dateShow); ?>';
	
	if(firstDate != '1970-01-01T00:00:00'){
		var firstDateMom = $.fullCalendar.moment(firstDate);
	}else{
		var firstDate = '<?php echo date('Y-m-d').'T'.date('H:i:s'); ?>';
		var firstDateMom = $.fullCalendar.moment(firstDate);
	}
	var n = <?php echo date('m', $dateShow[0]->dateShow); ?>-1;
	$('#month option:eq('+n+')').prop('selected', true);
	$('#calendarMain').fullCalendar('gotoDate', firstDateMom);
});
</script>
<?php do_action( 'woocommerce_after_single_product' ); ?>
