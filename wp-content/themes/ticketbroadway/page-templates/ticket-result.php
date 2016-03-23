<?php
/**
 * Template Name: Ticket Result Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('map');

require_once('genericLib.php');
$parameters = array();
$parameters['websiteConfigID']=20732;
//$parameters['websiteConfigID']=20777;
$parameters['numberOfRecords']='';
$parameters['orderByClause'] = 'ActualPrice ASC';
$parameters['eventID']=$_REQUEST['eventID'];
$parametersEventID['eventID']=$_REQUEST['eventID'];
//echo '<h2>Ticket : baseball </h2>';
//print_r($_GET);die;
$Alltickets =  getTicketsCustom3($parameters);

//echo "<pre>";print_r($Alltickets); echo "</pre>";
if(!$Alltickets){

	echo "No Tickets are Available for this event";die;

}
$thisEvent = getEventsSingleCustom($parametersEventID);

$eventName = $thisEvent->GetEventsResult->Event->Name;
$eventventue = $thisEvent->GetEventsResult->Event->Venue.' at '.$thisEvent->GetEventsResult->Event->City.', '.$thisEvent->GetEventsResult->Event->StateProvince;

$exploded = explode(' ',$thisEvent->GetEventsResult->Event->DisplayDate);
$timeofEvent = $exploded[1];
$EventDate = $exploded[0];
$date = DateTime::createFromFormat("m/d/Y", $EventDate);
 $dayOFDAte = $date->format("D");
$DateAs = $date->format("M d, Y");


$paramLowerPrice['orderByClause'] = 'ActualPrice ASC';
$paramLowerPrice['numberOfRecords']= 1;
$paramLowerPrice['websiteConfigID'] = 20732;
$paramLowerPrice['eventID']=$_REQUEST['eventID'];

$LowerPriceTicket =  getTicketsCustom($paramLowerPrice);
$paramHigherPrice['orderByClause'] = 'ActualPrice DESC';
$paramHigherPrice['numberOfRecords']= 1;
$paramHigherPrice['websiteConfigID'] = 20732;
$paramHigherPrice['eventID']=$_REQUEST['eventID'];

$HigherPriceTicket =  getTicketsCustom($paramHigherPrice);

$lowestPrice = ceil($LowerPriceTicket->ActualPrice);
$highestPrice = ceil($HigherPriceTicket->ActualPrice);
//print_r($lowestPrice);
//print_r($highestPrice);  die;

//echo "<pre>";print_r($Alltickets); //die;
   //echo "</pre>";
//echo getTickets2($parameters);
$optTicketTypes = getTicketTypes($Alltickets);
//echo "<pre>";
//print_r($Alltickets);
//echo "<pre>";
//print_r(json_encode($Alltickets));

//die;
//var tt = new ticket(1,1,2,3,4);
//alert(tt.price);


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
var tickets = JSON.parse('<?php echo json_encode($Alltickets);?>');
var lowPrice = "<?php echo $lowestPrice; ?>";
var highPrice = '<?php echo $highestPrice; ?>';
var brokerID = '<?php echo BROKERID; ?>';
var siteNumber = '<?php echo SITENUMBER; ?>';
var eventID = '<?php echo $_REQUEST['eventID']; ?>';

function makeSessionId() {
	var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz'; 
	var sid_length = 5;
	var sid = '';
	for (var i=0; i<sid_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		sid += chars.substring(rnum,rnum+1);
	}
	return sid;
}

var uniqueSessionID = makeSessionId();
var userid = "<?php echo $userid; ?>";
var username = "<?php echo $display_name; ?>";
var useremail= "<?php echo $user_email; ?>";
var billing_address_1 = "<?php echo $billing_address_1; ?>";
var billing_address_2 = "<?php echo $billing_address_2; ?>";
var billing_city = "<?php echo $billing_city; ?>";
var billing_state = "<?php echo $billing_state; ?>";
var billing_country = "<?php echo $billing_country; ?>";
var billing_postcode = "<?php echo $billing_postcode; ?>";
var billing_phone = "<?php echo $billing_phone; ?>";
var userinformation = '&uid='+userid+'&una='+username+'&uem='+useremail+'&ba1='+billing_address_1+'&ba2='+billing_address_2+'&bci='+billing_city+'&bsa='+billing_state+'&bco='+billing_country+'&bpo='+billing_postcode+'&bph='+billing_phone;
function ticket(tixID,tixQuantityArr, price, section, notes, row, type, status, checkoutUrl,isEticket) {
			this.ID = tixID; 
			this.tixQuantityArr = tixQuantityArr;
			this.price = price;
			this.section = section;
			this.notes = notes;
			this.row = row;
			this.type = type;
			this.status = true;
			this.tixQuantity = tixQuantityArr[tixQuantityArr.length - 1];
			this.checkoutUrl = checkoutUrl;
			this.isEticket = isEticket;
			this.ChangeStatus = function(tixQuant, lowerPrice, higherPrice, Eticket){
									var flagTix = true;
									var flagPrice = true;
									var flagEticket = Eticket;
										//alert(tixQuant);
									if(tixQuant!=''){
									  if(typeof tixQuantityArr == 'object' ){
									  var exists = tixQuantityArr.indexOf(Number(tixQuant));
										this.tixQuantity = tixQuantityArr[exists];    
									}else{
										if(tixQuantityArr == tixQuant){
											this.tixQuantity = tixQuant;  											
											exists = 1; 										
										}else {
										    exists = -1;
										}
									  }
									}else{
										exists = 1; 		
										this.tixQuantity = tixQuantityArr[tixQuantityArr.length - 1];//
									}
									  if(exists<0){
										flagTix = false;
									  }else{
										flagTix = true;
										//this.tixQuantity = tixQuantityArr[exists];  
									  }
									  var tixPrice = this.price;
									  if(tixPrice >=lowerPrice && tixPrice <=higherPrice)
									  {
										  flagPrice = true; 
									  }else{
										   flagPrice = false; 
									  }
									  
									if(true == Eticket)									 
									{
										 if(flagTix && flagPrice && this.isEticket){
											this.status = true;
																					  
										  	
										   }else{
											this.status = false;
										
										  }
									
									}else{
										 if(flagTix && flagPrice ){
											this.status = true;
																					  
										  	
										   }else{
											this.status = false;
										
										  }
									}
 
									 


								this.checkoutUrl = 'https://tickettransaction2.com/mobile2/Checkout.aspx?'+'brokerid='+brokerID+'&sitenumber='+siteNumber+'&tgid='+this.ID+'&treq='+this.tixQuantity+'&evtID='+eventID+'&price='+this.price+'&SessionID='+uniqueSessionID+userinformation;	
								
								} 
		}

var ticketsarray=[];
for(i=0;i<tickets.length;i++){
		var tixID = tickets[i].ID;
		var price = tickets[i].ActualPrice;
		var section = tickets[i].Section;
		var row = tickets[i].Row;
		var notes = tickets[i].Notes;
		var type = tickets[i].TicketGroupType;
		var vs = tickets[i].ValidSplits;
		var arrvs = Object.keys(vs).map(function(k) { return vs[k] });
		var tixQuantityArr =arrvs[0];
		var deliveryOptions = tickets[i].DeliveryOptions;
		//alert(typeof deliveryOptions);
		if(deliveryOptions.indexOf("EM") > -1){
			var isEticket = true;
		}else if(deliveryOptions.indexOf('ID') > -1){
			var isEticket = true;
		}else{
			var isEticket = false;
		}
		
		if(typeof tixQuantityArr == 'object' ){
			treq = tixQuantityArr[tixQuantityArr.length -1];// 
		}else{
			treq = tixQuantityArr;
		}
		var checkoutUrl = 'https://tickettransaction2.com/mobile2/Checkout.aspx?'+'brokerid='+brokerID+'&sitenumber='+siteNumber+'&tgid='+tixID+'&treq='+treq+'&evtID='+eventID+'&price='+price+'&SessionID='+uniqueSessionID;
		newticket = new ticket(tixID,tixQuantityArr, price, section, notes, row, type, status, checkoutUrl, isEticket);
		ticketsarray[ticketsarray.length] = newticket; 
		
}

</script>

   <section class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mobile-full-width border-bottom ">
	    <div class="viewondesk">
            <div class="col-md-1 no-padding">
              <h1 class="day"><?php echo $dayOFDAte; ?></h1>
              <div class="col-md-12 no-padding date-border">
                <h2 class="date"><?php echo $DateAs; ?></h2>
                <h3 class="time"><?php echo $timeofEvent; ?></h3>
              </div>
            </div>

            
            <div class="col-md-6">
              <h1 class="choose-seat-heading"><?php echo $eventName; ?></h1>
              <p class="para"><?php echo $eventventue; ?></p>
            </div>
            </div>
            <div class="viewonmob">
		<div class="col-md-1 no-padding mob-container">
		      <h1 class="day"><?php echo $dayOFDAte; ?>, <?php echo $DateAs; ?> at <?php echo $timeofEvent; ?></h1>
		      <div class="col-md-12 no-padding date-border">
		        <h2 class="date"><?php echo $eventName; ?></h2>
		        <h3 class="time"><?php echo $eventventue; ?></h3>
		      </div>
		    </div>
            </div>
            <div class="col-md-5 no-padding choose-top-right">
              <h1>200% Worry-Free Guarantee</h1>
              <ul class="list-unstyled">
                 
                <li><img src="<?php echo get_template_directory_uri(); ?>/images/star.png"> <h2> We are a resale marketplace, not the ticket seller.</h2></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/images/star.png">  <h2>Prices are set by third-party sellers and may be above or below face value.</h2></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/images/star.png">  <h2>Your seats are together unless otherwise noted.</h2></li>
              </ul>
            </div>
          </div> 


          <div class="col-md-12 col-xs-12 no-padding hide-mob">
            <div class="col-md-2 col-xs-12 choose-right-border">
              <select class="form-control" name='TicketQuantity' id="ticketQuantity">
                <option value="">Any Quantity</option>
                <?php for($i=1;$i<=5;$i++){ ?>
                	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php } ?>
			<option value="6">6+</option>
              </select>
            </div>
            <div class="col-md-4 col-xs-12 choose-right-border">
              <div class="col-md-12 col-xs-12 all-range-sec no-padding">
		    <div class="col-md-3 col-xs-12 no-padding">
		      <h1 class="range-price"> Price Range</h1>
		    </div>
		    <div class="col-md-1 col-xs-12 no-padding">
		      <output id="range">$<span id="RangeLower"><?php echo $lowestPrice; ?></span></output>
		    </div>
		    <div class="col-md-7 col-xs-12 no-padding">
		      <div class="slider-range">
		       </div>
		       <!--<div class="range-sxn">
		              <div class="form-group">
		                <input class="amount" type="text" readonly="">
		              </div>
		            </div>-->
		    </div>
		  <div class="col-md-1 col-xs-12 no-padding">
		      <output id="range">$<span id="RangeHigher"><?php echo $highestPrice; ?></span></output>
		    </div>
		  </div>
            </div>

             

            <div class="col-md-2 col-xs-12 ticket-only choose-right-border">
              <div class="checkbox">
                <label>
                  E-Tickets Only<input type="checkbox" id="eticketsCheckbox" >
                </label>
              </div>
            </div>
            <!--div class="col-md-2 col-xs-12 choose-tickte choose-right-border">
              <select class="form-control">
                <?php /* $optTicketTypes;

		foreach($optTicketTypes as $ar){
			$options .= '<option value="'.$ar.'">'.$ar.'</option>';
		}
		echo $options; */
 ?>			<option value="">Event Tickets</option>
              </select>
            </div-->
            <div class="col-md-2 col-xs-12 choose-filters ">
              <button class="btn btn-default" id="resetButton">Reset Filters</button>
            </div>

          </div>
        </div>
      </div>
    </section>


    <section class="map-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">

            <!--div class="col-md-7">
              
            </div-->
	    
	    <!--map-zoom-->
		<div class="col-md-8"> <!--<img src="images/map-img.png" class="img-responsive"> -->
		  
		  <div class="wrapper">
		    
		    <div id="viewer2" class="viewer"></div>
		  </div>
		</div>
		
	    <!-- map-zoom--> 

             <div class="col-md-6 col-md-offset-6 legenda-btn hidden-lg hidden-md text-right">
              <!--button class="btn btn-default"> Show map Legenda <i class="fa fa-angle-up"></i></button-->
            </div>

            <div class="col-md-4 col-xs-12 chose-map-right-content no-padding">
              <div class="col-md-12 col-xs-12 choose-tick-sec no-padding quantity-section">
                <div class="col-md-4  col-xs-4 no-padding"  id="quantity">
                  <div class="col-md-12 col-xs-12 choose-right-border no-padding">
                    <div class="col-md-10 col-xs-10">
                      <h1 class="choose-right-any"><span>Quantity</span></h1>
                      <h2 class="choose-right-any" id="SelectedQuantityFilter">Any Quantity</h2>
                    </div>
                    <div class=" ">
                      <i class="fa fa-angle-down"></i> 
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xs-4 no-padding" id="price-range">
                  <div class="col-md-12 col-xs-12 choose-right-border no-padding">
                    <div class="col-md-10 col-xs-10">
                      <h1 class="choose-right-any"><span>Price Range</span></h1>
                      <h2 class="choose-right-any">$<pricefilterone id="SelectedPriceFilterLower"><?php echo $lowestPrice; ?></pricefilterone>-$<pricefiltertwo id="SelectedPriceFilterHigher"><?php echo $highestPrice; ?></pricefiltertwo></h2>
                    </div>
                    <div class=" ">
                      <i class="fa fa-angle-down"></i> 
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xs-4 no-padding" id="ticket-type">
                  <div class="col-md-12 col-xs-12 no-padding">
                    <div class="col-md-10 col-xs-10">
                      <h1 class="choose-right-any"><span>Ticket Type</span></h1>
                      <h2 class="choose-right-any" id="ChooseTypeTicket">Any Ticket</h2>
                    </div>
                    <div class=" ">
                      <i class="fa fa-angle-down"></i> 
                    </div>
                  </div>
                </div>

		 <!-- select-qty-->
            <div class="select-qty displayed">
              <div data-toggle="buttons" class="filters-qty-filter-cnt">
                <label class="btn btn-primary active">
                  <input type="radio" checked="" value="" autocomplete="off" valhtml="Any Quantity" id="option1" name="options" class="qty-filter-opt-js">
                  Any</label>
                <label class="btn btn-primary">
                  <input type="radio" autocomplete="off" value="1" valhtml="1" id="option2" name="options" class="qty-filter-opt-js">
                  1</label>
                <label class="btn btn-primary">
                  <input type="radio" autocomplete="off" value="2" valhtml="2" id="option3" name="options" class="qty-filter-opt-js">
                  2</label>
                <label class="btn btn-primary">
                  <input type="radio" autocomplete="off" value="3" valhtml="3" id="Radio1" name="options" class="qty-filter-opt-js">
                  3</label>
                <label class="btn btn-primary">
                  <input type="radio" autocomplete="off" value="4" valhtml="4" id="Radio2" name="options" class="qty-filter-opt-js">
                  4</label>
                <label class="btn btn-primary">
                  <input type="radio" autocomplete="off" value="5" valhtml="5" id="Radio3" name="options" class="qty-filter-opt-js">
                  5</label>
                <label class="btn btn-primary active-label">
                  <input type="radio" autocomplete="off" value="6" valhtml="6+" id="Radio4" name="options" class="qty-filter-opt-js">
                  6+</label>
              </div>
            </div>
            <!-- select-qty--> 
            <!-- priceRange-->
            <div class="priceRange displayed">
              <div class="col-md-1 col-xs-12 no-padding">
			<output id="range">$<span id="RangeLowerSecond"><?php echo $lowestPrice; ?></span></output>
              </div>
              <div class="col-md-7 col-xs-12 no-padding">
                <div class="slider-range"> </div>
			
              </div>
              <div class="col-md-1 col-xs-12 no-padding">
                <output id="range">$<span id="RangeHigherSecond"><?php echo $highestPrice; ?></span></output>
              </div>
            </div>
            <!-- priceRange--> 
            
            <!-- ticket-type-->
            <div class="ticket-type displayed">
              <div  style="height: 36px;" class="filter-tg-type filters-dropdown drop-shadow" id="type-hidden-filter">
                <label class="btn btn-primary ticket_type_label active">
                  <input type="checkbox" value="false" autocomplete="off" name="options">
                  <span class="vertical-align-middle filter-tg-type-text">Any</span> </label>
                <label class="btn btn-primary ticket_type_label ">
                  <input type="checkbox" value="true" autocomplete="off" name="options">
                  <span class="vertical-align-middle filter-tg-type-text">E-Tickets</span> </label>
                <!--label class="btn btn-primary ticket_type_label filter-tg-type-cell">
                  <input type="checkbox" value="FlexTickets" autocomplete="off" name="options">
                  <span class="vertical-align-middle filter-tg-type-text">FLeX Tickets</span> </label-->
              </div>
            </div>
            <!-- ticket-type-->



              </div>

              <div class="col-md-12 col-xs-12 no-padding text-center ">
                <p class="low-to-high" id="1">Sort by Price - <span><sortize id="sortizeid">Low to High</sortize> <i class="fa fa-angle-down"></i></span></p>
              </div>

		 <!--accordion-->
	
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php for($y=0; $y<count($Alltickets); $y++) {  
			$DeliveryOptions =  $Alltickets[$y]->DeliveryOptions;
			$etickets = substr_count($DeliveryOptions, 'EM');
			$InstantDownloadetickets = substr_count($DeliveryOptions, 'ID');		
			if($etickets){
				$eticketsClass = 'ssc_fltrDlvHintEmIcon';
				$instant = '';
				$tooltip='Tickets marked with this symbol are e-tickets. They will be made available for you to download and print, usually within one (1) business day of when you place your order.';
			}else if($InstantDownloadetickets){
				$eticketsClass = 'ssc_fltrDlvHintEmIcon';
				$instant = 'Instant';
				$tooltip="E-tickets marked as 'instant' will be available for you to download and print within minutes of placing your order.";
			}else {
				$eticketsClass = '';
				$instant = '';
				$tooltip='';
			}
			


		?>
            <div id="<?php echo $Alltickets[$y]->ID; ?>" class="meselectsparent col-md-12 col-xs-12 right-content-1st-box right-content-box no-padding panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne<?php echo $Alltickets[$y]->ID; ?>"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $Alltickets[$y]->ID; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $Alltickets[$y]->ID; ?>">
                <div class="col-md-9 col-xs-8">
                  <h5><?php echo $Alltickets[$y]->Section; ?></h5>
			<div class="ssc_fltrDlvHintSymbol pull-right"><div title="<?php echo $tooltip; ?>" class=" <?php echo $eticketsClass; ?>"></div><div class="ssc_fltrDlvHintIdLabel"><?php echo $instant;?></div></div>
                  <h5><span><?php echo $Alltickets[$y]->Row.' - '.$Alltickets[$y]->TicketGroupType; ?></span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5><?php echo '$'.(int)$Alltickets[$y]->ActualPrice; ?>/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
                </a> </div>
              <div id="collapseOne<?php echo $Alltickets[$y]->ID; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $Alltickets[$y]->ID; ?>">
                <div class="panel-body">
                  <div class="panel-contain"> <b>Note:</b> <br>
                    <?php echo $Alltickets[$y]->Notes; ?>
                    <div class="select-sxn"> <span class="">Quantity</span>
                    <select id="TGID_button_<?php echo $Alltickets[$y]->ID;?>_select" class="TGIDSELECT"><?php echo getSplitsNew($Alltickets[$y]->ValidSplits->int); ?></select>
                    
		    </div>
		   <?php
	$validSplitsArray = $Alltickets[$y]->ValidSplits->int; 
	if(is_array($validSplitsArray)) {
		$ct = 0;
		$ct = count($validSplitsArray) -1;
		$treq = $validSplitsArray[$ct];
	}else{

		$treq = $validSplitsArray;
	}	
	 $checkoutUrl = "https://tickettransaction2.com/mobile2/Checkout.aspx?brokerid=".BROKERID."&sitenumber=".SITENUMBER."&tgid=".$Alltickets[$y]->ID."&treq=".$treq."&evtID=".$_REQUEST['eventID']."&price=".$Alltickets[$y]->ActualPrice."&SessionId=".$RandonSessionId.$userinformation;  ?>
                    <a id="TGID_button_<?php echo $Alltickets[$y]->ID;?>_select_url" href="<?php echo $checkoutUrl; ?>"><button  class="green-button" eventID="<?php echo $Alltickets[$y]->EventID;?>" TGID="<?php echo $Alltickets[$y]->ID;?>" >Go to Secure Checkout</button></a>
                  </div>
                </div>
              </div>
            </div>
             <?php } ?>
            <!--accordion--> 
          </div>
	     <?php /*for($y=0; $y<count($Alltickets); $y++) {  ?>
              <div class="col-md-12 col-xs-12 right-content-1st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5><?php echo $Alltickets[$y]->Section.' '.$Alltickets[$y]->Notes; ?></h5>
                  <h5><span><?php echo $Alltickets[$y]->Row.' - '.$Alltickets[$y]->TicketGroupType; ?></span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5 class="h5"><?php echo '$'.$Alltickets[$y]->ActualPrice; ?>/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
		  <select id="TGID_button_<?php echo $Alltickets[$y]->ID;?>_select"><?php echo getSplits($Alltickets[$y]->ValidSplits->int); ?></select>
                  <div id="TGID_button_<?php echo $Alltickets[$y]->ID;?>" class="buyTixButton" eventID="<?php echo $Alltickets[$y]->EventID;?>" TGID="<?php echo $Alltickets[$y]->ID;?>" prix="<?php echo $Alltickets[$y]->ActualPrice;?>"><a href="javascript:void(0);" onclick="goToCheckout(this);">Buy</a></div>
		</div>
              </div>
		 <?php } */?>
              <?php /*<div class="col-md-12 col-xs-12 right-content-2st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone C</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$505/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 right-content-3st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone B</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$583/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 right-content-4st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone A</h5>
                  <h6><span>1-10 FLeX Tickets</span></h6>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$661/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 right-content-5st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone Premium</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$782/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 choose-pass text-center">
                <p>Parking Passes(Not valid for entry to event)</p>
              </div>

              <div class="col-md-12 col-xs-12 right-content-6st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>249-253 W.43rd St.</h5>
                  <h5><span>Row PARKING ONLY - 0.2 mi away.1-27span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$42/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 choose-pass text-center">
                <p>Other offers</p>
              </div>


              <div class="col-md-12 col-xs-12 right-content-6st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>MEZZANINE</h5>
                  <h5><span>Raw A-L . 1-8 E-Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$479/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>

              <div class="col-md-12 col-xs-12 right-content-6st-box right-content-box no-padding">
                <div class="col-md-9 col-xs-8">
                  <h5>ORCHESTRA</h5>
                  <h5><span>Row A-L. 1-8 E-Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$598/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
              </div>
	     */	?>
            </div>

            <div class="col-md-6 col-md-offset-6 legenda-btn hidden-xs hidden-sm">
             
            </div>

          </div>
        </div>
      </div>
    </section>
<script type="text/javascript">


$(document).ready(function(){

var urlImageMap = '<?php echo $thisEvent->GetEventsResult->Event->MapURL; ?>';
		   $("#in").click(function(){ iv1.iviewer('zoom_by', 1); }); 
                   $("#out").click(function(){ iv1.iviewer('zoom_by', -1); }); 
                   $("#fit").click(function(){ iv1.iviewer('fit'); }); 
                   $("#orig").click(function(){ iv1.iviewer('set_zoom', 100); }); 
                   $("#update").click(function(){ iv1.iviewer('update_container_info'); });

                  var iv2 = $("#viewer2").iviewer(
                  {
                      src: urlImageMap
                  });

                  $("#chimg").click(function()
                  {
                    iv2.iviewer('loadImage', urlImageMap);
                    return false;
                  });



  $("#quantity").click(function(){
	  $(".displayed").slideUp();
	  if($(".select-qty").hasClass('on')){
	  		$(".select-qty").removeClass('on').slideUp("fast");	  					
		}
		else{
			$(".displayed").removeClass('on').slideUp();			
			$(".select-qty").addClass('on').slideDown("fast");
		}
  });
   $("#price-range").click(function(){
	    $(".displayed").slideUp();
	  if($(".priceRange").hasClass('on')){
	  		$(".priceRange").removeClass('on').slideUp("fast");	  					
		}
		else{
			$(".displayed").removeClass('on').slideUp();			
			$(".priceRange").addClass('on').slideDown("fast");
		}	  
	 
  });
  $("#ticket-type").click(function(){
	   
		if($(".ticket-type").hasClass('on')){
	  		$(".ticket-type").removeClass('on').slideUp("fast");	  					
		}
		else{
			$(".displayed").removeClass('on').slideUp();
			$(".ticket-type").addClass('on').slideDown("fast");
		}		  
	 
  });
 $(".select-qty label").click(function(){
	
	  $(".select-qty.displayed").slideUp();
	  $(".select-qty").removeClass('on');
	  var thevalselected = $(this).children('input').attr('value');
	 // alert($(this).children('input').attr('valhtml'));
		$("#ticketQuantity").val(thevalselected).change();
  }); 
 
 $(".ticket-type label").click(function(){
	
	$(".ticket-type.displayed").slideUp();
	$(".ticket-type").removeClass('on');
	$(".ticket-type label").removeClass('active');
	$(this).addClass('active');
	//	$("eticketsCheckbox").prop( "checked" )
	var thevaleticket = $(this).children('input').attr('value');
	if(thevaleticket == 'true'){	
		var al = true;
	}else{
		var al = false;
	}
	$( "#eticketsCheckbox" ).prop( "checked", al).change();
	
	
  });
	
	$( "#eticketsCheckbox" ).click(function(){

		$(".ticket-type label").removeClass('active');
		if($(this).is( ":checked" )==false){
			
			$(".ticket-type label:eq(0)").addClass('active');
			
		}else{
			
			$(".ticket-type label:eq(1)").addClass('active');
			
		}		
	
	});


});
</script>

<?php get_footer('map'); ?>
