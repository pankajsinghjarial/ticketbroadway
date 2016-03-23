<?php
/**
 * Template Name: Responsive Map Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('responsivemap');
$parameters = array();
$parameters['websiteConfigID']=20732;
//$parameters['websiteConfigID']=20777;
$parameters['numberOfRecords']='';
$parameters['orderByClause'] = 'ActualPrice ASC';
$parameters['eventID']=$_REQUEST['eventID'];
$parametersEventID['eventID']=$_REQUEST['eventID'];

$user_id = get_current_user_id();
if ($user_id == 0) {
   
	
	$billing_address_1 = '';
	$billing_address_2 = '';
	$billing_city = '';
	$billing_state = '';
	$billing_country = '';
	$billing_postcode = '';
	$billing_phone = '';
	$user_email = '';
	$display_name = '';
	$userid = '';
	
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

$userinformation = '&uid='.$userid.'&una='.$display_name.'&uem='.$user_email.'&ba1='.$billing_address_1.'&ba2='.$billing_address_2.'&bci='.$billing_city.'&bsa='.$billing_state.'&bco='.$billing_country.'&bpo='.$billing_postcode.'&bph='.$billing_phone;

function getRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

$RandonSessionId = getRandomString();

 ?>
<script type="text/javascript">
var brokerID = '<?php echo BROKERID; ?>';
var siteNumber = '<?php echo SITENUMBER; ?>';
var eventID = '<?php echo $_REQUEST['eventID']; ?>';
var userinformation = '<?php echo $userinformation; ?>';
</script>

<div class="container" style="height:700px;">
	<script type="text/javascript" src="https://mapwidget2.seatics.com/js?eventId=<?php echo $_REQUEST['eventID']; ?>&websiteConfigId=20732">

</script>
	<script type="text/javascript">
var Seatics = Seatics || {};
				Seatics.config = Seatics.config || {};
				Seatics.config.checkoutUrl = "https://secure.ticketsbroadway.com/checkout/mobile2/Checkout.aspx?brokerid="+brokerID+"&sitenumber="+siteNumber+userinformation;


</script>
</div>
<?php get_footer('responsivemap'); ?>
