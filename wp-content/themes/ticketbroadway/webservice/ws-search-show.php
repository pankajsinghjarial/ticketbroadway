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
	$req = " SELECT DISTINCT ID, dateShow, idDateApi FROM wp_posts, wp_postmeta, wp_term_relationships, wp_showDate WHERE wp_postmeta.post_id = wp_posts.ID AND object_id = ID AND ID = wp_showDate.idShow AND term_taxonomy_id = ".$_POST['cateId']." AND post_type = 'product' AND wp_posts.post_status = 'publish' ";
	
	if($_POST['city'] == 'null' && $_POST['date'] == 'null'){
		$req .= " AND dateShow > ".$dateNow." ORDER BY wp_showDate.dateShow";
	}else if($_POST['city'] != 'null' && $_POST['date'] == 'null'){
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
		$req .= " AND dateShow > ".$dateNow." ORDER BY wp_showDate.dateShow";
	}else if($_POST['city'] == 'null' && $_POST['date'] != 'null'){
		$dateSearch = $_POST['date'];
		if($dateSearch < $dateNow){
			$dateSearch = $dateNow;
		}
		$req .= " AND dateShow > ".$dateSearch." ORDER BY wp_showDate.dateShow";
	}else if($_POST['city'] != 'null' && $_POST['date'] != 'null'){
		$dateSearch = $_POST['date'];
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
		$req .= " AND dateShow > ".$dateSearch." ORDER BY wp_showDate.dateShow";
	}
}else{
	if(isset($_POST['nameshow']) && $_POST['nameshow'] != 'null'){
	 $nameShowSearch = htmlspecialchars($_POST['nameshow']);
	 $req .= "AND post_title LIKE '%".$nameShowSearch."%'";
	}
	if($_POST['city'] != 'null' && $_POST['date'] == 'null'){
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
	}else if($_POST['date'] != 'null' && $_POST['city'] == 'null'){
		$dateSearch = $_POST['date'];
		if($dateSearch < $dateNow){
			$dateSearch = $dateNow;
		}
		$req .= " AND dateShow > ".$dateSearch." ORDER BY wp_showDate.dateShow";
	}else if($_POST['city'] != 'null' && $_POST['date'] != 'null'){
		$nameCitySearch = str_replace("-", " ", $_POST['city']);
		$dateSearch = $_POST['date'];
		if($dateSearch < $dateNow){
			$dateSearch = $dateNow;
		}
		$req .= "AND meta_value IN (SELECT post_id FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND wp_posts.post_type = 'venues' AND wp_posts.post_status = 'publish' AND meta_value LIKE '%".$nameCitySearch."%') ";
		$req .= " AND dateShow > ".$dateSearch." ORDER BY wp_showDate.dateShow";
	}
	if($_POST['date'] != 'null'){
		
	}else{
		$req .= " AND dateShow > ".$dateNow." ORDER BY wp_showDate.dateShow";
	}
	
}
$res = $wpdb->get_results ($req);
$resultShow = array();
$jsonEncoded = array();
foreach ( $res as $page )
{
	$product = new WC_product($page->ID);
	$theater = get_post(get_field('venue', $page->ID));
	$location = get_field('address', $theater->ID);
	$city = get_field('city', $theater->ID);
	array_push($jsonEncoded, array('dateD' => date('D', $page->dateShow), 'dateF' => date('m/d/Y', $page->dateShow), 'dateH' => date('g:i A', $page->dateShow), 'postName' => $product->post->post_title, 'postID' => $product->post->post_name, 'theaterName' => $theater->post_title, 'loca' => $location, 'dateTot' => date('m/d/Y g:i A', $page->dateShow), 'idApi' => $page->idDateApi, 'city' => strtolower(str_replace(" ", "-", $city))));
	
}
echo json_encode($jsonEncoded);
	
?>