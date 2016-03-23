<?php 
	
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;
$dateToday = new DateTime();
$dateTimeStamp = $dateToday->getTimestamp();
$category = $_POST['cate'];
$req = " SELECT ID, dateShow, idDateApi, name FROM wp_posts, wp_terms, wp_term_relationships, wp_showDate WHERE wp_terms.slug = '".$category."' AND wp_term_relationships.object_id = wp_showDate.idShow AND dateShow > '".$dateTimeStamp."' AND wp_terms.term_id = wp_term_relationships.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID AND post_type = 'product' AND wp_posts.post_status = 'publish' ORDER BY dateShow ASC LIMIT 0, 7";
$reqDisc = " SELECT DISTINCT post_title, post_name FROM wp_posts, wp_terms, wp_term_relationships, wp_showDate WHERE wp_terms.slug = '".$category."' AND wp_term_relationships.object_id = wp_showDate.idShow  AND dateShow > '".$dateTimeStamp."' AND wp_terms.term_id = wp_term_relationships.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID AND post_type = 'product' AND wp_posts.post_status = 'publish' ORDER BY dateShow DESC LIMIT 0, 4";

$res = $wpdb->get_results ($req);
$resDisc = $wpdb->get_results ($reqDisc);
$titleDisc = array();
if(count($resDisc) > 0){
	foreach($resDisc as $leftShow){
		array_push($titleDisc, array("postTitleDesc" => $leftShow->post_title, "postNameDesc" => $leftShow->post_name));
	}
}

$jsonEncoded = array();
$currentProduct = "";
for($i=0; $i<count($res); $i++){
	$product = new WC_product($res[$i]->ID);
	$theater = get_field('venue', $res[$i]->ID);
	$date = $res[$i]->dateShow;
	$thumbnail = wp_get_attachment_image( get_post_thumbnail_id($res[$i]->ID));
	if($thumbnail == ''){
		$thumbnail = '<img src="/wp-content/themes/ticketbroadway/images/nothumbnail.png" alt="no thumbnail image">';
	}
	array_push($jsonEncoded, array('postTitle' => $product->post->post_title, 'postName' => $product->post->post_name, 'theaterName' => get_post($theater)->post_name, 'theaterTitle' => get_post($theater)->post_title, "date" => date('m/d/Y',$date), "category" => $category, "categoryName" => $res[$i]->name, 'dateH' => date('g:i A',$date), "thumbnail" => $thumbnail));
	
}
array_push($jsonEncoded, $titleDisc);
echo json_encode($jsonEncoded);