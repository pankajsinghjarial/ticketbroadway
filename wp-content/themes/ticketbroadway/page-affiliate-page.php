<?php get_header(); 
	custom_breadcrumbs();?>
	<div id="content" class="col-md-10 col-xs-12 mainContent">
		<div class="row titleAffiliate">
			<h1>TICKETS BROADWAY <span class="colorRed">AFFILIATE PROGRAM</span></h1>
		</div>
		<p class="mainP">Accept The Terms Below and Register with a Network</p>
		<p>Become a Ticket Broadway affiliate for free and start earning commission. You can find us these platforms</p>
		<div class="row">
			<div class="impactRadius">
				<img src="<?php echo get_template_directory_uri(); ?>/images/impactRadiusNoBG.png" alt="<?php echo get_the_title(); ?>">
				<p class="blackBold">New & Unique</p>
				<p>Newer, modern and user-friendly affiliate network with unique tracking solutions and reporting features. </p>
				<p><a class="red" href="http://www.impactradius.com/">APPLY ></a></p>
			</div>
			<div class="rakuten">
				<img src="<?php echo get_template_directory_uri(); ?>/images/rakutenNoBG.png" alt="<?php echo get_the_title(); ?>">
				<p class="blackBold">Large & Established</p>
				<p>Large and well-established affiliate network, with simple navigation and reporting features</p>
				<p ><a class="red" href="http://marketing.rakuten.com/affiliate-marketing">APPLY ></a></p>
			</div>
			<div class="conversant">
				<img src="<?php echo get_template_directory_uri(); ?>/images/conversantNoBG.png" alt="<?php echo get_the_title(); ?>">
				<p class="blackBold">Best Known</p>
				<p>The best-known affiliate network, with simplistic usability and<br> functionality</p>
				<p ><a class="red" href="http://www.cj.com/">APPLY ></a></p>
			</div>
		</div>
		<div class="row">
		</div>
		<div class="row" style="padding-bottom: 20px; border-bottom: 1px solid #c1c1c1;">
			<?php the_content(); ?>
		</div>
		<div class="row acceptTerms">
			<h2>Accept the terms above and register with a Network</h2>
			<div class="" style="margin-top: 15px;">
				<img src="<?php echo get_template_directory_uri(); ?>/images/impactRadius.png" alt="<?php echo get_the_title(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/rakuten.png" alt="<?php echo get_the_title(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/conversant.png" alt="<?php echo get_the_title(); ?>">
			</div>
		</div>
	</div><!-- #primary -->
	
	<?php get_sidebar(); ?>	
<?php get_footer(); ?>