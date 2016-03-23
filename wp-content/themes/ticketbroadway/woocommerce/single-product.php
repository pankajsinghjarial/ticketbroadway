<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
	
   var second = window.location.href.split('?')[1];
   console.log(second);
   if(second !== undefined){
	var last = window.location.href.split('=')[1];
   	var abc = window.location.href.split('?')[0];
   	window.history.pushState("StateObj", "Title", abc+last);
   }
});

</script>
<script>
	function slideLeft(id){
		$('#main-slideshow-images').animate({left: "-" + id*900 + "px"});
	}
	
	function slidego(id){
		document.getElementById('content-popup').innerHTML = '<img src="' + id + '" id="image-popup" alt="slide-1" class="img-responsive"/>';
		$("#pop-up").fadeIn("slow");
	}
	
	function fadeout(){
		$("#pop-up").fadeOut("slow");
	}
</script>
<?php
	$product = new WC_product(get_the_ID());
	global $wpdb;
	$dateNow = strtotime("now");
	$req = "SELECT * FROM wp_showDate WHERE idShow = '".get_the_ID()."' AND dateShow > '".$dateNow."' ORDER BY dateShow";
	$dateShow = $wpdb->get_results ($req);
	if(get_the_content() != ""){
	$showName = get_post(get_the_ID());
	
	$theatre = get_field('venue')->post_name;
	$slideshow_image = get_post_custom_values('wpcf-slideshow-image', get_the_ID());
	$meta = get_post_custom_values('wpcf-datetime', get_the_ID());
	$id = get_field('venue')->ID; 

	$city = get_field('city', $id);	
	//$cat = $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', '', $cat_count, 'woocommerce' ) . ' ', '</span>' );
	$imageProduct = get_the_post_thumbnail(get_the_ID(), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array() );
	if($imageProduct == ''){
		$imageProduct = '<img src="/wp-content/themes/ticketbroadway/images/nothumbnail.png" alt="no thumbnail image">';
	}
	$meta = get_post_custom_values('wpcf-duration', get_the_ID());
	$price_text = get_post_custom_values('wpcf-price-information', get_the_ID());
		
	if(isset($_GET['page'])){
		$cast_crew_single = preg_match('/(.*)-as-(.*)/', $_GET['page']);
	}
	global $wpdb; 
	$req = " SELECT * FROM wp_searchHotel WHERE name_City LIKE '%".$city."%' ";
	$res = $wpdb->get_results ($req);
?>
<style>
	@media (max-width: 992px){
		.titleShowRes {
			background: #929292 url('<?php echo $slideshow_image[0]; ?>');
			background-size: cover;
		}
	}
</style>
<div class="container">	
	<div class="row breadcrumbShow">
		<?php custom_breadcrumbs(); ?>
	</div>
	<script>
		$('#breadcrumbs').append('<li class="separator"> &gt; </li><li class="item-current"><strong class="bread-current"><a href="/shows/<?php echo $showName->post_name.'/'.$_GET['page']; ?>"><?php echo ucwords(str_replace('/', ' / ', str_replace('-', ' ', $_GET['page']))); ?></a></strong></li>');
	</script>
	<div class="row">
		<?php 
		while ( have_posts() ) : the_post(); 
			$name_venue = "venue/".$theatre;
			if(isset($_GET['page']) && $_GET['page'] == "cast-crew"){
				wc_get_template_part( 'content', 'single-product-castcrew' );
			}else if(isset($_GET['page']) && $_GET['page'] == $name_venue){
				wc_get_template_part( 'content', 'single-product-theatre' );
			}else if(isset($_GET['page']) && $_GET['page'] == "reviews"){
				wc_get_template_part( 'content', 'single-product-reviews' );
			}else if(isset($_GET['page']) && $_GET['page'] == "main"){
				wc_get_template_part( 'content', 'single-product-main' );
			}else if(isset($_GET['page']) && $cast_crew_single == 1){
				wc_get_template_part( 'content', 'single-product-castcrew-one' );
			}else if(isset($_GET['page']) && $_GET['page'] == "videos"){
				wc_get_template_part( 'content', 'single-product-videos' );
			}else if(isset($_GET['page']) && $_GET['page'] == "images"){
				wc_get_template_part( 'content', 'single-product-images' );
			}else if(isset($_GET['page']) && $_GET['page'] == "calendar"){
				wc_get_template_part( 'content', 'single-product-calendar' );
			}else{
				wc_get_template_part( 'content', 'single-product-main' );
			}
		endwhile;
		?>
		</div>
		<div class="col-md-2 sidebarShow">
			<div class="img-product">
				<?php echo $imageProduct; ?>
			</div>
			<div class="buyShow">
				<a href="/shows/<?php echo $showName->post_name; ?>/calendar"><button class="buy-button">BUY TICKETS</button></a>
			</div>
			<hr>
			<div class="row">
				<img src="http://ticketsbroadway.com/wp-content/themes/ticketbroadway/images/200GuaranteeSearch.png" alt="200 Guarantee search tickets broadway" class="guaranteeSearch">
			</div>
			<div class="col-md-12 col-xs-12 infoShow">
				<h3>THEATRE</h3>
				<?php getTheatre();?>
				<h3>DURATION</h3>
				<p><?php echo $meta[0]; ?></p>
			</div>
			<div class="col-md-12 col-xs-12">
				<!--<a href="./calendar">-->
					<div id="calendarSid">
					</div>
				<!--</a>-->
				<div class="">
					<h4>FIND A HOTEL</h4>
					<img src="<?php echo get_template_directory_uri(); ?>/images/imageHotel.jpg" class="img-responsive" alt="Buy Now">
					<p style="font-size: 12px;padding-bottom: 15px;">Get the best deals with our selection of hotels in the theater district.</p>
					<button id="bookHotel">BOOK NOW ></button>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="popUpDiv">
		<div id="contentPopUpDiv">
			<span id="quitPopUp">X</span>
			<p>Finding the best hotel close to <b><br><?php echo get_field('venue')->post_title; ?></b> in <b><?php echo $city; ?></b></p>
		</div>
	</div>
<script>
$('#bookHotel').click(function(){
	$('#popUpDiv').fadeIn('slow');	
	setTimeout(function () {
		window.open('<?php echo $res[0]->url_Search; ?>', '_blank'); 
		$('#popUpDiv').fadeOut('slow');
	}, 2000);
});

$('#quitPopUp').click(function(){
	$('#popUpDiv').fadeOut('slow');
});



</script>

<script>
	
	
	$(document).ready(function() {
		$('#calendarSid').fullCalendar({
			firstDay: 1,
			header: {
			  left: 'prev',
			  center: 'title',
			  right: 'next'
			},
		  eventLimit: true,
		  events: [],
		timeFormat: 'h:mmA '
		});
		
		$('.fc-day-number').click(function(){
			var date = $(this).attr('data-date');
			window.location.replace('/find-a-show?nameShow=<?php echo get_the_title(); ?>&date='+date, '_blank'); 
		});
		
		$('#idShowNotifyMe').attr('value', '<?php echo get_the_ID(); ?>');
	});	
	
	
</script>
	<?php }else{?>
	<div class="noContentShow">	
		<?php custom_breadcrumbs(); ?>
		<h1><?php the_title(); ?></h1>
		<p>There is no content for this show yet, but you can still buy tickets ! Click on a date below</p>
		<div id="calendarMain" class="col-md-12 col-xs-12">		
		</div>
		<?php if(count($dateShow) == 0){ ?>
		<div class="notifyMe">
			<p class="noShow">NO SHOWS CURRENTLY SCHEDULED</p>
			<p>Get Notified of The Next Performance Dates</p>
			<button id="notifPop">Notify Me</button>
		</div>
		<style>
		.notifyMe {
			top: initial !important;
			bottom: 30px !important;
		}
		</style>
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
			  left: 'title',
			  center: '',
			  right: 'prev, next'
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
	
	$('#notifPop').click(function (){
		if($('#popUpNotifyMe').css('display') == 'none'){
			$('#popUpNotifyMe').fadeIn('slow');
		}else{
			$('#popUpNotifyMe').fadeOut('slow');
		}
	});
	</script>
	<?php }get_footer( 'shop' ); ?>
