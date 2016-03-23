function slide(){
	var initial_top = document.getElementById('thumbnails-slides-selected').style.top;
	switch(initial_top){
		case '0px':
			$("#thumbnails-slides-selected").animate({top: '125px'});
			$("#main-slide-1").fadeIn("slow");
			$("#main-slide-0").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(3); };
			document.getElementById('goRight').onclick = function () { select(1); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[0][0]->post->post_title; ?>';
			break;
		case '125px':
			$("#thumbnails-slides-selected").animate({top: '250px'});
			$("#main-slide-2").fadeIn("slow");
			$("#main-slide-1").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(0); };
			document.getElementById('goRight').onclick = function () { select(2); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[1][0]->post->post_title; ?>';
			break;
		case '250px':
			$("#thumbnails-slides-selected").animate({top: '375px'});
			$("#main-slide-3").fadeIn("slow");
			$("#main-slide-2").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(1); };
			document.getElementById('goRight').onclick = function () { select(3); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[2][0]->post->post_title; ?>';
			break;
		case '375px':
			$("#thumbnails-slides-selected").animate({top: '0px'});
			$("#main-slide-0").fadeIn("slow");
			$("#main-slide-3").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(2); };
			document.getElementById('goRight').onclick = function () { select(0); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[3][0]->post->post_title; ?>';
			break;
	}
}
setInterval("slide()", 4000);

function select(id){
	switch (id){
		case 0 : 
			$("#thumbnails-slides-selected").animate({top: '0px'});
			$("#main-slide-1").fadeIn("slow");
			$("#main-slide-0").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(3); };
			document.getElementById('goRight').onclick = function () { select(1); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[0][0]->post->post_title; ?>';
			break;
		case 1 :
			$("#thumbnails-slides-selected").animate({top: '125px'});
			$("#main-slide-2").fadeIn("slow");
			$("#main-slide-1").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(0); };
			document.getElementById('goRight').onclick = function () { select(2); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[1][0]->post->post_title; ?>';
			break;
		case 2 :
			$("#thumbnails-slides-selected").animate({top: '250px'});
			$("#main-slide-3").fadeIn("slow");
			$("#main-slide-2").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(1); };
			document.getElementById('goRight').onclick = function () { select(3); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[2][0]->post->post_title; ?>';
			break;
		case 3 :
			$("#thumbnails-slides-selected").animate({top: '375px'});
			$("#main-slide-0").fadeIn("slow");
			$("#main-slide-3").fadeOut("slow");
			document.getElementById('goLeft').onclick = function () { select(2); };
			document.getElementById('goRight').onclick = function () { select(0); };
			document.getElementById('titleSlide').innerHTML = '<?php echo $array_product[3][0]->post->post_title; ?>';
			break;
	}
}