<?php
/**
 * Template Name: Checkout Decline Script
 *
 * Description: A page template that capture the request made when payment is done. 
 * Add user info into the database.
 *
 * @package WordPress
 * @subpackage Ticket Broadway
 * @since Ticket Broadway 1.0
 */

global $wpdb;
$email_address = $_REQUEST['email'];
$wpdb->query("UPDATE orders SET status=2 WHERE session_id = '".$_REQUEST['SessionId']."'");
//~ if( null == username_exists( $email_address ) ) {
  //~ // Generate the password and create the user
  //~ $password = wp_generate_password( 12, false );
  //~ $user_id = wp_create_user( $email_address, $password, $email_address );
//~ 
  //~ // Set the nickname
  //~ wp_update_user(
    //~ array(
      //~ 'ID'          =>    $user_id,
      //~ 'display_name'    =>    $_REQUEST['fullName'],
      //~ 'first_name'    =>    $_REQUEST['fullName']
    //~ )
  //~ );
  //~ //Insert Values
  //~ $getdataQuery = "SELECT * FROM orders WHERE session_id = '".$_REQUEST['SessionId']."' and email='".$email_address."'";
  //~ $userData = $wpdb->get_results($getdataQuery);
  //~ $userData = array_shift($userData);
  //~ $userDataCount =  $wpdb->num_rows;
  //~ if($userDataCount){
    //~ update_user_meta($user_id,'billing_first_name',$userData->fullname);
    //~ update_user_meta($user_id,'billing_address_1',$userData->address1);
    //~ update_user_meta($user_id,'billing_address_2',$userData->address2);
    //~ update_user_meta($user_id,'billing_city',$userData->city);
    //~ update_user_meta($user_id,'billing_postcode',$userData->zip);
    //~ update_user_meta($user_id,'billing_country',$userData->country);
    //~ update_user_meta($user_id,'billing_state',$userData->state);
    //~ update_user_meta($user_id,'billing_phone',$userData->phone);
    //~ update_user_meta($user_id,'billing_email',$userData->email);
    //~ update_user_meta($user_id,'shipping_first_name',$userData->fullname);
    //~ update_user_meta($user_id,'shipping_address_1',$userData->address1);
    //~ update_user_meta($user_id,'shipping_address_2',$userData->address2);
    //~ update_user_meta($user_id,'shipping_city',$userData->city);
    //~ update_user_meta($user_id,'shipping_postcode',$userData->zip);
    //~ update_user_meta($user_id,'shipping_country',$userData->country);
    //~ update_user_meta($user_id,'shipping_state',$userData->state);
  //~ }
  //~ // Set the role
  //~ $user = new WP_User( $user_id );
  //~ $user->set_role( 'subscriber' );
  //~ $subject = 'New Account Created';
  //~ $html = 'Hi User,<br/><br/>Thanks for registering with us.<br/><br/>Please use below details to login.<br/>Your Email: '.$email_address.'<br/>Your Password: '.$password.'<br/><br/>--<br/>Thanks<br/>Ticket Broadway';
  //~ // Email the user
  //~ wp_mail( $email_address, $subject, $html );
//~ 
//~ }
//~ //Decline Email
//~ 
//~ $subject = "Ticket Broadway : Checkout Decline";
//~ 
//~ $html = "Dear ".$_REQUEST['fullName'].",<br/><br/>
//~ Thank you for choosing Tickets Broadway,<br/><br/> 
//~ We're writing to let you know that we’ve received your registration but could not successfully process payment for your order.<br/><br/> 
//~ We saved your order and account information to a temporary account that you can find at this link: ------------------. We will hold this information for the next 2 hours, provided the desired show has not sold out or come within 1 hour of the opening curtain. <br/><br/>
//~ Upon providing an updated method of payment, once approved, we will send you a confirmation link to finish your registration, review your order, and find your seating assignments. <br/><br/>
//~ For any questions or assistance over the phone at 1-844-SEE-SHOW or visit us at: http://ticketsbroadway.com/contact-us/ to chat with an agent. <br/><br/>
//~ Thank You, <br/><br/>
//~ Tickets Broadway<br/><br/>
//~ 1-844-2SEESHOW";
//~ wp_mail( $email_address, $subject, $html );
