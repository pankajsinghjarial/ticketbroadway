<?php get_header(); 
	custom_breadcrumbs();?>
<div class="row guaranteePage" >
	<div class="col-md-9 col-xs-12">
		<h1><?php the_title(); ?></h1>
		<p><b>We offer a 200% Money Back Guarantee on your event tickets if:</b></p>
		<ul>
			<li>Your Order is Accepted by, but not delivered by the seller</li>
			<li>Your order is accepted by, but shipped too late by the seller for the tickets to arrive in time for the event</li>
			<li>You were denied entry because of the tickets for invalid tickets were provided by the seller*</li>
		</ul>
		<p>We also offer a 100% Money Back Guarantee if your even is cancelled entirely with no rescheduled date**</p>
		<p style="    margin-top: 20px;"><b>*Verifiable proof must be provided by the venue in written letter format. Written or stamped "voids" do not constitute verifiable proof.</b><br>
		<b>**100% refund for a cancelled event excludes shipping</b></p>
		<div class="col-md-8 col-xs-12 searchGuarantee">
			<p>Looking for tickets ?</p>
			<p>Use the textbox below to search for events, perfomers, teams or venues:</p>
			<form action="<?php echo esc_url( get_permalink(241) ); ?>" method="POST">
				<input type="text" name="nameShowSearch" id="searchNameGuarantee" placeholder="Example : The Lion King or The Fiddler on the Roof" />
				<input type="submit" class="submitSearch" value="Search"/>
			</form>
		</div>
		<div class="col-md-4 col-xs-12">
			<img src="<?php echo get_template_directory_uri(); ?>/images/guaranteeFoot.png" alt="<?php echo get_the_title(); ?>">
		</div>
		
	</div>
	<div class="col-md-3 col-xs-0 sidebarSearch">
		<div>
			<h2>Why Choose Tickets Broadway ?</h2>
			<h3>inventory</h3>
			<p>Tickets Broadway is a resale marketplace, not a box office or a venue. We have tickets to thousands of events all over the world. If you need it, we've got it.</p>
			<h3>our 200% guarantee</h3>
			<p>All the tickets we sell come with our 200% Guarantee.</p>
			<h3>pricing</h3>
			<p>We sell tickets at market value. Prices may be above or below face value. So look around and you'll be able to find lots of great deals here.</p>
			<h3>experience</h3>
			<p>Tickets Broadway is a world class ticket reseller. We've provided tickets to nearly a million customers throughout the world.</p>
		</div>
	</div>
</div>

<?php get_footer(); ?>