<?php
/**
 * Template Name: After Payment Script
 *
 * Description: A page template that capture the request made when payment is done. 
 * Add user info into the database.
 *
 * @package WordPress
 * @subpackage Ticket Broadway
 * @since Ticket Broadway 1.0
 */

global $wpdb;
$email_address = $_REQUEST['uem'];
$wpdb->query("UPDATE orders SET status = 1 WHERE session_id = '".$_REQUEST['SessionId']."'");

if( null == username_exists( $email_address ) ) {

  // Generate the password and create the user
  $password = wp_generate_password( 12, false );
  $user_id = wp_create_user( $email_address, $password, $email_address );

  // Set the nickname
  wp_update_user(
    array(
      'ID'          =>    $user_id,
      'display_name'    =>    $email_address,
      'first_name'    =>    $email_address
    )
  );
  
  //Insert Values
  $getdataQuery = "SELECT * FROM orders WHERE session_id = '".$_REQUEST['SessionId']."' and email='".$email_address."'";
  $userData = $wpdb->get_results($getdataQuery);
  $userData = array_shift($userData);
  $userDataCount =  $wpdb->num_rows;
  if($userDataCount){
    update_user_meta($user_id,'billing_first_name',$userData->fullname);
    update_user_meta($user_id,'billing_address_1',$userData->address1);
    update_user_meta($user_id,'billing_address_2',$userData->address2);
    update_user_meta($user_id,'billing_city',$userData->city);
    update_user_meta($user_id,'billing_postcode',$userData->zip);
    update_user_meta($user_id,'billing_country',$userData->country);
    update_user_meta($user_id,'billing_state',$userData->state);
    update_user_meta($user_id,'billing_phone',$userData->phone);
    update_user_meta($user_id,'billing_email',$userData->email);
    update_user_meta($user_id,'shipping_first_name',$userData->fullname);
    update_user_meta($user_id,'shipping_address_1',$userData->address1);
    update_user_meta($user_id,'shipping_address_2',$userData->address2);
    update_user_meta($user_id,'shipping_city',$userData->city);
    update_user_meta($user_id,'shipping_postcode',$userData->zip);
    update_user_meta($user_id,'shipping_country',$userData->country);
    update_user_meta($user_id,'shipping_state',$userData->state);
  }
  // Set the role
  $user = new WP_User( $user_id );
  $user->set_role( 'subscriber' );
  $subject = 'New Account Created';
    $html = "Dear ".$userData->fullname.",<br/><br/>
Thank you for choosing Tickets Broadway, <br/><br/>
This is a confirmation that your registration and payment has been accepted. <br/><br/>
The confirmation number for your order is: ".$userData->id."<br/><br/>
To confirm your email, review your order and seating assignments, print your tickets, and update your profile, please follow this link. We hope to find more shows and musicals for you down the road. For any questions or assistance over the phone at 1-844-SEE-SHOW or visit us at: http://ticketsbroadway.com/contact-us/ to chat with an agent. <br/><br/>
Remember to arrive 30 Minutes before curtain!<br/><br/>
Enjoy The Show! <br/><br/>
Tickets Broadway<br/><br/>
1-844-2SEESHOW";
  // Email the user
  wp_mail( $email_address, $subject, $html );

}
