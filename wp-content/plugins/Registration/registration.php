<?php
/*
  Plugin Name: Custom Registration
  Plugin URI: http://code.tutsplus.com
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Agbonghama Collins
  Author URI: http://tech4sky.com
 */
 // $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio
 
 function prehtml(){ 

?>
 
  <section class="checkout-section create-account-newpart">
      <div class="container">
		<div class="row">
          <div class="col-xs-12 col-md-12">
			<div class="col-xs-12 col-md-9 left-content no-padding">
				<div class="col-xs-12 no-padding create-acc-heading">
					<div class="col-xs-12 col-md-6 no-padding hidden-xs">
					  <h1>Create an account  <span>or Login with</span> </h1>
					</div>
					  <div class="col-xs-12 col-md-6 no-padding right hidden-xs">
						  <ul class="list-inline">
							<li>	<?php do_action('facebook_login_button');?></li>
							<li><?php do_action( 'wordpress_social_login' ); ?></li>
							<li><div id="amazonBtnLC" class="img-responsive"></div></li>
						  </ul>
						</div>
					
					
				
					<!-- For Mobile version start  -->
					<div class="col-xs-12 col-md-6 no-padding hidden-lg hidden-md hidden-sm">
					  <h1 class="xs-create-acc-head">Create an account  <span>or Login with</span>  </h1>
					</div>
					<!-- For Mobile version End -->

					<div class="col-xs-12 col-md-6 no-padding right hidden-lg hidden-md hidden-sm">
					 <ul class="list-inline new-inline">
					 <li class="cus-fb mob-dis"><?php do_action('facebook_login_button');?></li>
					  
						<li class="xs-social-li mob-dis"> <?php do_action( 'wordpress_social_login' ); ?></li>
						<li class="xs-social-li mob-dis"><div id="amazonBtnLR" class="img-responsive"></div></li>
					  </ul>
					</div> 
				 </div> 
 
 	 
 <?php 
 }
 function registration_form( $fname,$lname, $password, $email, $vemail, $zip_code, $gender, $news, $ack,$formData ) {
	
	 ?>
	 <!-- tab section Start-->
			<div class="col-xs-12 col-md-12 no-padding">
                <h1 class="creat-acc-heading-form"> Personal Information </h1>
             </div>
			  
             <form <?php echo $_SERVER['REQUEST_URI']; ?> method="post" >


             	<div class="col-xs-12 col-md-12 text-right xs-required-fild hidden-lg hidden-md hidden-sm">
                	<h1><span> * </span> Required Fields</h1>
                </div>

                <div class="col-xs-12 col-md-12 crt-left-form no-padding">

                    <div class="col-xs-12 col-md-6 form-group padding-right">
                      <label class="col-md-12 col-xs-12  control-label" for="">First Name <span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="text" placeholder="First Name " maxlength="25" id="" class="form-control" value="<?php echo isset($formData['fname'])?$fname:''; ?>" name="fname">
					  </div>
                    </div>

                    <div class="col-xs-12 col-md-6 form-group  padding-left">
                      <label class="col-md-12 col-xs-12  control-label" for="">Last Name <span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="text" placeholder="Last Name " maxlength="25" id="" class="form-control" value="<?php echo isset($formData['lname'])?$formData['lname']:''; ?>" name="lname">
					  </div>
                    </div>

                   
                </div>



                <div class="col-xs-12 col-md-12 crt-left-form no-padding">

                    <div class="col-xs-12 col-md-6 form-group  padding-right">
                      <label class="col-md-12 col-xs-12  control-label" for="">Email <span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="text" placeholder="Email" id="" class="form-control" value="<?php echo isset($formData['email'])?$formData['email']:''; ?>" name="email">
					  </div>
                    </div>

                     <div class="col-xs-12 col-md-6 form-group  padding-left">
                      <label class="col-md-12 col-xs-12  control-label" for="">Verify Email<span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="text" placeholder="Verify Email" id="" class="form-control" value="<?php echo isset($formData['vemail'])?$formData['vemail']:''; ?>" name="vemail">
					  </div>
                    </div>

                </div>



                <div class="col-xs-12 col-md-12 crt-left-form no-padding">

                    <div class="col-xs-12 col-md-6 form-group padding-right">
                       <label class="col-md-12 col-xs-12  control-label" for="">Password <span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="Password" placeholder="Password"  id="" class="form-control" value="" name="password">
					  </div>
                    </div>

                    <div class="col-xs-12 col-md-6 form-group  padding-left">
                     <label class="col-md-12 col-xs-12 confirm-pass control-label" for="">Confirm Password<span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="password" placeholder="Confirm Password"   id="" class="form-control" value="" name="cpassword">
					  </div>
                    </div>
                </div>


                <div class="col-xs-12 col-md-12 crt-left-form no-padding">

                    <div class="col-xs-12 col-md-6 form-group padding-right">
                       <label class="col-md-12 col-xs-12  control-label" for="">Zip Code <span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					    <input type="text" placeholder="Zip Code"   id="" class="form-control" value="<?php echo isset($formData['zip_code'])?$formData['zip_code']:''; ?>" name="zip_code">
					  </div>
                    </div>

                    <div class="col-xs-12 col-md-6 form-group  padding-left">
                      <label class="col-md-12 col-xs-12  control-label" for="">Gender:<span>*</span></label>
                      <div class="col-md-12 col-xs-12 form-fram">
					   
					    <select name="gender" class="form-control">
                          <option value="m">Male</option>
                          <option value="f">Female</option>
                        </select>
					  </div>
                    </div>
                </div>
				<div class="col-xs-12 col-md-12 text-right required-fild hidden-xs">
                <h1><span> * </span> Required Fields</h1>
              </div>

              <div class="col-xs-12 col-md-12 no-padding two-btn-group hidden-xs">
                <div class="col-xs-6 no-padding text-left left-btn">
                  <!-- <button class="btn btn-default"><i class="fa fa-angle-left"></i> Back </button> -->
				  <a class="btn btn-default abackh" href="<?php echo esc_url( get_permalink(324) ); ?>"><i class="fa fa-angle-left"></i> Back</a> </button>
                </div>
                <div class="col-xs-6 text-right no-padding">
                  <button class="btn btn-default" name="submit">Submit <i class="fa fa-angle-right"></i></button>
                </div>
              </div>


              <div class="col-xs-12 col-md-12 no-padding xs-two-btn-group hidden-sm  hidden-lg  hidden-md">
                <div class="col-xs-5 no-padding left-btn">
				<a class="btn btn-default abackh" href="<?php echo esc_url( get_permalink(324) ); ?>"><i class="fa fa-angle-left"></i> Back</a> </button>
                  <!-- <button class="btn btn-default"><i class="fa fa-angle-left"></i> Back </button> -->
                </div>

                <div class="col-xs-6 no-padding">
                  <button class="btn btn-default xs-right-btn" name="submit">Submit <i class="fa fa-angle-right"></i></button>
                </div>
              </div>






     <div class="col-md-12 col-xs-12  no-padding chek-boxsign">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" checked="" name="news">Sign up for Newsletter .
                  </label>
                </div>

                <div class="checkbox hyT">
                  <label>
                    <input type="checkbox" checked="" name="ack"> I acknowledge and give permission to Tickets Broadway to send promotional emails and advertisements. Please see our <a href="<?php echo site_url() . "/terms-conditions/"; ?>">Terms</a> and <a href="<?php echo site_url() . "/privacy-policy/"; ?>">Privacy Conditions</a> for more information on how we may use your information.
                  </label>
                </div> 
              </div>
			  </form>
         
            </div> <!-- col-md-8  -->
			   </div>

  


 

        </div><!-- row -->
      </div><!-- container -->
    </section>

     
     <?php
}
function popup(){
	?>  
	
	
	 <style type="text/css">
	.modal-content{ border-radius:0; }
	.modal-header{ border-bottom:0 none; }
    .modal-body {
      position: relative;
      padding: 25px;
      margin:0;
      border: 1px solid #f4a1a1;
    }
    .modal-body h1{
      font-size: 20px;
      margin: 0px;
      padding-bottom: 8px;
      font-weight: 700;
	  text-transform:none;
    }
    #content .modal-body p{
      margin: 15px 0 22px; text-align:center;
    }
    button.close {
      -webkit-appearance: none;
        padding: 0px !important;
        cursor: pointer;
        background: 0 0;
        border: 0;
        background: #222222;
        opacity: 1;
        border-radius: 50%;
        height: 38px;
        width: 38px;
        margin-top: -50px !important;
        margin-right: -50px;
        color: #fff;
        font-size: 28px !important;
		line-height:1;
        border: 2px solid #fff;
    }
    .modal-dialog {
   
      margin: 95px auto;
    }
 @media (max-width: 480px){
     .modal-body h1 {
      font-size: 16px;
  }
  button.close {
      margin-top: -53px !important;
      margin-right: -18px;
    }
 }

  </style>
    <!-- tab section End-->
	 <div class="modal fade" id="mymodal" tabIndex="-1" role="dialog" arial-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="modal-body text-center">
            <h1>Thank you.</h1>
			
			<h1> You have been successfully registered.</h1>
			
            <p> <!--<a href="<?php echo $login; ?>">Login in</a> --> Login now using your registered email address.
          </p> 
		  <!--  E-mail id and mobile verification code has been sent to registered mobile number.
           Please use the activation link and mobile verification code to activate your account. -->
          </div>          
            </div> <!-- /.modal-header -->

               
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>  <!-- /.modal-fade -->

 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
 <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<?php  $login = esc_url( get_permalink(324) ); ?>
	<script> $('#mymodal').modal('show');
	
		setTimeout(function () {
			window.location.replace('<?php echo $login; ?>'); 
		}, 2000);
	</script>
	
	<?php 
	
}

function registration_validation( $formdata )  { 
	
	global $reg_errors;
$reg_errors = new WP_Error;

if ( empty( $formdata['fname'] ) || empty( $formdata['password'] ) || empty( $formdata['email'] ) || empty( $formdata['lname']) ) {
    $reg_errors->add('field', 'Required form field is missing');
}
	if(empty($formdata['fname'])){
		$reg_errors->add( 'fname', 'Please enter first name.' );
	}else{
	}
	if(empty($formdata['lname'])){
		$reg_errors->add( 'lname', 'Please enter last name.' );
	}else{
		
	}
	if(empty($formdata['email'])){
		$reg_errors->add( 'email', 'Please enter Email.' );
	}else{
		if ( !is_email( $formdata['email'] ) ) {
			$reg_errors->add( 'email_invalid', 'Please enter valid email' );
		}else{
			if ( $formdata['email'] !== $formdata['vemail'] ) {
				$reg_errors->add( 'email_cinvalid', 'Verify email should be same as email' );
			}else{
				if ( email_exists( $formdata['email'] ) ) {
					$reg_errors->add( 'email', 'Email Already in use' );
				}
			}
		}
	}

	if(empty($formdata['password'])){
		$reg_errors->add( 'password', 'Please enter password.' );
	}else{
		if ( 6 > strlen( $formdata['password'] ) ) {
				$reg_errors->add( 'password', 'Password length must be greater than 6' );
		}else{
			if ( $formdata['password'] !== $formdata['cpassword'] ) {
				$reg_errors->add( 'cpassword', 'Confirm password should be same as password' );
			}
		}
			
	}
	
	if ( empty( $formdata['zip_code'] ) ){
		$reg_errors->add('zip_code', 'Please enter zip code');
	}else{
		 if ( 3 > strlen( $formdata['zip_code'] ) ) {
			$reg_errors->add( 'username_length', 'Please enter valid zip code' );
		}
	}

	

if ( is_wp_error( $reg_errors ) ) {
  echo '<div class="errReg">';
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
       
 
        echo "<span class='errRegSpan'>" .$error . '</span>';
       
         
    }
  echo '</div>';
}
}

function complete_registration( $fname,$lname, $password, $email, $vemail, $zip_code, $gender, $news, $ack) {
    global $reg_errors, $fname, $password, $email, $vemail, $cpassword, $zip_code, $gender, $news,$ack,$wpdb;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $email,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'user_url'      =>   '',
        'first_name'    =>   $fname,
        'last_name'     =>   $lname,
        'nickname'      =>   $fname,
        'description'   =>   "",
        );
        $user_id = wp_insert_user( $userdata );
		update_user_meta($user_id,'billing_postcode',$zip_code);
		update_user_meta($user_id,'shipping_postcode',$zip_code);
        if($news=='on'){
            $getSubscriberQuery = $wpdb->query("SELECT es_email_id from  wp_es_emaillist where es_email_mail='".$email."'");
            if(!$wpdb->num_rows){echo "ASD";
                $wpdb->query("INSERT into wp_es_emaillist(es_email_mail,es_email_status,es_email_created)values('".$email."','Confirmed',NOW())");
            }
        }
		popup();
       // echo '<div class="reg-cpmplete"> <span>Registration complete. Goto </span> <a href="' . get_site_url() . '/wp-login.php">login page</a> </div>';   
		//echo "<script>$('#mymodal').modal('show');</script>";
		}
}

function custom_registration_function() {
	prehtml();
	global $fname,$lname, $password, $email, $vemail, $cpassword, $zip_code, $gender, $news,$ack ;
    if ( isset($_POST['submit'] ) ) {
        registration_validation($_POST );
         
        // sanitize user form input
        
        $fname   =   sanitize_text_field( $_POST['fname'] );
		$lname   =   sanitize_text_field( $_POST['lname'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
        $vemail    =   esc_url( $_POST['vemail'] );
        $cpassword =   sanitize_text_field( $_POST['cpassword'] );
        $zip_code  =   sanitize_text_field( $_POST['zip_code'] );
        $gender   =   sanitize_text_field( $_POST['gender'] );
        $news        =   sanitize_text_field( $_POST['news'] );
		$ack        =   sanitize_text_field( $_POST['ack'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration( $fname,$lname, $password, $email, $vemail, $zip_code, $gender, $news, $ack );
    }
	$formData = $_POST;
	
 //$username, $password, $email, $website, $first_name, $last_name, $nickname, $bio
    registration_form( $fname,$lname, $password, $email, $vemail, $zip_code, $gender, $news, $ack,$formData);
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
   ob_start();
  
   custom_registration_function();
	
    return ob_get_clean();
}
