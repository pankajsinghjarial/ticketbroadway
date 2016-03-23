var month = ['allDates', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
var day = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

var limitAct = 0;
var currentPage = 1;

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
	$('#pagiNumber').hide();
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
		url: "/wp-content/themes/ticketbroadway/webservice/ws-search-show-2.php",
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
	var i=0;
	$.each(tab, function(index, value){
		if(i == 0){
			var date = new Date(value.dateF);
			var monthDate = month[date.getMonth()+1];
			var dayDate = day[date.getDay()];
			var printDate = monthDate.substr(0, 3) + ' ' + date.getDate() + ', '+ date.getFullYear();
			var printDateN = monthDate + ' ' + date.getDate() + ', '+ date.getFullYear();
		}else{
			var date = new Date(tab[index-1].dateF);
			var monthDate = month[date.getMonth()+1];
			
			var dayDate = day[date.getDay()];
			var printDate = monthDate.substr(0, 3) + ' ' + date.getDate() + ', '+ date.getFullYear();
			var printDateN = monthDate + ' ' + date.getDate() + ', '+ date.getFullYear();
		}
		
		
		if(i == 0){
			$('#allResult').append('<div class="row rowResult"><div class="col-md-2 col-xs-4 '+value.postID+'-inv"><div class="dayDate"><p>'+value.dateD+'</p></div><div class="restDate"><p><b>'+capitalizeFirstLetter(printDate)+'</b></p><p class="'+value.postID+'-inv">'+value.dateH+'</p></div><div class="showMoreRes"><p class="seeMoreDateRes red" onclick="showMorePlus(\''+value.postID+'\')">See more dates at this theatre</p><p id="plus-'+value.postID+'" class="plusPlusRes red plus-'+value.postID+'">+</p><a href="/ticket-result/?eventID='+ value.idApi +'"><img src="/wp-content/themes/ticketbroadway/images/button-front.png" class="img-responsive searchBuyNowRes" alt="Buy Now"></a></div></div><a href="/shows/'+ value.postID +'"><div class="col-md-7 col-xs-8"><p class="titleResult '+value.postID+'-inv">'+value.postName+'</p><p class="'+value.postID+'-inv" style="font-weight: 100;">'+value.theaterName+'</p></a><p class="seeMoreDate red " onclick="showMorePlus(\''+value.postID+'\')">See more dates at this theatre</p><p id="plus-'+value.postID+'" onclick="showMorePlus(\''+value.postID+'\')" class="plusPlus red plus-'+value.postID+'">+</p></div><div class="col-md-3 col-xs-0 '+value.postID+'-inv"><a href="/ticket-result/?eventID='+ value.idApi +'"><img src="/wp-content/themes/ticketbroadway/images/button-front.png" style="margin-top: 20px; float: right;" class="img-responsive" alt="Buy Now"></a></div></div>');
			if(tab[index+1].postID != value.postID){
				$('#allResult').append('<div id="resultDate-'+value.postID+'" class="row resultBelow dateBelow '+value.postID+'"></div>');
				$('#resultDate-'+value.postID).append('<div class="row"><div class="notifyMe"><p class="noShow">NO MORE SHOWS CURRENTLY SCHEDULED</p><p>Get Notified of The Next Performance Dates</p><button onclick="notifPop('+value.idShow+')" id="notifPop">Notify Me</button></div></div>');
				i=0;
			}else{
				i++;
			}
		}else if(i == 1){
			$('#allResult').append('<div class="row resultBelow mainResultBelow '+value.postID+'"><div class="col-md-7 col-xs-6 theaterResult"><img src="/wp-content/themes/ticketbroadway/images/theaterNameLogo.png" alt="Theater Name"><div><p >THEATER:</p><p>'+value.theaterName+'</p></div></div><div class="col-md-5 col-xs-6 showResult"><img src="/wp-content/themes/ticketbroadway/images/showNameLogo.png" alt="Theater Name"><div><p>SHOW:</p><p>'+value.postName+'</p></div></div>');
			$('#allResult').append('<div id="resultDate-'+value.postID+'" class="row resultBelow dateBelow '+value.postID+'"></div>');
			$('#resultDate-'+value.postID).append('<div class="row"><div class="col-md-5 col-xs-8 dateDateBelow"><p class="dateD"><img src="/wp-content/themes/ticketbroadway/images/smallCalendarBlack.png" alt="Theater Name"></p><p class="dateFull">'+dayDate+'</p><p class="dateFullRes"><b>'+capitalizeFirstLetter(printDateN)+'</b> '+tab[index-1].dateH+'</p></div><div class="col-md-4 col-xs-0 dateMiddle"><b>'+capitalizeFirstLetter(printDateN)+'</b> '+tab[index-1].dateH+'</div><div class="col-md-3 col-xs-4"><a href="/ticket-result/?eventID='+ tab[index-1].idApi +'"><img src="/wp-content/themes/ticketbroadway/images/button-front.png" class="img-responsive btnBuySearch" alt="Buy Now"></a></div></div>');
			i++;
		}else{
			$('#resultDate-'+value.postID).append('<div class="row"><div class="col-md-5 col-xs-8 dateDateBelow"><p class="dateD"><img src="/wp-content/themes/ticketbroadway/images/smallCalendarBlack.png" alt="Theater Name"></p><p class="dateFull">'+dayDate+'</p><p class="dateFullRes"><b>'+capitalizeFirstLetter(printDateN)+'</b> '+tab[index-1].dateH+'</p></div><div class="col-md-4 col-xs-0 dateMiddle"><b>'+capitalizeFirstLetter(printDateN)+'</b> '+tab[index-1].dateH+'</div><div class="col-md-3 col-xs-4"><a href="/ticket-result/?eventID='+ tab[index-1].idApi +'"><img src="/wp-content/themes/ticketbroadway/images/button-front.png" class="img-responsive btnBuySearch" alt="Buy Now"></a></div></div>');
			if(tab[index+1].postID != value.postID){
				i=0;
			}else{
				i++;
			}
		}
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

function showMorePlus(idClass){
	if($('.'+idClass).css('display') == "none"){
		$('.plus-'+idClass).html('-');
		$('.'+idClass).slideDown(500);
		$('.'+idClass+'-inv').slideUp(500);
	}else{
		$('.plus-'+idClass).html('+');
		$('.'+idClass).slideUp(500);
		$('.'+idClass+'-inv').slideDown(500);
	}
}


function getMonthFromString(mon){
	var tDate = new Date(Date.parse(mon +" 1, 2016")).getTime();
	return tDate/1000;
}

function notifPop(idShow){
		$('#idShowNotifyMe').attr('value', idShow);
		if($('#popUpNotifyMe').css('display') == 'none'){
			$('#popUpNotifyMe').fadeIn('slow');
		}else{
			$('#popUpNotifyMe').fadeOut('slow');
		}
	}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
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
