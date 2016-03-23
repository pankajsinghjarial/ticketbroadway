<?php
/**
 * Template Name: Before Payment Script
 *
 * Description: A page template that capture the request made when payment is done. 
 * Add user info into the database.
 *
 * @package WordPress
 * @subpackage Ticket Broadway
 * @since Ticket Broadway 1.0
 */
header('content-type: application/javascript');
    global $wpdb;
    //ini_set('display_errors',1);
    
    $json['get'] = $_REQUEST;
    //~ $json['server'] = $_SERVER;
    $checkoutUrl = parse_url($_SERVER['HTTP_REFERER']);
    parse_str($checkoutUrl['query'],$parameters);
    $json['parameters'] = $parameters;
    //SERVER DETAILS
    //~ $host = 'ec2-52-27-249-123.us-west-2.compute.amazonaws.com';
    //~ $username = 'root';
    //~ $password = 'x$eg#5Ds9Gv!';
    //~ $database = 'ticketsbroadway';
    //~ $host = 'localhost';
    //~ $username = 'seobdev_tb';
    //~ $password = '4txn6zz8f';
    //~ $database = 'seobdev_ticketbroadway1';
    //PUSH CODE TO BACKEND
    //~ $db = new mysqli($host, $username, $password, $database) or die('Error Establishing Database Connection');
    $sessionId = $parameters['SessionId'];
    $sessionIDQuery = "SELECT id FROM orders WHERE session_id = '".$sessionId."'";
    $ticket_row = strip_tags($_REQUEST['ticket']['row']);
    $userData = $wpdb->get_results($sessionIDQuery);
    $checkSessionID =  $wpdb->num_rows;
    if($checkSessionID){
        $orderId = $userData[0]->id;
        //Update Lead
        $wpdb->query("UPDATE orders SET address1 = '".$_REQUEST['customer']['address1']."', address2 = '".$_REQUEST['customer']['address2']."', city = '".$_REQUEST['customer']['city']."', country = '".$_REQUEST['customer']['country']."', state = '".$_REQUEST['customer']['state']."', email = '".$_REQUEST['customer']['email']."', full_name = '".$_REQUEST['customer']['fullName']."', phone = '".$_REQUEST['customer']['phone']."', zip = '".$_REQUEST['customer']['zip']."', event_name = '".$_REQUEST['event']['name']."', event_time = '".$_REQUEST['event']['time']."', venue = '".$_REQUEST['event']['venue']."', quantity = '".$_REQUEST['ticket']['quantity']."', ticket_row = '".$ticket_row."', total = '".str_replace('$','',$_REQUEST['ticket']['total'])."', session_id ='".$sessionId."',modified = NOW() WHERE id = ".$orderId);
    }else{
        //Insert Lead
        $wpdb->query("INSERT into orders (address1, address2, city, country,state, email, full_name, phone,  zip, event_name, event_time, venue, quantity, ticket_row, total, session_id,created) VALUES('".$_REQUEST['customer']['address1']."', '".$_REQUEST['customer']['address2']."', '".$_REQUEST['customer']['city']."', '".$_REQUEST['customer']['country']."','".$_REQUEST['customer']['state']."', '".$_REQUEST['customer']['email']."', '".$_REQUEST['customer']['fullName']."', '".$_REQUEST['customer']['phone']."', '".$_REQUEST['customer']['zip']."', '".$_REQUEST['event']['name']."', '".$_REQUEST['event']['time']."', '".$_REQUEST['event']['venue']."', '".$_REQUEST['ticket']['quantity']."', '".$ticket_row."', '".str_replace('$','',$_REQUEST['ticket']['total'])."','".$sessionId."',NOW())");
    }
    if(isset($_REQUEST['callback'])){
        $callback = $_REQUEST['callback'];
    }
    echo $callback.'('.str_replace('\\/','/',json_encode($json)). ')';
