<?php
   /**
    * Template Name: Search
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */
	get_header();
	
	if(isset($_POST['nameShowSearch']) && $_POST['nameShowSearch'] != ""){
	    $nameShowSearch = htmlspecialchars($_POST['nameShowSearch']);
	}else if(isset($_GET['nameShow']) && $_GET['nameShow'] != ""){
		$nameShowSearch = htmlspecialchars($_GET['nameShow']);
	}else{
		$nameShowSearch = 'null';
	}
	

	if(isset($_POST['nameCitySearch']) && $_POST['nameCitySearch'] != ""){
	    $nameCitySearch = htmlspecialchars($_POST['nameCitySearch']);
	}else if(isset($_GET['nameCitySearch']) && $_GET['nameCitySearch'] != ""){
		$nameCitySearch = htmlspecialchars($_GET['nameCitySearch']);
	}else{
		$nameCitySearch = 'null';
	}
	
	if(isset($_POST['dateShowSearch']) && $_POST['dateShowSearch'] != ""){
	    $dateShowSearch =  strtotime(htmlspecialchars($_POST['dateShowSearch']));
	}else{
		$dateShowSearch = 'null';
	}
	
	if(isset($_POST['venueShowSearch']) && $_POST['venueShowSearch'] != ""){
	    $venueShowSearch = htmlspecialchars($_POST['venueShowSearch']);
	}else{
		$venueShowSearch = 'null';
	}
	
	if(isset($_GET['date']) && $_GET['date'] != ""){
		$dateShowSearch = strtotime(htmlspecialchars($_GET['date']));
	}

	?>
<style>body{background: white !important;}
	
.notifyMe {
    position: initial;
}

</style>
<div class="row searchResult">
	<div class="col-md-12 col-xs-12 mainSearch">
		<h1>Search result</h1>
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
<script src="<?php echo get_template_directory_uri(); ?>/js/search-2.js"></script>
<script>

	var result;
	var currentRes;
	function search(getLimit){
		var cityT = '<?php echo $nameCitySearch; ?>';
		var dateT = '<?php echo $dateShowSearch; ?>';
		var nameT = '<?php echo $nameShowSearch; ?>';
		var venueT = '<?php echo $venueShowSearch; ?>';
		
		$('#loadingmessage').show();
		$.ajax({
			method: "POST",
			url: "<?php echo get_template_directory_uri(); ?>/webservice/ws-search-show-2.php",
			data: {city : cityT, date: dateT, nameshow: nameT, cateId: 'null', limit: getLimit, venue: venueT},
			success: function(html) {
				$('#loadingmessage').hide();
				result = $.parseJSON(html);
				if(result.length == 0){
					$('#allResult').append('<div class="row rowResult"><div class="col-md-12 col-xs-12"><p style="    margin-top: 10px;">No show for this search</p></div></div>');
				}
				if(result.length > 1800){
					$('#pagiNumber').show();
				}
				console.log(html);
				currentRes = result;
				showResult(currentRes);
			}
		});
	}
	search(limitAct);
</script>
<?php get_footer(); ?>
