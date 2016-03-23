<?php
do_action ( 'login_init' );
if(is_user_logged_in ()) { 
		$dashboard =  esc_url( get_permalink(8) );	

echo "<script> window.location.href='".$dashboard ."'</script>";
			exit;
	}
 get_header(); 
 
 custom_breadcrumbs();
	$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;?>
<div class="container login">
	
	<?php if ( $login === "failed" ) {?>
				<p class="login-msg"> Invalid username and/or password.</p>
			<?php } elseif ( $login === "empty" ) { ?>
				<p class="login-msg">Username and/or Password is empty.</p>
			<?php } elseif ( $login === "false" ) {?>
				<p class="login-msg">You are logged out.</p>
			<?php } ?>
	<div class="row">
		<div class="col-md-6 col-xs-12 registerB new-customer">
        <h1><?php echo get_the_title(); ?></h1>
			<h2>NEW CUSTOMERS</h2>
			<p>By creating an account, you will be able to move through the checkout process faster, view track your orders in your account and manage your subscriptions.  </p>
			<a href="<?php echo esc_url( get_permalink(327) ); ?>"><button class="loginBtn">Create an account</button></a>
		</div>
		<div class="col-md-6 col-xs-12 loginB sign-up-right-content">
			<div class="col-md-12 col-xs-12 no-padding registere-border">
				<div class="col-xs-12 no-padding">
                <h2>REGISTERED CUSTOMERS / Login with:</h2>
				</div>                
                <!--<img src="<?php //echo get_template_directory_uri(); ?>/images/amazonLogin.png" class="img-responsive" alt="Image search Button"> --->
				<div class="col-xs-12 no-padding sign-up-login-right text-center social-media-login">                   
				   <div class="forMobile">
                   <div class="mob-dis">
				<?php do_action('facebook_login_button');?>
                </div>
                <div class="mob-dis">
				  <!--   <img src="<?php echo get_template_directory_uri(); ?>/images/twitterLogin.png" class="img-responsive" alt="Image search Button"> --->
				   <?php do_action( 'wordpress_social_login' ); ?>
                   </div>
                   <div id="amazonBtnLR" class="mob-dis pull-right"></div>				   
                   
                  </div>
                </div>
			</div>
			<p>If you have an account with us, please log in.</p>
			<?php
			
			$args = array(
				'redirect' => home_url( 'my-account', 'relative' ), 
				'id_username' => 'user',
				'id_password' => 'pass',
			);
				    if ( LoginWithAmazonUtility::shouldProcessAmazonLogin() || LoginWithAmazonUtility::shouldReregister() ) {
         $access_token = LoginWithAmazonUtility::getAcessToken();
	 
        if ( $access_token ) {
            // Ensure CSRF token present and valid
           $csrf_token = LoginWithAmazonUtility::getCsrfToken();
		 
            if ( $csrf_token && LoginWithAmazonUtility::verifyCsrfToken($csrf_token) ) {

                 $email = LoginWithAmazonUtility::getEmailFromAccessToken($access_token);
				  if ($email) {
                    // Find or create an Amazon user
                    $user = LoginWithAmazonUtility::findOrCreateUserByEmail($email);

					$errorMessa = isset($user->errors['login'][0])?$user->errors['login'][0]:'';
				
					if(!empty($errorMessa)){
						//do_action ( 'login_init' );
					}
			}
		}
				}
				}
			
			wp_login_form($args);?>
            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="forgot-pass-btn"  target="_blank">Forgot your password ?</a>
		</div>
	</div>
</div>
<script>
$('#user').attr( 'placeholder', 'Email Address' );
$('#pass').attr( 'placeholder', 'Password' );
</script>

	
	
<?php get_footer(); ?>
