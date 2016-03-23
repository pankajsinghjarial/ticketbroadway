<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<form method="post" class="lost_reset_password fogot-mail">

	<?php if( 'lost_password' === $args['form'] ) : ?>
<h1 class="creat-acc-heading-form"> Retrieve your password here </h1>
		<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>
<div class="form-row form-row-first col-md-12 no-padding retrieve-password">
		
       <?php /*?> <label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label> <?php */?>
        <div class="form-group">
        <input class="form-control" type="text" name="user_login" id="user_login" placeholder="*Email Address" />
        </div>
        </div>
        

	<?php else : ?>

		<p><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></p>

		<p class="form-row form-row-first">
			<label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="password" class="input-text" name="password_1" id="password_1" />
		</p>
		<p class="form-row form-row-last">
			<label for="password_2"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="password" class="input-text" name="password_2" id="password_2" />
		</p>

		<input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
		<input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />

	<?php endif; ?>

	

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	
		<input type="hidden" name="wc_reset_password" value="true" />
		<input type="submit" class="btn btn-default" value="<?php echo 'lost_password' === $args['form'] ? __( 'Retrieve Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" />
	

	<?php wp_nonce_field( $args['form'] ); ?>

</form>
<div class="col-md-12 back-btn no-padding">
 <a class="btn btn-default abackh mob" href="<?php echo esc_url( get_permalink(324) ); ?>"><i class="fa fa-angle-left"></i> Back to login</a> </button>
<!--
                  <button class="btn btn-default mob"><i class="fa fa-angle-left"></i> Back to login </button> -->
              </div>
              