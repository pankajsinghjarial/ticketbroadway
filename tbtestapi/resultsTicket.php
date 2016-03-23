<?php
ini_set('display_errors',1);
require_once('genericLib.php');
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
$parameters = array();
$parameters['websiteConfigID']=20732;
$parameters['numberOfRecords']='';
$parameters['eventID']=$_REQUEST['eventID'];
echo '<h2>Ticket : baseball </h2>';
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript">
            function goToCheckout(e){
                var eventid = $(e).parent().attr('eventid');
                var tgid = $(e).parent().attr('tgid');
                var prix = $(e).parent().attr('prix');
                var treq = $('#TGID_button_'+tgid+'_select').val();
                location.href="https://tickettransaction2.com/Checkout.aspx?brokerid=8388&sitenumber=0&tgid="+tgid+"&evtid="+eventid+"&price="+prix+"&treq=1&SessionId=asdRR";
            }
        </script>
    </head>
<div style="float:left;width:50%;">
<?php
    echo getTickets($parameters);
?>
</div>
<div style="float:left;width:50%;">
<img src ="<?php echo 'http://seatics.tickettransaction.com/'.getVenueMap($_REQUEST['venueID'],$_REQUEST['venueConfID']);?>" />
</div>
</html>
