<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wpdb;
$idCategory = woocommerce_category_description();
$request = 'SELECT COUNT(dateShow) as nbrDate FROM wp_posts, wp_term_relationships, wp_showDate WHERE object_id = ID AND ID = wp_showDate.idShow AND term_taxonomy_id = "'.$idCategory.'" AND post_type = "product" AND wp_posts.post_status = "publish" ';
$res = $wpdb->get_results ($request);
$nbrDate = round($res[0]->nbrDate);
get_header( 'shop' ); 

?>
<style>body{background: white !important;}

.notifyMe {
    position: initial;
}

</style>
<div class="row searchResult">
	<div class="col-md-12 col-xs-12 mainSearch">
		<h1><?php woocommerce_page_title(); ?></h1>
		<div class="col-md-3 col-xs-12">
			<div class="headFilter">
				<span class="upDiv" id="showFilters" > + </span>
				<p onclick="showDivFilt('filters')">Filter Results</p>
			</div>
			<div class="filters">
				<p class="titleFilt">Dates</p>
				<p id="filtDateRes">Showing event for <span class="red">All dates</span></p>
				<div id="divFilterDate" class="divFilter">
					<p id="allDates" class="selected">All dates</p>
					<p id="january">January</p>
					<p id="february">February</p>
					<p id="march">March</p>
					<p id="april">April</p>
					<p id="may">May</p>
					<p id="june">June</p>
					<p id="july">July</p>
					<p id="august">August</p>
					<p id="september">September</p>
					<p id="october">October</p>
					<p id="november">November</p>
					<p id="december">December</p>
				</div>
				<p class="titleFilt">Location</p>
				<p id="filtCityRes">Happening near <span class="red">All Cities</span></p>
				<div id="divFilterCity" class="divFilter">
					<p id="allCities" class="selected">All Cities</p>
					<p id="chicago">Chicago</p>
					<p id="boston">Boston</p>
					<p id="new-york">New York</p>
					<p id="denver">Denver</p>
					<p id="dallas">Dallas</p>
				</div>
			</div>
			<img src="<?php echo get_template_directory_uri(); ?>/images/200GuaranteeSearch.png" alt="200 Guarantee search tickets broadway" class="guaranteeSearch">
			<div class="uptodateDiv">
				<p class="titleFilt">Sign Up For Upcoming Theatre Deals</p>
				<?php echo do_shortcode('[contact-form-7 id="432" title="Stay up to date"]'); ?>
			</div>
		</div>
		<div class="col-md-9 col-xs-12">
			<div class="row headRow">
				<div class="col-md-2 col-xs-4">
					<p>DATE</p>
				</div>
				<div class="col-md-7 col-xs-8">
					<p>EVENT/VENUE</p>
				</div>
				<div class="col-md-3 col-xs-0">
					
				</div>
			</div>
			<div id='loadingmessage' style='display:none'>
				<img src='<?php echo get_template_directory_uri(); ?>/images/loadinggraphic-2.gif' alt="Loading graphic for find a show"/>
			</div>
			<div id="allResult">
			</div>
			<div id="pagination">
				<div id="pagiNumber">
					<img src="<?php echo get_template_directory_uri(); ?>/images/loadmore.png" alt="load more">
				</div>
				<span id="showLess">Show Less</span>
			</div>
		</div>
	</div>
</div>
<script>
$('#filtCityRes').click(function(){
	if($('#divFilterCity').css('display') == 'none'){
		$('#divFilterCity').slideDown(500);
	}else{
		$('#divFilterCity').slideUp(500);
	}
});

$('#filtDateRes').click(function(){
	if($('#divFilterDate').css('display') == 'none'){
		$('#divFilterDate').slideDown(500);
	}else{
		$('#divFilterDate').slideUp(500);
	}
});


</script>
<script>var categoryId = <?php echo $idCategory; ?></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/search-2.js"></script>
<script>
	
	var nbrDate = <?php echo $nbrDate; ?>;
	var result;
	var currentRes;
	function search(getLimit){
		$('#loadingmessage').show();
		$.ajax({
			method: "POST",
			url: "<?php echo get_template_directory_uri(); ?>/webservice/ws-search-show-2.php",
			data: {city : 'null', date: 'null', nameshow: 'null', cateId: categoryId, limit: getLimit},
			success: function(html) {
				$('#loadingmessage').hide();
				result = $.parseJSON(html);
				var nbrPage = Math.round(nbrDate / result.length);
				if(result.length == 0){
					$('#allResult').append('<div class="row rowResult"><div class="col-md-12 col-xs-12"><p style="    margin-top: 10px;">No show for this search</p></div></div>');
				}
				if(result.length > 1800){
					$('#pagiNumber').show();
				}
				currentRes = result;
				showResult(currentRes);
			}
		});
	}
	search(limitAct);
</script>

<?php get_footer( 'shop' ); ?>