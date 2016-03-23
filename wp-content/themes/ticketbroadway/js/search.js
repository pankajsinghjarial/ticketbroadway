$('#previousPage').hide();
var limitAct = 0;

function showDivFilt(classDiv){
	if($('#showFilters').html() == ' + '){
		$('#showFilters').html(' - ');
	}else{
		$('#showFilters').html(' + ');
	}
}

function filter(filt, time){
	$('#allResult').html('');
	$('#loadingmessage').show();
	var month = ['allDates', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
	var city = ['allCities', 'chicago', 'boston', 'new-york', 'denver', 'dallas'];
	
	switch(time){
		case 'month':
			$.each(month, function(index, value){
				if(value == filt){
					$('#'+value).attr('class', 'selected')
				}else{
					$('#'+value).attr('class', '');
				}
			});
			break;
		case 'city':
			$.each(city, function(index, value){
				if(value == filt){
					$('#'+value).attr('class', 'selected')
				}else{
					$('#'+value).attr('class', '');
				}
			});
			break;
	}	
	
	applyFilter();
}

function applyFilter(){
	var selected = $('.selected');
	var monthSelected = $(selected[0]).attr('id');
	var citySelected = $(selected[1]).attr('id');
	
	if(monthSelected == 'allDates'){
		monthSelected = 'null';
	}else{
		monthSelected = getMonthFromString(monthSelected);
	}
	
	if(citySelected == 'allCities'){
		citySelected = 'null';
	}
	
	if(typeof categoryId == 'undefined'){
		categoryId = 'null';
	}
	
	if(typeof nameShowVal == 'undefined'){
		nameShowVal = 'null';
	}
	$.ajax({
		method: "POST",
		url: "/wp-content/themes/ticketbroadway/webservice/ws-search-show.php",
		data: {city : citySelected, date: monthSelected, nameshow: nameShowVal, cateId: categoryId, limit: limitAct},
		success: function(html) {
			$('#loadingmessage').hide();
			result = $.parseJSON(html);
			if(result.length == 0){
				$('#allResult').append('<div class="row rowResult"><div class="col-md-12 col-xs-12"><p style="    margin-top: 10px;">No show for this search</p></div></div>');
			}
			if(result.length > 1800){
					$('#pagiNumber').show();
				}
			showResult(result);
		}
	});
}
	
function showResult(tab){
	$.each(tab, function(index, value){
		$('#allResult').append('<div class="row rowResult"><div class="col-md-2 col-xs-4"><div class="dayDate"><p>'+value.dateD+'</p></div><div class="restDate"><p><b>'+value.dateF+'</b></p><p>'+value.dateH+'</p></div></div><a href="/ticket-result/?eventID='+ value.idApi +'"><div class="col-md-7 col-xs-8"><p class="titleResult">'+value.postName+'</p><p style="font-weight: 100;">'+value.theaterName+'</p><p style="    font-weight: 100;">'+value.loca+'</p></a><a href="/ticket-result/?eventID='+ value.idApi +'"><img src="/wp-content/themes/ticketbroadway/images/button-front.png" class="img-responsive searchBuyNowRes" alt="Buy Now"></a></div><div class="col-md-3 col-xs-0"><a href="/ticket-result/?eventID='+ value.idApi +'"><img src="/wp-content/themes/ticketbroadway/images/button-front.png" style="margin-top: 20px; float: right;" class="img-responsive" alt="Buy Now"></a></div></div>');
	});
}

$('#allDates, #january, #february, #march, #april, #may, #june, #july, #august, #september, #october, #november, #december').click(function (){
	filter($(this).attr('id'), 'month');
	$('#filtDateRes').html('Showing event for <span class="red">'+$(this).attr('id')+'</span>');
});

$('#allCities, #chicago, #boston, #new-york, #denver, #dallas').click(function (){
	filter($(this).attr('id'), 'city');
	$('#filtCityRes').html('Happening near <span class="red">'+$(this).attr('id')+'</span>');
});

$('.headFilter').click(function (){
	if($('.filters').css('display') == 'none'){
		$('.filters').slideDown('slow');
	}else{
		$('.filters').slideUp('slow');
	}
});

function getMonthFromString(mon){
	var tDate = new Date(Date.parse(mon +" 1, 2016")).getTime();
	return tDate/1000;
}

$('#pagiNumber').click(function(){
	$('#allResult').animate({
		"maxHeight": "+=1060px"
	  }, 1000, function() {
		
	});
});

$(window).scroll(function() {
   var hT = $('#pagiNumber').offset().top,
       hH = $('#pagiNumber').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
   if (wS > (hT+hH-wH)){
		$('#allResult').animate({
			"maxHeight": "+=1060px"
		}, 1000, function() {
		
		});
   }
});
