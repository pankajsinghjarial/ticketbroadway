<?php
/**
 * Template Name: My Dashboard Template
 *
 * 
 */

get_header();


$user_id = get_current_user_id();
if ($user_id == 0) {


   ?>
	<script type="text/javascript">
	window.location.href = "<?php echo WP_HOME.'/login' ?>";
	</script>

<?php 
	
} else {
	
	$billing_address_1 = get_user_meta($user_id, 'billing_address_1', true);
	$billing_address_2 = get_user_meta($user_id, 'billing_address_2', true);
	$billing_city = get_user_meta($user_id, 'billing_city', true);
	$billing_state = get_user_meta($user_id, 'billing_state', true);
	$billing_country = get_user_meta($user_id, 'billing_country', true);
	$billing_postcode = get_user_meta($user_id, 'billing_postcode', true);
	$billing_phone = get_user_meta($user_id, 'billing_phone', true);
	$user_email = $current_user->user_email;
	$display_name = $current_user->display_name;
	$userid = $current_user->ID;	
	
}



 ?>

<section class="checkout-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Nav tabs -->
            <ol class="breadcrumb">
               <li><a href="<?php echo WP_HOME; ?>">Home</a></li>
               <li><a href="#">Login or Create An Account</a></li>
               <li class="active"> My Dashboard</li>
            </ol>
            <!-- Tab panes -->

            <div class="col-md-4 dashboard-left-content no-left-padding padding-right">
              <h1>My Account</h1>

              <ul class="list-unstyled">
                <li><a href="">Account Dashboard</a></li>
                <li><a href="">Account Information</a></li>
                <li><a href="">Newsletter Subscriptions </a></li>
              </ul>
            </div> <!-- col-md-4  -->

            

            <div class="col-md-8 no-right-padding dashboard-right-content padding-left">
               <h1>My Dashboard</h1>
               <h2>Thank you for registering with Tickets Broadway.</h2>
               <p>Hello, Howie!<br>
                From your My Account Dashboard you have the ability to view a snapshot of your recent activity and update your account information.Select a link below to view or edit information.
               </p>

               <div class="col-md-12  col-xs-12 no-padding information">
                <h3>Account Information</h3>
                <div class="col-md-6 col-xs-12 inform-content padding-right no-left-padding">
                  <div class="col-md-10 col-xs-10 no-left-padding text-left">
                    <h4> Contact Information </h4>
                  </div>

                  <div class="col-md-2 col-xs-2 no-right-padding text-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pencil.png">
                  </div>
                  <div class="col-md-12 border-bottom-inform"></div>


                  <div class="col-md-12 no-padding">
                    <p><?php echo $display_name ?><br><?php echo $user_email ?><br><a href="">Change Password</a>
                    </p>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12 inform-content padding-right no-right-padding">
                  <div class="col-md-10 col-xs-10 no-right-padding text-left">
                    <h4> Newsletters </h4>
                  </div>
                  <div class="col-md-2 col-xs-2 no-right-padding text-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pencil.png">
                  </div>
                  <div class="col-md-12 border-bottom-inform"></div>

                  <div class="col-md-12 no-padding">
                    <p>You are currently not subscribed to any newsletter.
                    </p>
                  </div>
                </div>

              </div>

              <div class="col-md-12 col-xs-12 dashboard-border-bottom no-padding">
                <h3> Order History </h3>
                <div class="col-md-4 col-xs-4 text-left no-padding">
                  <h6>1/11/15</h6>
                </div>
                <div class="col-md-4 col-xs-4 text-center no-padding">
                  <h6> Aladdin </h6>
                </div>
                <div class="col-md-4 col-xs-4 text-right no-padding">
                  <h6>  Youkey Theatre</h6>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 dashboard-border-bottom text-cnter no-padding">
                
                <div class="col-md-4 col-xs-4 text-left no-padding">
                  <h6>4/12/15</h6>
                </div>
                <div class="col-md-4 col-xs-4 text-center no-padding">
                  <h6> Lion King</h6>
                </div>
                <div class="col-md-4 col-xs-4 text-right no-padding">
                  <h6>Youkey Theatre</h6>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 dashboard-border-bottom no-padding">
                
                <div class="col-md-4 col-xs-4 text-left no-padding">
                  <h6>8/25/15</h6>
                </div>
                <div class="col-md-4 col-xs-4 text-center no-padding">
                  <h6> Kinkyboots</h6>
                </div>
                <div class="col-md-4 col-xs-4 text-right no-padding">
                  <h6>Youkey Theatre</h6>
                </div>
              </div>

            </div> <!-- col-md-8 -->
          </div>

        </div><!-- row -->
      </div><!-- container -->
    </section>
<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
