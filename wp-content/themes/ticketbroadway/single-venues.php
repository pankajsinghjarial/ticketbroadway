<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 

global $wpdb;
$req = " SELECT DISTINCT ID, post_title FROM wp_posts WHERE post_type = 'product' AND post_status = 'publish' ";
$res = $wpdb->get_results ($req);


$currentTheater = get_post(get_the_ID());
$dateTheater = array();

$location = get_field('address', get_the_ID());
$loca = explode(', ', $location);
$other_info = get_field('other_information', get_the_ID());
$value = get_field('gallery', get_the_ID());
get_header(); ?>
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
<div id="primary" class="col-md-10 site-content">
	
	<?php if(get_the_content() != null){ ?>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h1><?php echo the_title();?></h1>
			<p><?php echo the_content();?></p>
		</div>
	</div>
	<?php if(!empty($value)){ ?>
	<div class="row gallery-venue">
		<?php foreach($value as $key => $image){ 
				if($key == 0){?>
					<div class="col-md-10 col-xs-12" style="height: inherit;">
						<img src="<?php echo $value[$key]['image-venue']['url']; ?>" class="img-gallery-<?php echo $key; ?>" alt="">
					</div>
					<div class="col-md-2 col-xs-4">
		  <?php }else if($key > 3){
						break;
				}else{ ?>
					<div class="thumbnails-gallery">
						<img src="<?php echo $value[$key]['image-venue']['sizes']['thumbnail']; ?>" class="img-gallery-<?php echo $key; ?>" alt="">
					</div>
		  <?php } ?>
	    <?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<h3>Details on <?php echo the_title();?></h3>
		<?php echo $other_info; ?>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<img src="<?php echo get_template_directory_uri(); ?>/images/pint-address.png" alt="Point address">
			<p class="adtext">
			<?php foreach($loca as $line){  ?>
			<?php		echo $line.'<br>';	?>
			<?php } 						?>
			</p>
		</div>
		<div class="col-md-8 col-xs-12">
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<h2>SELECT DATE AND TIME</h2>
		<div style="" class="filterCalendar">
			<select id="month">	
				<option value="01" selected="selected">January</option>
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
		<div class="col-md-12 col-xs-12" id="calendar">
		</div>
	</div>
	<?php }else{ echo 'There is no content for this venue yet';} ?>
</div><!-- #primary -->
<?php 
	if($dateTheater != null){
		$script_start = "<script>
		$(document).ready(function() {
			// page is now ready, initialize the calendar...
			$('#calendar').fullCalendar({
				firstDay: 1,
				header: {
				  left: 'title',
				  center: '',
				  right: ''
				},
			  eventLimit: true,
			  events: [";
		$count_meta = count($dateTheater);
		$i=1;
		foreach($dateTheater as $key => $date){
			$time_formated = date('Y-m-d', $date["date"]).'T'.date('H:i:s', $date["date"]);
			if($i == $count_meta){
				$script_start .= "{title: '> ".$date["showTitle"]."', start: '".$time_formated."'}";	 
			}else{
				$script_start .= "{title: '> ".$date["showTitle"]."', start: '".$time_formated."'},";	
			}
			$i++;
		}
		$script_end = " ],
			timeFormat: 'h:mmA '
			});
		});	
		</script>";
		echo $script_start.$script_end;	
	}else{
		echo "<script> 
		$(document).ready(function() {
			$('#calendar').text('There is no date for this show yet');
		});
		</script>";
	}
	
?>

<script>
	$('#day').on('change', function(){goToMonth();});
	$('#month').on('change', function(){goToMonth();});
	$('#year').on('change', function(){goToMonth();});
	
	function goToMonth(){
		var montht = $('#month').val();
		var yeart = $('#year').val();
		var local = $.fullCalendar.moment(yeart+'-'+montht+'-01T12:00:00');
		$('#calendar').fullCalendar('gotoDate', local);
	}
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>