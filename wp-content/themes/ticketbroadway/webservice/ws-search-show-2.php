<?php 
	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;
$limit = $_POST['limit'];
$req = " SELECT DISTINCT ID, dateShow, idDateApi FROM wp_posts, wp_postmeta, wp_showDate WHERE wp_postmeta.post_id = wp_posts.ID AND wp_posts.ID = wp_showDate.idShow AND post_type = 'product' AND wp_posts.post_status = 'publish' ";
$dateNow = strtotime("now");
$dateYear = strtotime("now") + 31536000;
$dateToday = new DateTime();
$dateTimeStamp = $dateToday->getTimestamp();


if(isset($_POST['cateId']) && $_POST['cateId'] != 'null'){
	$req = " SELECT DISTINCT ID, dateShow FROM wp_posts, wp_postmeta, wp_term_relationships, wp_showDate WHERE wp_postmeta.post_id = wp_posts.ID AND object_id = ID AND ID = wp_showDate.idShow AND term_taxonomy_id = ".$_POST['cateId']." AND post_type = 'product' AND wp_posts.post_status = 'publish' ";
	
	if($_POST['city'] == 'null' && $_POST['date'] == 'null'){
		$req .= " AND wp_showDate.dateShow > ".$dateNow;
	}else if($_POST['city'] != 'null' && $_POST['date'] == 'null'){
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
		$req .= " AND dateShow > ".$dateNow;
	}else if($_POST['city'] == 'null' && $_POST['date'] != 'null'){
		$dateSearch = $_POST['date'];
		if($dateSearch < $dateNow){
			$dateSearch = $dateNow;
		}
		$req .= " AND dateShow > ".$dateSearch;
	}else if($_POST['city'] != 'null' && $_POST['date'] != 'null'){
		$dateSearch = $_POST['date'];
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
		$req .= " AND dateShow > ".$dateSearch;
	}
	$req .= " ORDER BY wp_showDate.dateShow LIMIT 0, 1500";
}else{
	if(isset($_POST['nameshow']) && $_POST['nameshow'] != 'null'){
	 $nameShowSearch = htmlspecialchars($_POST['nameshow']);
	 $req .= "AND post_title LIKE '%".$nameShowSearch."%'";
	}
	if($_POST['city'] != 'null' && $_POST['venue'] == 'null'){
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
	}else if($_POST['city'] == 'null' && $_POST['venue'] != 'null'){
		$nameVenueSearch = str_replace("-", " ", $_POST['venue']);
		$req .= "AND meta_value IN (SELECT ID FROM wp_posts WHERE wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND post_title LIKE '%".$nameVenueSearch."%') ";
	}else if($_POST['city'] != 'null' && $_POST['venue'] != 'null'){
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$nameVenueSearch = str_replace("-", " ", $_POST['venue']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%' AND post_title LIKE '%".$nameVenueSearch."%') ";
	}
	
	if($_POST['date'] != 'null'){
		$dateSearch = $_POST['date'];
		if($dateSearch < $dateNow){
			$dateSearch = $dateNow;
		}
		$req .= " AND dateShow > ".$dateSearch;
	}else{
		$req .= " AND dateShow > ".$dateNow;
	}
	$req .= " ORDER BY wp_showDate.dateShow LIMIT ".$limit.", 1500";
}

$res = $wpdb->get_results ($req);
$datRed = array();
foreach($res as $key => $value){
	array_push($datRed, $value->ID);
}
$arrayUnique = array_unique($datRed);

$resultShow = array();
$jsonEncoded = array();
foreach ( $arrayUnique as $key => $page )
{
	$product = new WC_product($page);
	$theater = get_post(get_field('venue', $page));
	$location = get_field('address', $theater->ID);
	$city = get_field('city', $theater->ID);
	if($_POST['date'] != 'null'){
		$dateSearch = $_POST['date'];
		if($dateSearch < $dateNow){
			$dateSearch = $dateNow;
		}
		$request = "SELECT * FROM wp_showDate WHERE wp_showDate.idShow = ".$page." AND dateShow > ".$dateSearch." ORDER BY dateShow LIMIT 0,50";
	}else{
		$request = "SELECT * FROM wp_showDate WHERE wp_showDate.idShow = ".$page." AND dateShow > ".$dateNow." ORDER BY dateShow LIMIT 0,50";
	}
	
	$res2 = $wpdb->get_results ($request);
	foreach($res2 as $key2 => $value2){
		array_push($jsonEncoded, array('dateD' => date('D', $value2->dateShow), 'dateF' => date('m/d/Y', $value2->dateShow), 'dateH' => date('g:i A', $value2->dateShow), 'postName' => $product->post->post_title, 'postID' => $product->post->post_name, 'theaterName' => $theater->post_title, 'loca' => $location, 'dateTot' => date('m/d/Y g:i A', $value2->dateShow), 'idApi' => $value2->idDateApi, 'idShow' => $page, 'city' => strtolower(str_replace(" ", "-", $city))));
	}
}
echo json_encode($jsonEncoded);
	
?>