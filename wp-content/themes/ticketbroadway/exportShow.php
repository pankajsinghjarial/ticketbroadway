<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
global $wpdb;
$req = "SELECT DISTINCT ID FROM wp_posts WHERE post_type = 'product' and post_status = 'publish'";
$res = $wpdb->get_results ($req);

$allResult = array();
foreach($res as $key => $idShow){
	$show = get_post($idShow->ID);
	$titleShow = $show->post_title;

	$showUrl = 'https://www.ticketsbroadway.com/shows/'.$show->post_name;
	$theater = get_post(get_field('venue', $idShow->ID));
	$theaterName = $theater->post_title;
	$city = get_field('city', $theater->ID);
	
	$reqDate = "SELECT * FROM wp_showDate WHERE idShow = ".$idShow->ID;
	$resDate = $wpdb->get_results ($reqDate);
	$firstDate = $resDate[0]->dateShow;
	$lastDate = $resDate[0]->dateShow;
	$numberDate = count($resDate);
	$numberOfDateRemaining = array();
	foreach($resDate as $key => $date){
		if($date->dateShow > $lastDate){
			$lastDate = $date->dateShow;
		}
		
		if($date->dateShow < $firstDate){
			$firstDate = $date->dateShow;
		}
		
		
		
		if(date($date->dateShow) > strtotime("now")){
			array_push($numberOfDateRemaining, $date->dateShow);
		}
	}
	
	$terms = get_the_terms( $idShow->ID, 'product_cat' );
	array_push($allResult, array("Title Show" => $titleShow, "Show Url" => $showUrl, "Theater Name" => $theaterName, "City" => $city, "First Date" => date('m/d/Y g:i A', $firstDate), "Last Date" => date('m/d/Y g:i A', $lastDate), "Number of Date" => $numberDate, "Date Remaining" => count($numberOfDateRemaining), "Category" => $terms[0]->name));
	
}

download_send_headers("data_export_" . date("Y-m-d") . ".csv");
echo array2csv($allResult);
die();


function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}