	<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
global $wpdb;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if(!is_user_logged_in ()) {  
		$login =  esc_url( get_permalink(324) );	

echo "<script> window.location.href='".$login ."'</script>";
			exit;
	}
wc_print_notices(); ?>

<p class="myaccount_user">

	<section class="checkout-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Nav tabs -->
            
            <!-- Tab panes -->

            <div class="col-md-4 dashboard-left-content no-left-padding padding-right">
              <h1>My Account</h1>

              <ul class="list-unstyled">
                <li><a href="#accDashboard">Account Dashboard</a></li>
               <li><a href="#accountInfo">Account Information</a></li>
               <li><a href="#newletter">Newsletter Subscriptions </a></li>
              </ul>
            </div> <!-- col-md-4  -->

            <?php 
				global $current_user;
				get_currentuserinfo(); 
				if(!empty($current_user->display_name)){
					$userInfo = $current_user->display_name;
				}else if(!empty($current_user->user_firstname)){
					$userInfo = $current_user->user_firstname;
				}else{
					$userInfo = $current_user->user_login;
				}
			?>

            <div class="col-md-8 no-right-padding dashboard-right-content padding-left">
               <h1 id="accDashboard">My Dashboard</h1>
               <!-- <h2 class="back_background">Thank you for registering with Tickets Broadway.</h2> --->
               <p><strong>Hello, <?php echo $userInfo; ?></strong><br>
                From your My Account Dashboard you have the ability to view a snapshot of your recent activity and update your account information. Select a link below to view or edit information.
               </p>

               <div class="col-md-12  col-xs-12 no-padding information">
                <h3 id="accountInfo">Account Information</h3>
                <div class="col-md-6 col-xs-12 inform-content padding-right no-left-padding">
                  <div class="col-md-10 col-xs-10 no-left-padding text-left">
                    <h4> Contact Information </h4>
                  </div>

                  <div class="col-md-2 col-xs-2 no-right-padding text-right">
				  <?php


printf( __( '<a class="edit_password" href="%s"><img src="'.get_template_directory_uri().'/images/pencil.png"></a>', 'woocommerce' ),wc_customer_edit_account_url()); ?>
                    
                  </div>
                  <div class="col-md-12 col-xs-12 border-bottom-inform"></div>
					<div class="col-md-12 col-xs-12 new_text_part no-padding">
						<p>
							<?php 
								$userEmail = $current_user->user_email;
								echo "$userInfo<br>$userEmail<br>";
								printf( __( '<a class="edit_password" href="%s">Edit your password and account details</a>.', 'woocommerce' ),wc_customer_edit_account_url());
								
							?>
						</p>
					</div>
                </div>

                <div class="col-md-6 col-xs-12 inform-content padding-right no-right-padding">
                  <div class="col-md-10 col-xs-10 no-right-padding text-left">
                    <h4 id="newletter"> Newsletters </h4>
                  </div>
                  <div class="col-md-2 col-xs-2 no-right-padding text-right">
                    <!--<img src="< ?php echo get_template_directory_uri(); ?>/images/pencil.png">-->
                  </div>
                  <div class="col-md-12 col-xs-12 border-bottom-inform"></div>

                  <div class="col-md-12 col-xs-12 new_text_part no-padding">
                    <p>
                    <?php 
                        $getSubscriberQuery = $wpdb->query("SELECT es_email_id from  wp_es_emaillist where es_email_mail='".$current_user->user_email."'");
                        if($wpdb->num_rows){
                            echo "You are currently subscribed to newsletter.";
                        }else{
                            echo "You are currently not subscribed to any newsletter.";
                        }
                    ?>
                    </p>
                  </div>
                </div>

              </div>
				<?php 
					function pr($data){
						echo "<pre>";
						print_r($data);
						echo "</pre>";
					}
					$table_name =  'orders';
					$my_sql_query = "SELECT * FROM $table_name  WHERE email = %s";
					//echo $wpdb->prepare($my_sql_query,$userEmail);
					
					$results = $wpdb->get_results( $wpdb->prepare($my_sql_query,$userEmail),ARRAY_A);
					?>
					<div class="col-md-12 col-xs-12 dashboard-border-bottom no-padding">
                <h3 id="orderHist"> Order History </h3>
				<div class="history_result_part">
                  <span>Date of Order</span>
                  <span>Show</span>
                  <span>Date of Show</span>
				  <span>Venue</span>
                </div>
					<?php
					foreach($results as $key => $resultsVal){
				
										 ?>
					
						   
                <div class="history_result_part">
                  <span><?php echo date('M d, Y',strtotime($resultsVal['created'])); ?></span>
                  <span><?php echo $resultsVal['event_name']; ?></span>
                  <span><?php 
						echo $resultsVal['event_time'];  ?></span>
				  <span><?php echo $resultsVal['venue']; ?></span>
                </div>
			<?php 		
						
					}
					

				?>
           
              </div>

              

            </div> <!-- col-md-8 -->
          </div>

        </div><!-- row -->
      </div><!-- container -->
    </section>

</p>

<?php //do_action( 'woocommerce_before_my_account' ); ?>

<?php //wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php //wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php //wc_get_template( 'myaccount/my-address.php' ); ?>

<?php //do_action( 'woocommerce_after_my_account' ); ?>
