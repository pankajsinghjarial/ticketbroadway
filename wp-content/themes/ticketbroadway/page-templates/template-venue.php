<?php
	/**
    * Template Name: Venue
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */
   $letters = range('a', 'z');
   global $wpdb;
   
   get_header(); ?>
   
<div class="container">
	<div class="letterFilter">
		<h1>Select the first letter of the city</h1>
		<?php foreach($letters as $letter){?>
			
			<a onclick="getCity('<?php echo $letter; ?>')"><?php echo $letter; ?></a>
		<? } ?>
	</div>
</div><!-- #primary -->
<div class="container contentVenueSearch">
	<div class="row" id="resLet">
	</div>
</div>
<script>
	function getCity(letter){
		$.ajax({
			method: "POST",
			url: "<?php echo get_template_directory_uri(); ?>/exeslide.php",
			data: {letter: letter},
			success: function(html) {
				document.getElementById('resLet').innerHTML = html;
			}
		});
	   
	}
</script>
<?php 
	get_footer();
	
	?>