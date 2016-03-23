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

$array = array(7147, 23439, 7188, 23444, 7187, 23540);
$random = rand(0, 5);
$idVenue = get_field('venue', $array[$random]);
$theater = get_post($idVenue)->post_title;
$city = get_field('city', get_field('venue', $array[$random]));	
global $wpdb; 
$req = " SELECT * FROM wp_searchHotel WHERE name_City LIKE '%".$city."%' ";
$res = $wpdb->get_results ($req);
$image = get_the_post_thumbnail($array[$random]);
if($image == ''){
		$image = '<img src="/wp-content/themes/ticketbroadway/images/nothumbnail.png" width="100%" alt="no thumbnail image">';
	}
$req2 = "SELECT * FROM wp_showDate WHERE idShow = ".$array[$random];
$res2 = $wpdb->get_results ($req2);
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="col-md-2 col-xs-0 sidebarMain" role="complementary">
			<?php echo $image; ?>
			<a href="<?php echo esc_url( get_permalink($array[$random]) ); ?>"><img src="http://ticketsbroadway.com/wp-content/themes/ticketbroadway/images/button-front.png" class="margin-20" alt="Buy Now"></a>
			<h4>FIND A HOTEL</h4>
			<img src="http://ticketsbroadway.com/wp-content/themes/ticketbroadway/images/imageHotel.jpg" class="img-responsive" alt="Buy Now">
			<p style="font-size: 12px;padding-bottom: 15px;">Get the best deals with our selection of hotels in the theater district.</p>
			<button id="bookHotel">BOOK NOW ></button>
		</div><!-- #secondary -->
	<?php endif; ?>
<div id="popUpDiv">
		<div id="contentPopUpDiv">
			<span id="quitPopUp">X</span>
			<p>Finding the best hotel close to <b><?php echo $theater; ?></b> in <b><?php echo $city; ?></b></p>
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
<?php  } ?>