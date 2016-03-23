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
	
	global $post, $product, $wpdb;
	$dateNow = strtotime("now");
	$req = "SELECT * FROM wp_showDate WHERE idShow = '".get_the_ID()."' AND dateShow > '".$dateNow."'";
	$dateShow = $wpdb->get_results ($req);
	$theatre = get_field('venue');
	$location = get_field('address', $theatre->ID);
	if($location != ""){
		$adressFormat = str_replace(" ","+",$location);
		$page = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$adressFormat);
		$result = json_decode($page);
		$results = $result->results;
		$lat = $results[0]->geometry->location->lat;
		$long = $results[0]->geometry->location->lng;
		$loca = explode(',', $location);
	}
	
	$other_info = get_field('other_information', $theatre->ID);
	$value = get_field('gallery', $theatre->ID);
?>
<style>
	.notifyMe {
		top: initial;
		bottom: 0%;
	}
	</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<script type="text/javascript">

	
(function($) {
	function new_map( $el ) {
		// var
		var $markers = $el.find('.marker');
		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};
		// create map	        	
		var map = new google.maps.Map( $el[0], args);
		// add a markers reference
		map.markers = [];
		// add markers
		$markers.each(function(){
			add_marker( $(this), map );
		});
		// center map
		center_map( map );
		// return
		return map;
	}
	function add_marker( $marker, map ) {
		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});
		// add to array
		map.markers.push( marker );
		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});
			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, marker );
			});
		}
	}
	function center_map( map ) {
		// vars
		var bounds = new google.maps.LatLngBounds();
		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );
		});
		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
			map.setCenter( bounds.getCenter() );
			map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}
	}
	var map = null;
	$(document).ready(function(){
		$('.acf-map').each(function(){
			// create map
			map = new_map( $(this) );
		});
	});
})(jQuery);
</script>
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
		<li class="col-md-3 col-xs-3 selected-li">
			<a href="<?php the_permalink(); ?>venue/<?php echo $theatre->post_name; ?>">Venue</a>
		</li>
		<li class="col-md-3 col-xs-3">
			<a href="<?php the_permalink(); ?>reviews">Reviews</a>
		</li>
	</ul>
</div>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="shows" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-12 col-xs-12" id="historyTheatre">
			<h2><?php echo $theatre->post_title;?></h2>
			<p><?php echo apply_filters('the_content', $theatre->post_content);?></p>
		</div>
	</div>
	<?php if(!empty($value)){ ?>
	<div class="row gallery-venue">
		<?php foreach($value as $key => $image){ 
				if($key == 0){?>
					<div class="col-md-10 col-xs-12" style="height: inherit;">
						<img src="<?php echo $value[$key]['image-venue']['url']; ?>" class="img-gallery-<?php echo $key; ?>" alt="">
					</div>
					<div class="col-md-2 col-xs-12 thumbTheatre">
		  <?php }else if($key > 3){
						break;
				}else{ ?>
					<div class="thumbnails-gallery" id="thb-<?php echo $key; ?>">
						<img src="<?php echo $value[$key]['image-venue']['sizes']['thumbnail']; ?>" class="img-gallery-<?php echo $key; ?>" alt="">
					</div>
		  <?php } ?>
	    <?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<h3>Details on <?php echo $theatre->title;?> Accessibility</h3>
		<?php echo $other_info; ?>
	</div>
	<hr>
	<div class="row locationTheatre">
		<div class="col-md-4 col-xs-12">
			<img src="<?php echo get_template_directory_uri(); ?>/images/pint-address.png" alt="Point address">
			<p class="adtext">
			<?php foreach($loca as $line){  ?>
			<?php		echo $line.'<br>';	?>
			<?php } 						?>
			</p>
		</div>
		<div class="col-md-8 col-xs-12">
			<div id="map" class="acf-map">
				<div class="marker" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $long; ?>"></div>
			</div>
		</div>
	</div>
	<div class="row calendarTheatre">
		<h2>SELECT DATE AND TIME</h2>
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
		<div id="calendarMain">
		</div>
		<?php if(count($dateShow) == 0){ ?>
		<div class="notifyMe">
			<p class="noShow">NO SHOWS CURRENTLY SCHEDULED</p>
			<p>Get Notified of The Next Performance Dates</p>
			<button id="notifPop">Notify Me</button>
		</div>
		
		<?php } ?>
	</div>
</div>

<script>
var d = new Date(), n = d.getMonth();
$('#month option:eq('+n+')').prop('selected', true);

$('.img-gallery-0, .img-gallery-1, .img-gallery-2, .img-gallery-3').click(function (){
	$('#pop-up').fadeIn('slow');
	$('#content-popup').html('<img src="'+$(this).attr('src')+'" alt="Image pop up">');
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

<script>
	$('#day').on('change', function(){goToMonth();});
	$('#month').on('change', function(){goToMonth();});
	$('#year').on('change', function(){goToMonth();});
	
	function goToMonth(){
		var montht = $('#month').val();
		var yeart = $('#year').val();
		var local = $.fullCalendar.moment(yeart+'-'+montht+'-01T12:00:00');
		$('#calendarMain').fullCalendar('gotoDate', local);
	}
	
	var width = $(window).width();
	if(width < 980){
		if($('#historyTheatre').height() > 300){
			$('#historyTheatre').css('height', '300px');
			$('#historyTheatre').css('overflow', 'hidden');
			$('#historyTheatre').css('margin-bottom', '10px');
			$('#historyTheatre').after('<p id="readMoreHis">See More</p>');
			
			
		}
	}
	
	$('#readMoreHis').click(function (){
		if($('#historyTheatre').css('height') == '300px'){
			$('#historyTheatre').slideDown(3000, function(){$(this).css('height', 'auto');});
		}else{
			$('#historyTheatre').animate({height: '300px'});
		}
	});
</script>
<?php do_action( 'woocommerce_after_single_product' ); ?>

