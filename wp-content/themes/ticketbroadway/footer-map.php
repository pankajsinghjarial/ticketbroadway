

    <section class="copy-right">
      <div class="container">
        <div class="row">
          <div class="text-center">
            <p>&copy 2015 Tickets Broadway. All rights reserved</p>
          </div>
        </div>
      </div>
    </section>
     
     <script src='<?php echo get_template_directory_uri(); ?>/js/ticketmap/bootstrap.min.js'></script>
     <script src='<?php echo get_template_directory_uri(); ?>/js/ticketmap/nouislider.min.js'></script>
	
     <script src='<?php echo get_template_directory_uri(); ?>/js/ticketmap/jquery.mousewheel.min.js'></script>
     <script src='<?php echo get_template_directory_uri(); ?>/js/ticketmap/jquery.iviewer.js'></script>
     
<script type="text/javascript">


$(document).ready(function(){
		function showHide(tixQuant){
		
		for(m=0; m<ticketsarray.length;m++ ) {
			var tID = ticketsarray[m].ID;
			if(ticketsarray[m].status){
				$("#"+tID).show();
				$("#TGID_button_"+tID).attr('href',ticketsarray[m].checkoutUrl);
				if(tixQuant !=''){
					//$("#"+"TGID_button_"+tID+"_select")
					if($("#"+"TGID_button_"+tID+"_select option[value="+tixQuant+"]").length > 0){
						$("#"+"TGID_button_"+tID+"_select option[value="+tixQuant+"]").prop('selected', true);
						
					}				
				}		
			}else{
				$("#"+tID).hide();
			}
		}
	}
		lowPrice = parseInt(lowPrice);	
		highPrice = parseInt(highPrice);	
/*		
	var urlImageMap = '<?php ?>';
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
*/
	$( ".slider-range" ).slider({
	      range: true,
      		min: lowPrice,
      		max: highPrice,
      		values: [ lowPrice, highPrice ],
	      slide: function( event, ui ) {
		$( "#RangeLower" ).html( ui.values[ 0 ]);
		$( "#RangeHigher" ).html( ui.values[ 1 ]);

		$( "#RangeLowerSecond" ).html( ui.values[ 0 ]);
		$( "#RangeHigherSecond" ).html( ui.values[ 1 ]);	
	      },
	      stop: function( event, ui ) {
			
			$(".slider-range").slider("values" ,[ ui.values[0], ui.values[1]]);			
			var tixQuant = $("#ticketQuantity").val();
			var lo = $( this ).slider( "values", 0 );
			var hi = $( this ).slider( "values", 1 );
			//alert(lo); alert(hi);
			$( "#SelectedPriceFilterLower" ).html(lo);
			$( "#SelectedPriceFilterHigher" ).html(hi);
			var eticketState = $( "#eticketsCheckbox" ).is( ":checked" );			
			
			for(k=0; k<ticketsarray.length;k++ ) {
				ticketsarray[k].ChangeStatus(tixQuant, lo, hi, eticketState);
				  
			}
			showHide(tixQuant);
		}	
    	});
    	//$( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) + " - $" + $( ".slider-range" ).slider( "values", 1 ) );
	
	$.fn.reverseChildren = function() {
	  return this.each(function(){
		var $this = $(this);
		$this.children().each(function(){ $this.prepend(this) });
	  });
	};
	//
	$('.low-to-high').click(function(){
		id = $(this).attr('id');	
		$('#accordion').reverseChildren();
		if(id == 1){
		    $(this).attr('id',0);
		    $('#sortizeid').html('High to Low ');
		}else{
		    $(this).attr('id',1);
		    $('#sortizeid').html('Low to High ');
		}	
	});
	$("#ticketQuantity").change(function(){
		var tixQuant = $("#ticketQuantity").val();
		var i = $("#ticketQuantity option[value='"+tixQuant+"']").index();

		$(".select-qty label").removeClass('active');
		$(".select-qty label:eq("+i+")").addClass('active');
		$( "#SelectedQuantityFilter" ).html($("#ticketQuantity option:selected").text());		
		var lo = $( ".slider-range" ).slider( "values", 0 );
		var hi = $( ".slider-range" ).slider( "values", 1 );
		var eticketState = $( "#eticketsCheckbox" ).is( ":checked" );			
			
		//tixQuant, lowerPrice, higherPrice
		for(k=0; k<ticketsarray.length;k++ ) {
			ticketsarray[k].ChangeStatus(tixQuant, lo, hi, eticketState);
			  
		}
		
		showHide(tixQuant);		
	});
	
	$("#resetButton").click(function(){
		$("#ticketQuantity option[value='']").prop('selected', true);
		$( "#SelectedQuantityFilter" ).html($("#ticketQuantity option:selected").text());
		$( ".slider-range" ).slider( "values", [ lowPrice, highPrice ] );
		$( "#SelectedPriceFilterLower" ).html(lowPrice);
		$( "#SelectedPriceFilterHigher" ).html(highPrice);
		$( "#RangeLower" ).html( lowPrice);
		$( "#RangeHigher" ).html(highPrice);
		$( "#eticketsCheckbox" ).prop( "checked", false);
		$("#ChooseTypeTicket").html('Any Ticket');			
		for(k=0; k<ticketsarray.length;k++ ) {
				ticketsarray[k].ChangeStatus('', lowPrice, highPrice, false);
				  
			}
					showHide('');
	});
	
		$(".TGIDSELECT").change(function(){
			var selectedValue = $(this).val();
			var select_id = $(this).attr("id");
			var select_checkout_id = select_id+'_url';
			var idticket = $(this).parents('.meselectsparent').attr('id'); 
			idticket = Number(idticket);		
			for(n=0; n<ticketsarray.length;n++ ) {
						
				if(idticket == ticketsarray[n].ID){
					
					ticketsarray[n].ChangeStatus(selectedValue, lowPrice, highPrice);
					$("#"+select_checkout_id).attr('href', ticketsarray[n].checkoutUrl);					
					break;				  
				}
			}


		});

		$( "#eticketsCheckbox" ).change(function(){
		
			var lo = $( ".slider-range" ).slider( "values", 0 );
			var hi = $( ".slider-range" ).slider( "values", 1 );
			var tixQuant = $("#ticketQuantity").val();
			var eticketState = $( "#eticketsCheckbox" ).is( ":checked" );
			if(eticketState){
			    $("#ChooseTypeTicket").html('E-Tickets');
			}else{
			    	$("#ChooseTypeTicket").html('Any Ticket');
			}

			for(k=0; k<ticketsarray.length;k++ ) {
				ticketsarray[k].ChangeStatus(tixQuant, lo, hi, eticketState);
			  
			}
			showHide(tixQuant);
		});


	});

</script>
	

<?php wp_footer(); 
 /* foreach($optTicketTypes as $ar){
						echo $ar; break;
					}*/

?>
</body>
</html>
