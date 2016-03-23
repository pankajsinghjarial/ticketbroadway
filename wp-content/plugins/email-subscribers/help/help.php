<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="about_wrap">

	<style>
	.about_wrap {
		right: 1.3em;
		background-color: transparent;
		margin: 25px 40px 0 20px;
		box-shadow: none;
		-webkit-box-shadow: none;
	}

	.about_header {
		background-color: #FFF;
		padding: 1em 1em 0.5em 1em;
		-webkit-box-shadow: 0 0 7px 0 rgba(0, 0, 0, .2);
		box-shadow: 0 0 7px 0 rgba(0, 0, 0, .2);
	}
	</style>

	<div class="about_header">

		<h1><?php _e('Welcome to Email Subscribers!', 'email-subscribers'); ?></h1>

		<div><?php _e( 'Thanks for installing! We hope you enjoy using it.', 'email-subscribers'); ?></div>

		<div class="wrap">
	        <table class="form-table">
	             <tr>
	                <th scope="row"><?php _e( 'For more help and tips...', 'email-subscribers' ) ?></th>
	                <td>
	                    <form name="klawoo_subscribe" action="#" method="POST" accept-charset="utf-8">
	                        <input class="ltr" type="text" name="name" id="name" placeholder="Name"/>
	                        <input class="regular-text ltr" type="text" name="email" id="email" placeholder="Email"/>
	                        <input type="hidden" name="list" value="hN8OkYzujUlKgDgfCTEcIA"/>
	                        <input type="submit" name="submit" id="submit" class="button button-primary" value="Subscribe">
	                        <br/>
	                        <div id="klawoo_response"></div>
	                    </form>
	                </td>
	            </tr>
	        </table>
		</div>
	</div>
    <script type="text/javascript">
        jQuery(function () {
            jQuery("form[name=klawoo_subscribe]").submit(function (e) {
                e.preventDefault();
                
                jQuery('#klawoo_response').html('');
                params = jQuery("form[name=klawoo_subscribe]").serializeArray();
                params.push( {name: 'action', value: 'es_klawoo_subscribe' });
                
                jQuery.ajax({
                    method: 'POST',
                    type: 'text',
                    url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                    async: false,
                    data: params,
                    success: function(response) {

                        if (response != '') {
                            jQuery('#klawoo_response').html(response);
                        } else {
                            jQuery('#klawoo_response').html('error!');
                        }
                    }
                });
            });
        });
    </script>

    <div class="faqs">

		<h3><?php _e( 'Frequently Asked Questions', 'email-subscribers' ); ?></h3>
		<ol>
			<li><?php _e( '<strong>How to setup subscription box widget?</strong> - There are 3 ways to add Subscription box to your website:', 'email-subscribers' ); ?><br>
				<br><?php _e( '(A) Use Shortcode <code>[email-subscribers namefield="YES" desc="" group="Public"]</code> in any page or post.' ,'email-subscribers' ); ?><br>
				<br><?php _e( '(B) Go to Dashboard->Appearance->Widgets. You will see a widget called Email subscribers. Click Add Widget button or drag it to the sidebar on the right.' ,'email-subscribers' ); ?><br>
				<br><?php _e( '(C) Copy and past this php code to your desired template location : <code>es_subbox( $namefield = "YES", $desc = "", $group = "" );</code> ' ,'email-subscribers' ); ?>
				<br><?php _e( 'Read more from <a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-subscription-box/">here</a>.<br>', 'email-subscribers' );?>
			</li>
			<li><?php _e( '<strong>How to update default alert message from subscription box?</strong> - Use any translation plugin (eg: <strong>Loco Translate</strong>) and translate the text that you want to update.', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="https://wordpress.org/plugins/email-subscribers/faq/">Notifications are not getting send to subscriber list</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-subscriber-management-and-import-and-export-email-address/">How to import and export email address to subscriber list?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-compose-html-emails/">How to compose static newsletter?</a></a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-subscription-box/">How to add subscription box in posts?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-general-settings/">How to modify the existing mails (Opt-in mail, Welcome mail, Admin mails) content?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-send-email-newsletters/">How to send static newsletter manually?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-send-email-newsletters/">Where to check sent mails?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-notifications-settings/">How to configure notification email to subscribers when new posts are published?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-subscriber-management-and-import-and-export-email-address/">How to add new subscribers group?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/05/06/email-subscribers-wordpress-plugin-subscriber-management-and-import-and-export-email-address/">Is plugin contain bulk update option for subscribers group?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/08/17/mail-not-working-on-email-subscribers-wordpress-plugin/">Is Mail not working on Email Subscribers wordpress plugin?</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2014/08/31/email-subscribers-wordpress-plugin-network-activation-for-multisite-installation/">How to install and activate Email Subscribers on multisite installation blogs?</a>', 'email-subscribers' ); ?></li>
		</ol>
		<h3><?php _e( 'How to setup auto emails using CRON Job through the cPanel or Plesk?', 'email-subscribers' ); ?></h3>
		<ol>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2015/08/02/how-to-schedule-auto-emails-for-email-subscribers-wordpress-plugin-in-parallels-plesk/">Setup cron job in Plesk</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2015/08/04/how-to-schedule-auto-emails-for-email-subscribers-wordpress-plugin-in-cpanel/">Setup cron job in cPanal</a>', 'email-subscribers' ); ?></li>
			<li><?php _e( '<a target="_blank" href="http://www.gopiplus.com/work/2015/08/08/email-subscribers-wordpress-plugin-how-to-schedule-auto-mails-cron-mails/">Hosting doesnt support cron jobs?</a>', 'email-subscribers' ); ?></li>
		</ol>

	</div>

	<p class="contact-us"><?php _e( 'If you still can\'t find solution even after checking in above links, click <a target="_blank" href="http://www.storeapps.org/support/contact-us/"> here</a>.', 'email-subscribers' ) ?></p>

</div>