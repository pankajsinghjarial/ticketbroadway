<?php
/**
 * Template Name: Terms Page Template 
 *
 * This is the template that displays Privacy policy page.
 */


get_header(); 
custom_breadcrumbs();
?>

	<div class="col-md-10 col-xs-12">
		<div id="content" role="main">
			<h1><?php echo the_title(); ?></h1>
			<script type="text/javascript" src="https://tickettransaction.com/?bid=8388&sitenumber=0&tid=600">
			//var bid= 8388;  //the customer id
			//var site =0;  //the site number (not website config id)
			//document.write('<script language="javascript" src="http://tickettransaction.com/?bid='+bid+'&sitenumber='+site+'&tid=600" ></' + 'script>');
			
			//<script language="javascript" src="http://tickettransaction.com/?bid='+bid+'&sitenumber='+site+'&tid=600" ></' + 'script>
			</script>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
