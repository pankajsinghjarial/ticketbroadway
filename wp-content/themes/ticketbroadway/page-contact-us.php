<?php get_header(); 
	custom_breadcrumbs();?>
<div class="row">
	<div class="col-md-12 col-xs12">
		<h1><?php the_title(); ?></h1>
		<p>We love to hear from our users. Please submit any questions, comments, or updated site information</p>
	</div>
</div>
<div class="row haveQ">
	<div class="col-md-9 col-xs-12 questions">
		<h3>Have questions ?</h3>
		<p>If you have a specific concern, check out our answers to customers most common questions in the FAQ.</p>
	</div>
	<div class="col-md-3 col-xs-0 imgHeadset">	
		<img src="<?php echo get_template_directory_uri(); ?>/images/contactImage.png" class="img-responsive" alt="Live chat">
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-xs-12 liveChatAndCallUs">
		<div class="col-md-12">
			<div class="titleContact">
				<img src="<?php echo get_template_directory_uri(); ?>/images/livechat.png" style="float: left;" alt="Live chat">
				<h3>LIVE CHAT</h3>
			</div>
			<p>Contact us via Live Chat from 7 a.m - 1 a.m. Eastern Standard Time every day and receive real-time responses to pressing questions from one of our trained agents.</p>
			<p class="callTime">7A.M TO 1 A.M. EST - LIVE CHAT</p>
			<button class="chatCallBtn">CHAT WITH AN AGENT > </button>
		</div>
		<div class="col-md-12 callUs">
			<div class="titleContact">
				<img src="<?php echo get_template_directory_uri(); ?>/images/callus.png" style="float: left;" alt="Call us">
				<h3>CALL US</h3>
			</div>
			<p>Give us a call at one of the numbers below ! Sales agents and customer service agents are available to assist you every day at the times listed below.</p>
			<p class="callTime">7A.M TO 1 A.M. EST - LIVE CHAT</p>
			<a href="tel:18442733746"><button class="chatCallBtn">CALL TOLL FREE 1-844-SEESHOW > </button></a>
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<?php echo do_shortcode('[contact-form-7 id="23837" title="Contact US"]'); ?>
	</div>
</div>



<?php get_footer(); ?>