<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<div class="container footer">
		<div class="row header_footer">
			<div class="col-md-6 col-xs-12 socialRes">
				<?php get_sidebar('social');?>
			</div>
			<div class="col-md-6 col-xs-12 footer_search_part" style="padding-top: 4px;">
                <?php if ( is_active_sidebar( 'email-footer-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'email-footer-sidebar' ); ?>
                <?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-12 menu_footer">
				<span onclick="showDivFilt('#nav_menu-3', '#aboutTickets')" class="upDivFooter" id="aboutTickets" > + </span>
				<h3 onclick="showDivFilt('#nav_menu-3', '#aboutTickets')">About Tickets Broadway</h3>
				<?php dynamic_sidebar('first-sidebar-footer');?>
			</div>
			<div class="col-md-3 col-xs-12 menu_footer">
				<span onclick="showDivFilt('#nav_menu-4', '#usefullInfo')" class="upDivFooter" id="usefullInfo" > + </span>
				<h3 onclick="showDivFilt('#nav_menu-4', '#usefullInfo')">Useful information</h3>
				<?php dynamic_sidebar('second-sidebar-footer');?>
				
			</div>
			<div class="col-md-3 col-xs-12 menu_footer">
				<span onclick="showDivFilt('#nav_menu-2', '#services')" class="upDivFooter" id="services" > + </span>
				<h3 onclick="showDivFilt('#nav_menu-2', '#services')">Services</h3>
				<?php dynamic_sidebar('information-sidebar-footer');?>
				
			</div>
			<div class="col-md-3 col-xs-12 menu_footer">
				<span class="upDivFooter" id="contactUs" > + </span>
				<h3 onclick="showDivFilt('#contactUsDivFooter', '#contactUs')">Contact Information</h3>
				<div id="contactUsDivFooter">
					<!--<div class="row location-footer">
						<div class="col-md-2 col-xs-1">
							<img src="<?php echo get_template_directory_uri(); ?>/images/location.png" alt="Logo ticket broadway" />
						</div>
						<div class="col-md-10 col-xs-11">	
							<p>Tickets Broadway <br/>1234 57th Street <br/>New York, NY 10010</p>
						</div>
					</div>-->
					<div class="row location-footer">
						<div class="col-md-2 col-xs-1">
							<img src="<?php echo get_template_directory_uri(); ?>/images/mail.png" alt="Logo ticket broadway" />
						</div>
						<div class="col-md-10 col-xs-11">	
							<a href="mailto:info@ticketsbroadway.com"><p>info@ticketsbroadway.com</p></a>
						</div>
					</div>
					<div class="row location-footer">
						<div class="col-md-2 col-xs-1">
							<img src="<?php echo get_template_directory_uri(); ?>/images/phone.png"  alt="Logo ticket broadway" />
						</div>
						<div class="col-md-10 col-xs-11">
							<a href="tel:18442733746"><p class="number">1-844-2SEESHOW</p></a>
						</div>
				</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-xs-0" style="padding-left: 30px; padding-bottom: 25px;">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo ticket broadway" />
			</div>
			<div class="col-md-6 col-xs-0" style="text-align: right;padding-right: 40px;">
				<img src="<?php echo get_template_directory_uri(); ?>/images/carte_credit.png"  alt="Card ticket broadway" />
			</div>
		</div>
	</div>
	<div class="container text-center">
		<p class="copyright">2015 Tickets Broadway. All rights reserved</p>
	</div>
	<div id="popUpNotifyMe">
		<div id="quitPopUpNotifyMe">
			x
		</div>
		<div id="contentPopUpNotify">
			<?php echo do_shortcode('[contact-form-7 id="24067" title="Notify Me"]'); ?>
		</div>
	</div>
	<?php if(isset($_GET['thankyou'])){ ?>
		<div id="popUpThankYou">
			<div id="quitPopUpThankYou">
			x
			</div>
			<div id="contentPopUpThankYou">
				<div class="thankyouContent">
					<?php if(isset($_GET['thankyou']) && $_GET['thankyou'] == 'register'){ ?>
					<span>Thank you.<br>You have been successfully Registered.</span>
					<p>Login now using your registered email address.</p>
					<?php }else if(isset($_GET['thankyou']) && $_GET['thankyou'] == 'contact'){ ?>
						<span>Thank you.<br>We have successfully received your message</span>
						<p>One of our Customer Service Agents will be in touch shortly</p>
					<?php }else if(isset($_GET['thankyou']) && $_GET['thankyou'] == 'notifyme'){ ?>
						<span>Thank you.<br>We have successfully received your request</span>
						<p>You Will receive an email when show dates are available</p>
					<?php }else if(isset($_GET['thankyou']) && $_GET['thankyou'] == 'newsletter'){ ?>
						<span>Thank you.<br>We have successfully received your request</span>
						<p>You Will receive an email when show dates are available</p>
					<?php }else if(isset($_GET['thankyou']) && $_GET['thankyou'] == 'uptodate'){ ?>
						<span>Thank you.<br>We have successfully received your request</span>
						<p>You Will receive an email when show dates are available</p>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
<script>
	$('#quitPopUpNotifyMe').click(function(){
		$('#popUpNotifyMe').fadeOut('slow');
	});
	
	$('#quitPopUpThankYou').click(function(){
		$('#popUpThankYou').fadeOut('slow');
	});
	
	function showDivFilt(classDiv, spanId){
		if($( document ).width() < 982){
			if($(classDiv).css('display') == 'none'){
			$(classDiv).slideDown('slow');
			$(spanId).html(' - ');
			}else{
				$(classDiv).slideUp('slow');
				$(spanId).html(' + ');
			}
		}
	}


	function slideDiv(divId){
		switch($(divId).css('display')){
			case "":
				$(divId).animate({width:'toggle'}, 300);
				$('.navigationHeader').animate({width:'toggle'}, 300);
				break;
			case "none":
				$(divId).animate({width:'toggle'}, 300);
				$('.navigationHeader').animate({width:'toggle'}, 300);
				break;
			case "block":
				$(divId).slideUp(300);
				$('.navigationHeader').slideUp(300);
				break;
		}
	}
</script>
<?php wp_footer(); ?>
</body>
</html>
