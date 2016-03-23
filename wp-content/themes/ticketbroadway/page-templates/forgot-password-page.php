<?php
/**
 * Template Name: Forgot password Template
 *
 * 
 */

get_header();

//retrieve_password_custom('seobrandtester003@gmail.com');


//die;



$user_id = get_current_user_id();
if ($user_id == 0) {


  
	
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
               <li class="active">Create an account</li>
            </ol>
            <!-- Tab panes -->

            <div class="col-md-9 left-content no-padding">

              <div class="col-md-12 no-padding create-acc-heading">
                <h1>Forgot Your Password?</h1>
              </div>

              <div class="col-md-12 no-padding retrieve-password">
                <h1 class="creat-acc-heading-form"> Retrieve your password here </h1>
                <p class="creat-acc-para-form">Please enter your email address below. You will receive a link to rest your password.</p>

                <form class="form-inline fogot-mail">
                  <div class="form-group">
                    <input type="email" placeholder="*Email Address" id="exampleInputEmail2" class="form-control">
                  </div>
                  <button class="btn btn-default" type="submit">Retrieve Password  </button>
                </form>
              </div>

              <div class="col-md-12 back-btn no-padding">
                  <button class="btn btn-default"><i class="fa fa-angle-left"></i> Back to login </button>
              </div>

              
  
            </div> <!-- col-md-9  -->

            

            <div class="col-md-3 no-padding right-content">
               <div class="col-md-12 no-padding creat-acc-girl">
                  <img class="img-responsive acc-girl" src="<?php echo get_template_directory_uri(); ?>/images/creat-acc-girl.png">
               </div>

               <div class="col-md-12 no-padding buy-ticket-btn">
                  <a href=""><img class="img-responsive acc-girl" src="<?php echo get_template_directory_uri(); ?>/images/buy-ticket-btn.png"></a>
               </div>

            </div> <!-- col-md-4 -->
          </div>

        </div><!-- row -->
      </div><!-- container -->
    </section>


<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
