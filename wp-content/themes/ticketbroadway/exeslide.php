<?php 
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	global $wpdb;
	if(isset($_POST['name']) && $_POST['name'] != ""){
		$req = " SELECT DISTINCT post_title, ID FROM wp_posts, wp_postmeta WHERE wp_postmeta.post_id = wp_posts.ID AND post_type = 'product' AND wp_posts.post_status = 'publish' ";
	
		$nameShowSearch = htmlspecialchars($_POST['name']);
		$req .= "AND post_title LIKE '%".$nameShowSearch."%'";
		
		$res = $wpdb->get_results ($req);
		$html = '<ul>';
		foreach ( $res as $p )
		{
			$html .= "<a href='".esc_url( get_permalink($p->ID) )."'><li>".$p->post_title."</li></a>";
		}
		$html .= '</ul>';
		echo($html);
	}
	
	if(isset($_POST['letter']) && $_POST['letter'] != ""){
		$lStr = strtolower($_POST['letter']);
		$uStr = strtoupper($_POST['letter']);
		$req = "SELECT post_title, post_name FROM wp_posts WHERE post_title REGEXP  '^[^a-zA-Z]*[".$lStr.$uStr."]' and post_type = 'city' ";
		$res = $wpdb->get_results ($req);
		$html = '';
		foreach ( $res as $p )
		{
			$html .= "<div class='col-md-2'><a href='../".$p->post_name."-shows-theaters'>".$p->post_title."</a></div>";
		}
		echo($html);
	}
?>