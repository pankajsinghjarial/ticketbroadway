<?php 

//DEFINE('WSDL', 'http://tnwebservices-test.ticketnetwork.com/tnwebservice/v3.2/tnwebservicestringinputs.asmx?WSDL');	

DEFINE('WSDL', 'http://tnwebservices.ticketnetwork.com/TNWebService/v3.2/WSDL/tnwebservicestringinputs.xml');

DEFINE('WEB_CONF_ID', 20732); // make sure you change this to your config id
DEFINE('HIGH_INVENTORY_PERFORMERS_LENGTH', 15);
DEFINE('HIGH_SALES_PERFORMERS_LENGTH', 15);
DEFINE('DEFAULT_COL_SORT', 'Date');
DEFINE('TICKET_PAGINATION', 25); // empty string for no pagination, else u can use this to separate ticket group 
DEFINE('BROKER_ID', 8388);
DEFINE('SITE_ID', 0);
if (!class_exists('TicketNetwork')) {
	class TicketNetwork{
		public function __construct() {
			
				
		}
		function getAllEventDetailsArray($param) {
			set_time_limit ( 0 );
			ini_set('memory_limit', -1);
			$arrayString = "!";
			$param['websiteConfigID'] = WEB_CONF_ID;
			$parametersExist = false;
			$paramkeys = array_keys($param);
			$paramvalues = array_values($param);
			for($a = 1; $a < count($param); $a++) {
				if($param[$paramkeys[$a]]) {
					$parametersExist = true;
					$arrayString=$arrayString.$paramvalues[$a]."?";
					break;
				}
			}
			$resultEvent = array();
			if($parametersExist) {
				$client = new SoapClient(WSDL);
				$result = $client -> __soapCall('GetEvents', array('parameters' => $param));
				if(is_soap_fault($result)) {
					echo '<h2>Fault</h2><pre>';
					print_r($result);
					echo '</pre>';
				}
				if(empty($result))
					return "empty result";
				else {
					if(isset($result->GetEventsResult->Event)){
						$resultEvent = $result->GetEventsResult->Event;
					}
					return $resultEvent;
				}
			} 
		}
		
		function getVenueData($param) {
	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;
	if($param['venueID']) {
		$client = new SoapClient(WSDL);
		$result = $client -> __soapCall('GetVenue', array('parameters' => $param));
		if(is_soap_fault($result)) {
			echo '<h2>Fault</h2><pre>';
			print_r($result);
			echo '</pre>';
		}
		$paramVenueData="";
		unset($client);
		if(empty($result)){
			return "No Venue Data Exists";
		}else {
			return $result->GetVenueResult->Venue;
		}
	} else {
		return '<div class="venueInfo">There is no venue information available for this event</div>';
	}
}
		function getVenueData1($param) {
			$param['websiteConfigID'] = WEB_CONF_ID;
			if($param) {
				echo "<pre>";
			print_r($param);
			echo "</pre>";
			
				$client = new SoapClient(WSDL);
				$result = $client -> __soapCall('GetVenue', array('parameters' => $param));
				$paramVenueData="";
		unset($client);
				if(is_soap_fault($result)) {
					echo '<h2>Fault</h2><pre>';
					print_r($result);
					echo '</pre>';
				}
				return $result->GetVenueResult->Venue;
				
			}
		}
		function getCategories(){
			$websiteConfigID = WEB_CONF_ID;
			$client = new SoapClient(WSDL);
			$result = $client -> __soapCall('GetCategories', array('parameters' => array('websiteConfigID'=>$websiteConfigID)));
			if(is_soap_fault($result)) {
				echo '<h2>Fault</h2><pre>';
				print_r($result);
				echo '</pre>';
			}
			$categoryDetails="";
			unset($client);
			if(empty($result -> GetCategoriesResult))
				return "empty result";
			else {
				return $result->GetCategoriesResult->Category;
			}
		}
	}
}


?>