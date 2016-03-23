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
?>
<style>
	.notifyMe {
		top: initial;
		bottom: 0%;
	}
	</style>
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
	 
	 $title = get_post_custom_values('wpcf-introduction-cast-crew', get_the_ID());
	 $theatre = get_field('venue')->post_name;
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
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="shows" <?php post_class(); ?>>
	<div class="row">
		<h2>Actors<span id="showActors">-</span></h2>
		<?php getCast(); ?>
		<?php getCrew(); ?>
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
if((width < 980)){
	$('#showActors').html('+');
	$('.showCrew').html('+');
}
	
	
	$('#showActors').click(function (){
	if($('.actors').css('display') == 'none'){
		$('.actors').slideDown('slow');
		$('#showActors').html('-');
	}else{
		$('.actors').slideUp('slow');
		$('#showActors').html('+');
	}
	
});	

function showCrew(id){
	if($('#crew-'+id).css('display') == 'none'){
		$('#crew-'+id).slideDown('slow');
		$('#showCrew-'+id).html('-');
	}else{
		$('#crew-'+id).slideUp('slow');
		$('#showCrew-'+id).html('+');
	}
}
</script>
<?php
	do_action( 'woocommerce_after_single_product' ); ?>
