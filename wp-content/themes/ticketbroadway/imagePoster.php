<?php 
	$nb = rand(1, 2);
	header('Content-type: image/jpeg');
	$rImg = ImageCreateFromJPEG('images/defaultPoster'.$nb.'.jpg');
	$font_path = 'fonts/PT_Sans-Web-Bold.ttf';
	$text = strtoupper($_GET['postTitle']);
	
	if($nb == 1){
		$cor = imagecolorallocate($rImg, 255, 255, 255);
		imagettftext($rImg , 20, 0, 75, 240, $cor, $font_path, $text);
	}else if($nb == 2){
		$cor = imagecolorallocate($rImg, 0, 0, 0);
		imagettftext($rImg , 20, 0, 80, 300, $cor, $font_path, $text);
	}
	
	imagejpeg($rImg);