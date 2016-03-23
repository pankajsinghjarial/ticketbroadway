<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
 if(!is_account_page()){
 
while ( have_posts() ) : the_post(); 
	$idCity = get_the_content();
endwhile; 
$fullCity = get_post($idCity)->post_title;
$city = explode(' - ', $fullCity);
global $wpdb; 
$req = " SELECT * FROM wp_searchHotel WHERE name_City LIKE '%".$city[0]."%' ";
$res = $wpdb->get_results ($req);

?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="col-md-2 col-xs-0 sidebarCity" role="complementary">
			<div class="searchCity">
				<p>SEARCH:</p>
				<form action="<?php echo esc_url( get_permalink(241) ); ?>" method="POST">
					<input type="text" onkeyup="autoCompletion()" autocomplete="off" name="nameShowSearch" placeholder="Search For Events">
					<input type="hidden" name="nameCitySearch" value="<?php echo $city[0]; ?>" placeholder="City or Zip"/>
				</form>
			</div>
			<div id="calendarSid">
			</div>
			<h4>FIND A HOTEL</h4>
			<img src="http://ticketsbroadway.com/wp-content/themes/ticketbroadway/images/imageHotel.jpg" class="img-responsive" alt="Buy Now">
			<p style="font-size: 12px;padding-bottom: 15px;">Get the best deals with our selection of hotels in the theater district.</p>
			<button id="bookHotel">BOOK NOW ></button>
		</div><!-- #secondary -->
	<?php endif; ?>
<div id="popUpDiv">
		<div id="contentPopUpDiv">
			<span id="quitPopUp">X</span>
			<p>Finding the best hotel in <b><?php echo $city[0]; ?></b></p>
		</div>
	</div>
<script>
	$('#bookHotel').click(function(){
		$('#popUpDiv').fadeIn('slow');	
		setTimeout(function () {
			window.location.replace("<?php echo $res[0]->url_Search; ?>"); 
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
			var city = '<?php echo $city[0]; ?>';
			window.open('/find-a-show?nameCitySearch='+city+'&date='+date, '_blank'); 
		});
		
		$('#idShowNotifyMe').attr('value', '<?php echo get_the_ID(); ?>');
	});	
	
	
</script>
<?php  } ?>