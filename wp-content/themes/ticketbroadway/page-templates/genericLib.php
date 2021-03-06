<?php
//require_once('tnwsConstants.php');





/*
	Web Service Calls
*/





/*
	SearchEvents uses a cached version of the entire Events table in the Exchange database,
	returning a faster result. The cache is refreshed every 10 minutes, and Events are not Tickets
	Event objects contain tickets, do not cache tickets, but events are ok to cache
*/

function searchEvents($keyWordParams) {

	$resultString = '';
	$keyWordParams['websiteConfigID'] = WEB_CONF_ID;

	if($keyWordParams['searchTerms']) 
	{
			$client = new SoapClient(WSDL);

      	$result = $client->__soapCall('SearchEvents', array('parameters' => $keyWordParams));
      
      	if (is_soap_fault($result)) 
      	{
        	echo '<h2>Fault</h2><pre>';
         	print_r($result);
       		echo '</pre>';
      	}
      
      	unset($client);
      	if (empty($result)) return "No results match the specified terms";
      	else {
    		
				$returnString = '';
				
    			if(isset($result->SearchEventsResult->Event)) 
				{
				//prx($result->SearchEventsResult->Event);
        			if(is_array($result->SearchEventsResult->Event)) {
          				for($i = 0; $i < count($result->SearchEventsResult->Event); $i++) {
               			  $returnString .= '<div class="resultsSection">';
               			  $returnString .= resultsTable($result->SearchEventsResult->Event[$i]);
                			$returnString .= '</div>';
          				}
        			} else {
          				$returnString .= '<div class="resultsSection">';
          				$returnString .= resultsTable($result->SearchEventsResult->Event);
                	$returnString .= '</div>';
        			}
    			}
      	  else 
				{
      				$returnString .= '<div class="resultsSection">';
      				$returnString .= 'There were no matches';
      				$returnString .= '</div>';
    			}
    			return $returnString;  
      	}
	}
}







function getTest(){
    $param['websiteConfigID'] = WEB_CONF_ID;
      	$client = new SoapClient(WSDL);
  
  	$result = $client->__soapCall('GetInteractiveMapModuleURLs', array('parameters' => $param));
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
}
		
function getEvents($param) {		
	$param['websiteConfigID'] = WEB_CONF_ID;

  $parametersExist = false;
  $paramkeys = array_keys($param);
	
  for($a = 1; $a<count($param); $a++) {
  	if($param[$paramkeys[$a]]) {
  		$parametersExist = true;
  		break;
  	}
  }
  
  if($parametersExist) {
  	$client = new SoapClient(WSDL);
  
  	$result = $client->__soapCall('GetEvents', array('parameters' => $param));

  	if (is_soap_fault($result)) 
  	{
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
  	}
  
 		unset($client);
  	if (empty($result)) return "empty result";
  	else {
 // print_r($result); //If you want an example array uncomment this and use event id 203518 for a single result
  
  // event will have an array with a count of events if the result is multiple, else event will go directly to the one 
  //	result event
  
  /*
  Example events array:
  
  $result['GetEventsStringInputsResult']['Event'] =>
  
  Array ( [ID] => 664146 [Name] => Hannah Montana [Date] => 2008-01-03T19:00:00 [DisplayDate] => 01/03/2008 7:00PM [Venue] => Quicken Loans Arena (formerly Gund Arena) [City] => Cleveland [StateProvince] => OH [ParentCategoryID] => 2 [ChildCategoryID] => 62 [GrandchildCategoryID] => 25 [MapURL] => http://www.indux.com/map/gundArena_basketball.gif [VenueID] => 253 [StateProvinceID] => 36 [VenueConfigurationID] => 0 [Clicks] => 0 [IsWomensEvent] => false )
  
  ID													Event ID
  Name												Event Name
  Date												Date Time
  DisplayDate									Date Time but Formatted for easy copy and paste
  Venue												Hartford Civic Center, Madison Square Garden etc.
  City												New York, Cleveland, etc.
  StateProvince								CT, VT, MA for example
  ParentCategoryID						ID, useful for other ws calls
  ChildCategoryID							ID, useful for other ws calls
  GrandchildCategoryID				ID, useful for other ws calls
  MapURL											Image location of the Map
  VenueID											Venue ID, for use in other ws calls
  StateProvinceID							State Province ID, for use in other ws calls
  VenueConfigurationID				Each Venue has "n" configurations, stage, arena, etc.
  Clicks											Deprecated
  IsWomensEvent								really useful for college basketball teams for example, where theres a mens and a womens
  
  */
  
			$returnString = '';
			if(isset($result->GetEventsResult)) {
				if(is_array($result->GetEventsResult->Event)) {
    			for($i = 0; $i < count($result->GetEventsResult->Event); $i++) {
       		  $returnString .= '<div class="resultsSection">';
       		  $returnString .= resultsTable($result->GetEventsResult->Event[$i]);
        		$returnString .= '</div>';
    			}
				} else {
  				$returnString .= '<div class="resultsSection">';
  				$returnString .= resultsTable($result->GetEventsResult->Event);
        	$returnString .= '</div>';
				}
			}
  	  else {
				$returnString .= '<div class="resultsSection">';
				$returnString .= 'There were no matches';
				$returnString .= '</div>';
			}
  
			return $returnString;  
  
  	}
  
  } else { // no parameters
	
		return 'Please specify some search terms.';
	
	}

}

function getEventsSingleCustom($param) {		
	$param['websiteConfigID'] = WEB_CONF_ID;

  $parametersExist = false;
  $paramkeys = array_keys($param);
	
  for($a = 1; $a<count($param); $a++) {
  	if($param[$paramkeys[$a]]) {
  		$parametersExist = true;
  		break;
  	}
  }
  
  if($parametersExist) {
  	$client = new SoapClient(WSDL);
  
  	$result = $client->__soapCall('GetEvents', array('parameters' => $param));

  	if (is_soap_fault($result)) 
  	{
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
  	}
  
 		unset($client);
  	if (empty($result)) return "empty result";
  	else {
		return $result;
 // print_r($result); //If you want an example array uncomment this and use event id 203518 for a single result
  
  // event will have an array with a count of events if the result is multiple, else event will go directly to the one 
  //	result event
  
  /*
  Example events array:
  
  $result['GetEventsStringInputsResult']['Event'] =>
  
  Array ( [ID] => 664146 [Name] => Hannah Montana [Date] => 2008-01-03T19:00:00 [DisplayDate] => 01/03/2008 7:00PM [Venue] => Quicken Loans Arena (formerly Gund Arena) [City] => Cleveland [StateProvince] => OH [ParentCategoryID] => 2 [ChildCategoryID] => 62 [GrandchildCategoryID] => 25 [MapURL] => http://www.indux.com/map/gundArena_basketball.gif [VenueID] => 253 [StateProvinceID] => 36 [VenueConfigurationID] => 0 [Clicks] => 0 [IsWomensEvent] => false )
  
  ID													Event ID
  Name												Event Name
  Date												Date Time
  DisplayDate									Date Time but Formatted for easy copy and paste
  Venue												Hartford Civic Center, Madison Square Garden etc.
  City												New York, Cleveland, etc.
  StateProvince								CT, VT, MA for example
  ParentCategoryID						ID, useful for other ws calls
  ChildCategoryID							ID, useful for other ws calls
  GrandchildCategoryID				ID, useful for other ws calls
  MapURL											Image location of the Map
  VenueID											Venue ID, for use in other ws calls
  StateProvinceID							State Province ID, for use in other ws calls
  VenueConfigurationID				Each Venue has "n" configurations, stage, arena, etc.
  Clicks											Deprecated
  IsWomensEvent								really useful for college basketball teams for example, where theres a mens and a womens
  
  */
  
			$returnString = '';
			if(isset($result->GetEventsResult)) {
				if(is_array($result->GetEventsResult->Event)) {
    			for($i = 0; $i < count($result->GetEventsResult->Event); $i++) {
       		  $returnString .= '<div class="resultsSection">';
       		  $returnString .= resultsTable($result->GetEventsResult->Event[$i]);
        		$returnString .= '</div>';
    			}
				} else {
  				$returnString .= '<div class="resultsSection">';
  				$returnString .= resultsTable($result->GetEventsResult->Event);
        	$returnString .= '</div>';
				}
			}
  	  else {
				$returnString .= '<div class="resultsSection">';
				$returnString .= 'There were no matches';
				$returnString .= '</div>';
			}
  
			return $returnString;  
  
  	}
  
  } else { // no parameters
	
		return 'Please specify some search terms.';
	
	}

}
function getHighInventoryPerformers($param) {
	$resultString = '';

	/*    params
	websiteConfigID:  	
	numReturned: 	
	parentCategoryID: 	
	childCategoryID: 	
	grandchildCategoryID: 	
	*/
	
	$param['websiteConfigID'] = WEB_CONF_ID;
	$param['numReturned'] = HIGH_INVENTORY_PERFORMERS_LENGTH;
  
	$client = new SoapClient(WSDL);

	$result = $client->__soapCall('GetHighInventoryPerformers', array('parameters' => $param));

//$result = $client->__soapCall('GetHighInventoryPerformers', array('parameters' => $param));

	if (is_soap_fault($result)) 
	{
  	echo '<h2>Fault</h2><pre>';
   	print_r($result);
 		echo '</pre>';
	}

	unset($client);
	if (empty($result->GetHighInventoryPerformersResult)) return "empty result";
	else {  
	$returnString = '';
	
		for($i = 0; $i < count($result->GetHighInventoryPerformersResult->PerformerPercent); $i++) {
 		  $returnString .= '<div class="resultsSection">';
 		  $returnString .= highPerformersTable($result->GetHighInventoryPerformersResult->PerformerPercent[$i]);
  		$returnString .= '</div>';
		}

/*
for($i = 0; $i < count($result->GetHighInventoryPerformersResult->PerformerPercent); $i++) {
 		  $returnString .= '<div class="resultsSection">';
 		  $returnString .= highPerformersTable($result->GetHighInventoryPerformersResult->PerformerPercent[$i]);
  		$returnString .= '</div>';
		}
*/		
	return $returnString;  

	}
}


function getHighSalesPerformers($param) {
	$resultString = '';

	/*    params
	websiteConfigID:  	
	numReturned: 	
	parentCategoryID: 	
	childCategoryID: 	
	grandchildCategoryID: 	
	*/
	
	$param['websiteConfigID'] = WEB_CONF_ID;
	$param['numReturned'] = HIGH_SALES_PERFORMERS_LENGTH;

  
	$client = new SoapClient(WSDL);

	$result = $client->__soapCall('GetHighSalesPerformers', array('parameters' => $param));

//	$result = $client->__soapCall('GetHighSalesPerformers', array('parameters' => $param));
	
	if (is_soap_fault($result)) 
	{
  	echo '<h2>Fault</h2><pre>';
   	print_r($result);
 		echo '</pre>';
	}

	unset($client);
	if (empty($result)) return "empty result";
	else {  
	$returnString = '';
		/*
			for($i = 0; $i < count($result->GetHighSalesPerformersStringInputsResult->PerformerPercent); $i++) {
	 		  $returnString .= '<div class="resultsSection">';
	 		  $returnString .= highPerformersTable($result->GetHighSalesPerformersStringInputsResult->PerformerPercent[$i]);
	  		$returnString .= '</div>';
			}
		
		*/
		
		for($i = 0; $i < count($result->GetHighSalesPerformersResult->PerformerPercent); $i++) {
 		  $returnString .= '<div class="resultsSection">';
 		  $returnString .= highPerformersTable($result->GetHighSalesPerformersResult->PerformerPercent[$i]);
  		$returnString .= '</div>';
		}

	return $returnString;  

	}
  
}

function pr($requestData){
	//echo "<pre>";
	//print_r($requestData);
	//echo "</pre>";
}
function prx($requestData){
	echo "<pre>";
	print_r($requestData);
	echo "</pre>";
	exit();
}
function getTickets($param) {
	
/*  param list
websiteConfigID:  	
numberOfRecords: 	
eventID: 	
lowPrice: 	
highPrice: 	
ticketGroupID: 	
mandatoryCreditCard: 	
requestedSplit: 	
sortColumn: 	
sortDescending:
*/

	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;
	$param['numberOfRecords'] = TICKET_PAGINATION;
	
	$parametersExist = false;
  $paramkeys = array_keys($param);
	pr($paramkeys);
  for($a = 1; $a<count($param); $a++) {
  	if($param[$paramkeys[$a]]) {
  		$parametersExist = true;
  		break;
  	}
  }

	if($parametersExist){
		$client = new SoapClient(WSDL);
		

  	$result = $client->__soapCall('GetTickets', array('parameters' => $param));

  	if (is_soap_fault($result)) 
  	{
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
  	}
  
  	unset($client);
if (empty($result)) return "No tickets exist for that event";
else {  

	if(isset($result->GetTicketsResult->TicketGroup)) {
  		if(is_array($result->GetTicketsResult->TicketGroup)) {
			$returnString = '<table cellspacing="0" cellpadding="0" border="0" width="100%" id="ticket_groups_table">';
			for($y=0; $y<count($result->GetTicketsResult->TicketGroup); $y++) {
				$returnString .= '<tr>';
  				$returnString .= '<td>' . ticketsResultTable($result->GetTicketsResult->TicketGroup[$y]) . '</td>';
				$returnString .= '</tr>';
			}
			return $returnString . '</table>';
		} else {
			return ticketsResultTable($result->GetTicketsResult->TicketGroup);
		}
	} else {
		return 'No tickets are available for this event';
	}
		
} 
}

}

function getTicketsCustom($param) {
	
	/*  param list
	websiteConfigID:  	
	numberOfRecords: 	
	eventID: 	
	lowPrice: 	
	highPrice: 	
	ticketGroupID: 	
	mandatoryCreditCard: 	
	requestedSplit: 	
	sortColumn: 	
	sortDescending:
	*/

	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;
	//$param['numberOfRecords'] = TICKET_PAGINATION;
	$parametersExist = false;
	$paramkeys = array_keys($param);
	//echo "<pre>";	
	
	for($a = 1; $a<count($param); $a++) {
	  	if($param[$paramkeys[$a]]) {
	  		$parametersExist = true;
	  		break;
	  	}
	}

	if($parametersExist){
		
		$client = new SoapClient(WSDL);
		$result = $client->__soapCall('GetTickets', array('parameters' => $param));
		if (is_soap_fault($result)) 
	  	{
	    		echo '<h2>Fault</h2><pre>';
	     		print_r($result);
	   		echo '</pre>';
	  	}
  		unset($client);
		if (empty($result)) return 0;
		else {  
			
			if(isset($result->GetTicketsResult->TicketGroup)) {
  				if(is_array($result->GetTicketsResult->TicketGroup)) {
					return $result->GetTicketsResult->TicketGroup;
					/*
						$returnString = '<table cellspacing="0" cellpadding="0" border="0" width="100%" id="ticket_groups_table">';
						for($y=0; $y<count($result->GetTicketsResult->TicketGroup); $y++) {
							$returnString .= '<tr>';
	  						$returnString .= '<td>' . ticketsResultTable($result->GetTicketsResult->TicketGroup[$y]) . '</td>';
							$returnString .= '</tr>';
						}
						return $returnString . '</table>';
					*/
				} else {
					return $result->GetTicketsResult->TicketGroup;
				}
			} 
			else {
				return 0;
			}
		
		} 
	}

}


function getTicketsCustom3($param) {
	
	/*  param list
	websiteConfigID:  	
	numberOfRecords: 	
	eventID: 	
	lowPrice: 	
	highPrice: 	
	ticketGroupID: 	
	mandatoryCreditCard: 	
	requestedSplit: 	
	sortColumn: 	
	sortDescending:
	*/

	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;
	//$param['numberOfRecords'] = TICKET_PAGINATION;
	$parametersExist = false;
	$paramkeys = array_keys($param);
	//echo "<pre>";	
	
		
	for($a = 1; $a<count($param); $a++) {
	  	if($param[$paramkeys[$a]]) {
	  		$parametersExist = true;
	  		break;
	  	}
	}

	if($parametersExist){
		
		$client = new SoapClient(WSDL);
		$result = $client->__soapCall('GetEventTickets3', array('parameters' => $param));
			
		if (is_soap_fault($result)) 
	  	{
	    		echo '<h2>Fault</h2><pre>';
	     		print_r($result);
	   		echo '</pre>';
	  	}
  
  		unset($client);
		if (empty($result)) return 0;
		else {  

			if(isset($result->GetEventTickets3Result->Tickets->TicketGroup3)) {
  				if(is_array($result->GetEventTickets3Result->Tickets->TicketGroup3)) {
					return $result->GetEventTickets3Result->Tickets->TicketGroup3;
					/*
						$returnString = '<table cellspacing="0" cellpadding="0" border="0" width="100%" id="ticket_groups_table">';
						for($y=0; $y<count($result->GetTicketsResult->TicketGroup); $y++) {
							$returnString .= '<tr>';
	  						$returnString .= '<td>' . ticketsResultTable($result->GetTicketsResult->TicketGroup[$y]) . '</td>';
							$returnString .= '</tr>';
						}
						return $returnString . '</table>';
					*/
				} else {
					return $result->GetEventTickets3Result->Tickets->TicketGroup3;
				}
			} 
			else {
				return 0;
			}
		
		} 
	}

}




function getTickets2($param) {
	/*  param list
	 websiteConfigID:
	 numberOfRecords:
	 eventID:
	 lowPrice:
	 highPrice:
	 ticketGroupID:
	 mandatoryCreditCard:
	 requestedSplit:
	 sortColumn:
	 sortDescending:
	 */
	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;
	$param['numberOfRecords'] = TICKET_PAGINATION;
	$parametersExist = false;
	$paramkeys = array_keys($param);
	for($a = 2; $a < count($param); $a++) {
		if($param[$paramkeys[$a]]) {
			$parametersExist = true;
			break;
		}
	}
	
	//die(var_dump($param));
	
	if($parametersExist){
		$client = new SoapClient(WSDL);
		$result = $client -> __soapCall('GetTickets', array('parameters' => $param));
		//var_dump($result);
		
		if(is_soap_fault($result)) {
			echo '<h2>Fault</h2><pre>';
			print_r($result);
			echo '</pre>';
		}
		$paramTickets="";
		unset($client);
		if(empty($result->GetTicketsResult->TicketGroup)){
			return "No tickets exist for that event";
		}else {
			for($q=0;$q<count($result->GetTicketsResult->TicketGroup);$q++){//
			
				$resultsObj=$result->GetTicketsResult->TicketGroup;
				$eTickCount;
				foreach ($resultsObj as $k => $v) {
					global $eTickCount;
					$paramTickets[$eTickCount]=array($k=>$v);
					$eTickCount++;
				}
			}
		}return $paramTickets;
	}
}
function getTickets1($param) {
	
/*  param list
websiteConfigID:  	
numberOfRecords: 	
eventID: 	
lowPrice: 	
highPrice: 	
ticketGroupID: 	
mandatoryCreditCard: 	
requestedSplit: 	
sortColumn: 	
sortDescending:
*/

	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;
	$param['numberOfRecords'] = TICKET_PAGINATION;
	
	$parametersExist = false;
  $paramkeys = array_keys($param);
	
  for($a = 1; $a<count($param); $a++) {
  	if($param[$paramkeys[$a]]) {
  		$parametersExist = true;
  		break;
  	}
  }

	if($parametersExist){
		$client = new SoapClient(WSDL);
		
pr($param);
  	$result = $client->__soapCall('GetTickets', array('parameters' => $param));

  	if (is_soap_fault($result)) 
  	{
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
  	}
  
  	unset($client);
if (empty($result)) return "No tickets exist for that event";
else {  

	if(isset($result->GetTicketsResult->TicketGroup)) {
  		if(is_array($result->GetTicketsResult->TicketGroup)) {
			$returnString = '<table cellspacing="0" cellpadding="0" border="0" width="100%" id="ticket_groups_table">';
			for($y=0; $y<count($result->GetTicketsResult->TicketGroup); $y++) {
				$returnString .= '<tr>';
  				$returnString .= '<td>' . ticketsResultTable($result->GetTicketsResult->TicketGroup[$y]) . '</td>';
				$returnString .= '</tr>';
			}
			return $returnString . '</table>';
		} else {
			return ticketsResultTable($result->GetTicketsResult->TicketGroup);
		}
	} else {
		return 'No tickets are available for this event';
	}
		
} 
}

}
function getCategories(){
	$websiteConfigID = WEB_CONF_ID;

	$client = new SoapClient(WSDL);
	$result = $client -> __soapCall('GetCategories', array('parameters' => array('websiteConfigID'=>WEB_CONF_ID)));
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
		for($q=0;$q<count($result->GetCategoriesResult->Category);$q++){
			$resultsObj=$result->GetCategoriesResult->Category[$q];
			$eTickCount;
			foreach ($resultsObj as $k => $v) {
				global $eTickCount;
				$categoryDetails[$eTickCount]=array($k=>$v);
				$eTickCount++;
			}
		}
		return $categoryDetails;
	}
}

function getVenueData($param, $vConfID) {
	$resultString = '';
	$param['websiteConfigID'] = WEB_CONF_ID;

	if($param['venueID']) {
		$client = new SoapClient(WSDL);

  	$result = $client->__soapCall('GetVenueStringInputs', array('parameters' => $param));
  
  	if (is_soap_fault($result)) 
  	{
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
  	}
  
  	unset($client);
  	if (empty($result)) return "No Venue Data Exists";
  	else {  
  
  		if(isset($result->GetVenueStringInputsResult->Venue)) {
  			if(is_array($result->GetVenueStringInputsResult->Venue)) {
					$returnString = '<div class="venueInfo"><table cellspacing="0" cellpadding="0" border="0" width="100%">';
					for($y=0; $y<count($result->GetVenueStringInputsResult->Venue); $y++) {
						$returnString .= '<tr>';
  					$returnString .= '<td>' . venueResultTable($result->GetVenueStringInputsResult->Venue[$y], $vConfID) . '</td>';
						$returnString .= '</tr>';
					}
					
					return $returnString . '</table></div>';
				} else {
					return '<div class="venueInfo">' . venueResultTable($result->GetVenueStringInputsResult->Venue, $vConfID) . '</div>';
				}
			} else {
				return '<div class="venueInfo">No Venues Exist For This Event</div>';
			}
		}
		
	} else {
	
		return '<div class="venueInfo">There is no venue information available for this event</div>';
	}
}


function getVenueMap($venueID, $vConfID) {
	$param = array(
		'websiteConfigID' => WEB_CONF_ID,
		'venueID' => $venueID,
		'whereClause' => '',
		'orderByClause' => ''
	);

	$client = new SoapClient(WSDL);

	$result = $client->__soapCall('GetVenueConfigurations', array('parameters' => $param));

	if (is_soap_fault($result)) 
	{
  	echo '<h2>Fault</h2><pre>';
   	print_r($result);
 		echo '</pre>';
	}
	
	unset($client);
	if (empty($result)) return '<div class="venueInfo">No maps exist for that venue</div>';
	else {
    if(isset($result->GetVenueConfigurationsResult->VenueConfiguration)) {
			if(is_array($result->GetVenueConfigurationsResult->VenueConfiguration)) {
				return $result->GetVenueConfigurationsResult->VenueConfiguration[(($vConfID == '') || ($vConfID > count($result->GetVenueConfigurationsResult->VenueConfiguration))) ? 0 : $vConfID]->MapURL;
  		} else {
  			return $result->GetVenueConfigurationsResult->VenueConfiguration->MapURL;
  		}
  	} else {
  		return '<div class="venueInfo">No maps exist for that venue</div>';
  	}
		
  }
}

// call jonah search

function getKeyWordEvents($keyWordParams) {

	$resultString = '';
	$keyWordParams['websiteConfigID'] = WEB_CONF_ID;

	if($keyWordParams['search_term']) {
		$client = new SoapClient(WSDL);

  	$result = $client->__soapCall('SearchEventsStringInputs', array('parameters' => $keyWordParams));
  
  	if (is_soap_fault($result)) 
  	{
    	echo '<h2>Fault</h2><pre>';
     	print_r($result);
   		echo '</pre>';
  	}
  
  	unset($client);
	if (empty($result)) return "No results match the specified terms";
	else {

		$returnString = '';
		if(isset($result->SearchEventsStringInputResult->Event)) {
			if(is_array($result->SearchEventsStringInputResult->Event)) {
    				for($i = 0; $i < count($result->SearchEventsStringInputResult->Event); $i++) {
       			  $returnString .= '<div class="resultsSection">';
       			  $returnString .= resultsTable($result->SearchEventsStringInputResult->Event[$i]);
        			$returnString .= '</div>';
    				}
			} else {
  				$returnString .= '<div class="resultsSection">';
  				$returnString .= resultsTable($result->SearchEventsStringInputResult->Event);
        			$returnString .= '</div>';
			}
		}
  	  	else {
				$returnString .= '<div class="resultsSection">';
				$returnString .= 'There were no matches';
				$returnString .= '</div>';
		}
  
	return $returnString;  
  
  	}

	}
}


/*
	These functions parse the returned arrays into results tables
*/

function resultsTable($resultsObj) {
	$resultString = '<table cellpadding="0" cellspacing="0" border="0">';
	$resultString .= '<tr valign="top"><td class="resultsCol1">Event ID: ' . $resultsObj->ID . '</td><td class="resultsCol2">Event Name: <span class="spn_underline">' . $resultsObj->Name . '</span></td><td class="resultsCol3">Date: ' . $resultsObj->DisplayDate . '</td></tr>';
	$resultString .= '<tr><td>Venue: ' . $resultsObj->Venue . '</td><td class="resultsCol2">City: ' . $resultsObj->City . '</td><td>State: ' . $resultsObj->StateProvince .  '</td></tr>';
	$resultString .= '</table>';
	
	$vConfID = '';
	if($resultsObj->MapURL) {
		$vConfID = $resultsObj->VenueConfigurationID;
	}
	
	$resultString .= '<a href="/tbtestapi/resultsTicket.php?eventID=' . $resultsObj->ID . '&venueID=' . $resultsObj->VenueID . '&venueConfID=' . $vConfID . '">View Tickets</a>';
	return $resultString;
} 

function highPerformersTable($resultsObj) {
	$resultString = '<a href="/tbtestapi/resultsGeneral.php?performerID=' . $resultsObj->Performer->ID . '" alt="' . $resultsObj->Performer->Description . '">';
	
	$resultString .= $resultsObj->Performer->Description . '</a><br/>';
	
	return $resultString;
}


function ticketsResultTable($ticketGroupObj) {
	
	$returnString = '<div class="tg_container"><table cellspacing="0" cellpadding="0" border="0" class="ticket_group" width="100%"><tr><td class="tix_col1">';
	
	$returnString .= 'Section: ' . $ticketGroupObj->Section . '</td><td class="tix_col2">Row: ' . $ticketGroupObj->Row . '</td></tr><tr><td>';
	
	$returnString .= 'Price: $' . $ticketGroupObj->ActualPrice . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'Quantity: <select id="TGID_button_' . $ticketGroupObj->ID . '_select">' . getSplits($ticketGroupObj->ValidSplits->int) . '</select></td>';

	$returnString .= '<td class="tix_col2"><div id="TGID_button_' . $ticketGroupObj->ID . '" class="buyTixButton" eventID="' . $ticketGroupObj->EventID . '" TGID="' . $ticketGroupObj->ID . '" prix="' . urlencode($ticketGroupObj->ActualPrice) . '"><a href="javascript:void(0);" onclick="goToCheckout(this);">Buy these tickets</a></div>';
	
	$returnString .= '</tr></table>';
	
	
	$returnString .= '<div class="tix_notes">Notes: ' . $ticketGroupObj->Notes . '</div></div>';
	
	return $returnString;
}

function ticketsResultTableCustom($ticketGroupObj) {
	
	$returnString = '<div class="tg_container"><table cellspacing="0" cellpadding="0" border="0" class="ticket_group" width="100%"><tr><td class="tix_col1">';
	
	$returnString .= 'Section: ' . $ticketGroupObj->Section . '</td><td class="tix_col2">Row: ' . $ticketGroupObj->Row . '</td></tr><tr><td>';
	
	$returnString .= 'Price: $' . $ticketGroupObj->ActualPrice . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'Quantity: <select id="TGID_button_' . $ticketGroupObj->ID . '_select">' . getSplits($ticketGroupObj->ValidSplits->int) . '</select></td>';

	$returnString .= '<td class="tix_col2"><div id="TGID_button_' . $ticketGroupObj->ID . '" class="buyTixButton" eventID="' . $ticketGroupObj->EventID . '" TGID="' . $ticketGroupObj->ID . '" prix="' . urlencode($ticketGroupObj->ActualPrice) . '"><a href="javascript:void(0);" onclick="goToCheckout(this);">Buy these tickets</a></div>';
	
	$returnString .= '</tr></table>';
	
	
	$returnString .= '<div class="tix_notes">Notes: ' . $ticketGroupObj->Notes . '</div></div>';
	
	return $returnString;
}


function getSplits($validSplitsArray) {
	$returnString = '';
	if(is_array($validSplitsArray)) {
  	for($z=0; $z<count($validSplitsArray); $z++) {
  		$returnString .= '<option value="' . $validSplitsArray[$z] . '">' . $validSplitsArray[$z] . '</option>';
  	}
	} else {
		$returnString .= '<option value="' . $validSplitsArray . '">' . $validSplitsArray . '</option>';
	}
	return $returnString;
}

function getSplitsNew($validSplitsArray) {
	$returnString = '';
	if(is_array($validSplitsArray)) {
		$validSplitsArray = array_reverse($validSplitsArray);
  	for($z=0; $z<count($validSplitsArray); $z++) {
  		$returnString .= '<option value="' . $validSplitsArray[$z] . '">' . $validSplitsArray[$z] . '</option>';
  	}
	} else {
		$returnString .= '<option value="' . $validSplitsArray . '">' . $validSplitsArray . '</option>';
	}
	return $returnString;
}



function getTicketTypes($Alltickets){
	if(!empty($Alltickets)){
	$options = '';
	$arr=array();
	foreach($Alltickets as $ticket){
		
		if(!in_array($ticket->TicketGroupType,$arr)){
			$arr[]= $ticket->TicketGroupType;
		}	
	
	}
		foreach($arr as $ar){
			$options .= '<option value="'.$ar.'">'.$ar.'</option>';
		}

		return $arr;
	}else{

		return $arr;
	}
}






function venueResultTable($venueObj, $vConfID) {

	$resultString = '<table cellspacing="0" cellpadding="0" border="0" class="venueInfoTable">';
	$streetSection = $venueObj->Street2 ? $venueObj->Street1 . '<br/>' . $venueObj->Street2 . '<br/>' : $venueObj->Street1 . '<br/>';
	$address = $streetSection . $venueObj->City . ', ' . $venueObj->StateProvince . ' ' . $venueObj->ZipCode;
	
	
	if($venueObj->NumberOfConfigurations) { // get venue map according to the venue config id
	
		$resultString .= '<tr><td><div>Name: ' . $venueObj->Name . '<br/>Website: ' . $venueObj->URL . '<br/>Address:  ' . $address . '</div></td></tr><tr>';
		$resultString .= '<td><img src="http://www.indux.com/map/' . getVenueMap($venueObj->ID, $vConfID) . '" /></td></tr>';
	
	} else { // no vconf id means no venue map

  	$resultString .= '<tr><td><div>Name: ' . $venueObj->Name . '<br/>Website: ' . $venueObj->URL . '<br/>Address:  ' . $address . '</div></td></tr><tr>';
		$resultString .= '<td>No map available for this venue</td></tr>';
	}
	return $resultString . '</table>';

}



?>



