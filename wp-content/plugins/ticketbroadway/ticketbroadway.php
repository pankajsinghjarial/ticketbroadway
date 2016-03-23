<?php
/*
Plugin Name: Ticket Broadway
Plugin URI: http://netsolutionsindia.com/
Description: to get data from Ticket Network
Version: 1.0
Author URI: http://netsolutionsindia.com/
*/

// Block direct requests

if ( !defined('ABSPATH') ) {
	die('-1');
}

define( 'TB_PLUGIN', __FILE__ );
define( 'TB_PLUGIN_DIR', untrailingslashit( dirname( TB_PLUGIN ) ) );
require_once (TB_PLUGIN_DIR.'/api/genericLib.php');

if (!class_exists('Ticketbroadway')) {
	
	
	register_activation_hook( __FILE__, array( 'Ticketbroadway', 'activate' ) );
	register_deactivation_hook( __FILE__, array( 'Ticketbroadway', 'deactivate' ) );
	/**
	 * Ticketbroadway class
	 **/
	class Ticketbroadway extends TicketNetwork{

		const VERSION = '1.0';
		public $_name;
		public $page_title;
		public $page_name;
		public $page_id;
		function pr($requestData){
			echo "<pre>";
			print_r($requestData);
			echo "</pre>";
			
		}
		/**
		 * Ticketbroadway constructor
		 *
		 * @author Simarjeet Singh, Inc.
		 */
		public function __construct() {
			add_action('admin_menu', array($this, 'pluginMenu'));
			$this->tnObj = new TicketNetwork;
			add_action( 'delete_post', array($this,'dateshow_delete') );
			add_action('event_cronjob_action', array($this,'event_cronjob_action'));
		
		}
		function event_cronjob_action () {
			// code to execute on cron run
			$this->cron_event();
		} 
		
		public function pluginMenu() {
			add_menu_page('Import API Shows','Import API Shows','manage_options',"ticket_network", array($this, 'insert_ticket_event'), "dashicons-products");
			add_submenu_page(  null, ' ', ' ', 'manage_options', 'ticketnetwork_options',  array($this,'new_options'));
			add_submenu_page('ticket_network', 'Logs', 'Logs', 'manage_options', 'ticketnetwork_logs',  array($this,'tn_logs'));
			wp_register_script( 'tb_plugin_script', plugins_url('/js/jquery-ui.js', __FILE__),array('jquery'));
			wp_register_style( 'tb_style', plugins_url('/css/jquery-ui.css', __FILE__) );
			wp_enqueue_style( 'tb_style' );
			wp_enqueue_script( 'tb_plugin_script' ); 
			// unset($GLOBALS['submenu']['ticket_network'][0]);
		}
		public function tn_logs() {
			require_once (TB_PLUGIN_DIR.'/logs.php');
		}
		
		public function new_options(){
			if($_GET['cat'] =="import"){
				$this->getCategories();
			}
			if($_GET['venue'] =="import"){
				$this->getAllVenues();
			}
		}
		public function getVenues($venueId){
			$param = array('venueID'=>$venueId);
			$venuesDataObj = $this->tnObj->getVenueData($param);
			//echo count($venuesDataObj);
			//$this->pr($venuesDataObj);
			//die;
			//$venuesConfDataObj = getVenueConfigurations();
			ini_set('memory_limit',-1);
			set_time_limit (0);
			$venueData = array();
			$user_id = get_current_user_id();
			$metaFields = array('address','city');
			if(is_object($venuesDataObj )){
				 $otherInfo = $city = ''; 
				$venuesData = (array)$venuesDataObj;
				$otherInfo = (isset($venuesData['Street1'])  && !empty($venuesData['Street1']))?($venuesData['Street1']):'';
				$city = (isset($venuesData['City']) && !empty($venuesData['City']))?($venuesData['City']):'';
				$otherInfo .= ",".$city;
				$otherInfo .= (isset($venuesData['ZipCode'])  && !empty($venuesData['ZipCode']))?("," . $venuesData['ZipCode']):'';
				$otherInfo .= (isset($venuesData['StateProvince'])  && !empty($venuesData['StateProvince']))?("," . $venuesData['StateProvince']):'';
				$otherInfo .= (isset($venuesData['Country'])  && !empty($venuesData['Country']))?("," . $venuesData['Country']):'';
				
				$defaults = array(
					'ID'=>$venuesData['ID'],
					'post_author' => $user_id,
					'post_status' => 'publish',
					'post_title' => $venuesData['Name'],
					'post_type' => 'venues'
				);
				$productPostID  = wp_update_post( $defaults );
				if(!$productPostID){
					$defaults = array(
						'import_id'=>$venuesData['ID'],
						'post_author' => $user_id,
						'post_title' => $venuesData['Name'],
						'post_status' => 'publish',
						'post_type' => 'venues'
					);
					$productPostID  = wp_insert_post( $defaults ); // Insert the post into the database
				}
				if($productPostID){
					foreach($metaFields as $metaKey){
						if($metaKey =='address'){
							$metaValue = $otherInfo;
						}
						if($metaKey =='city'){
							$metaValue = $city;
						}							
						if ( add_post_meta( $productPostID,$metaKey, $metaValue, true ) ) { 
							$newAddedEvent[$productPostID] =  $productPostID;
						}else{
							update_post_meta (  $productPostID,$metaKey, $metaValue );
							$updatedEvent[$productPostID] =  $productPostID;
						}
					}
				
				}
				
			
			}
			return true;
			
			
		}
		
			public function testCategories(){
			$categoryData = (array)$this->tnObj->getCategories();
			$this->pr($categoryData);
			}
		public function getCategories(){
			$this->testCategories();
			die;
			$categoryData = (array)$this->tnObj->getCategories();
			
			$parentCatDesc = $childCatDesc =array();
			foreach($categoryData as $key => $val){
				
				$parentCatDesc[$val->ParentCategoryID] = $val->ParentCategoryDescription;
				$childCatDesc[$val->ParentCategoryID][$val->ChildCategoryID] = $val->ChildCategoryDescription;
			}
			foreach($parentCatDesc as $key=> $catVal){
			
				$term = term_exists( $catVal, 'product_cat' );
				if($term !== 0 && $term !== null){
					$inserted_terms[$key]  = $term['term_id'];
					continue;
				}
				 $term = wp_insert_term(
					$catVal,
					'product_cat',
					array(
					  'description'	=> 'This is an example category created with wp_insert_term.',
					  'slug' 		=> ''
					)
				);
				$inserted_terms[$key]  = $term['term_id'];
				
			}
			$inserted_terms_cat['parent'] = $inserted_terms;
			foreach($inserted_terms as $parentKey => $parentVal){
				
				foreach($childCatDesc[$parentKey] as $key=> $subCatVal){
					$termChild = term_exists( $subCatVal, 'product_cat',$parentVal);
					if($termChild !== 0 && $termChild !== null){
						$inserted_terms_cat['child'][$parentVal][$key]  = $termChild['term_id'];
						continue;
					}
					$termChild = wp_insert_term(
					$subCatVal,
					'product_cat',
					array(
					  'description'	=> '',
					  'slug' 		=> '',
					  'parent' =>$parentVal
					));
					$inserted_terms_cat['child'][$parentVal][$key]  = $termChild['term_id'];
				}
			}
			echo "<br>";
			echo "<h2>Parent & child categories are imported successfully.</h2>";
			echo "<br>";
			echo "<a href='/wp-admin/admin.php?page=ticket_network'>Back</a>";
			$filePath = __DIR__ ."/newfile.txt";
		//$this->pr($inserted_terms_cat);
		
			$myfile = fopen($filePath, "w") or die("Unable to open file!");
			$catData = serialize($inserted_terms_cat);
			fwrite($myfile, $catData);
			fclose($myfile);
			
			
			
		}
		function gernateHtml(){
			global $wpdb;
			$table_name = $wpdb->prefix . 'eventlogs'; // do not forget about tables prefix
			$message = ''; $notice = '';
			add_meta_box('events_form_meta_box', 'Import Shows data', array($this,'event_meta_box_handler'), 'event', 'normal', 'default');
		
			?> <script>
				 jQuery(function() {
					jQuery( "#datepicker" ).datepicker();
					jQuery( "#datepicker1" ).datepicker();
					jQuery( "#datepicker2" ).datepicker();
				  });
			</script>
			<div class="wrap">
				<div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
				<h2><?php _e('Import API Shows', 'custom_table_example')?> <a class="add-new-h2"
											href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=ticketnetwork_logs');?>"><?php _e('LOGS', 'custom_table_example')?></a>
				</h2>

				<?php if (!empty($notice)): ?>
				<div id="notice" class="error"><p><?php echo $notice ?></p></div>
				<?php endif;?>
				<?php if (!empty($message)): ?>
				<div id="message" class="updated"><p><?php echo $message ?></p></div>
				<?php endif;?>

				<form id="form"  method="POST">
					<input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
					<?php /* NOTICE: here we storing id to determine will be item added or updated */ ?>
					<input type="hidden" name="id" value=" "/>

					<div class="metabox-holder" id="poststuff">
						<div id="post-body">
							<div id="post-body-content">
								<?php do_meta_boxes('event', 'normal',''); ?>
								<input type="submit" value="submit" id="submit" class="button-primary" name="submit">
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
			}

			function event_meta_box_handler() { ?>
				<style>
				.eventCls { margin-left: 20px; }
				.eventCls th { padding: 10px 10px 17px 0; }
				.eventCls td { padding: 5px 10px; }
				.eventCls select { width: 35%; }
				</style>
			<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table eventCls">
				<tbody>
				<tr class="form-field">
					<th valign="top" scope="row">
						<label for="name"><?php _e('Start Date :', 'custom_table_example')?></label>
					</th>
					<td>
						<input id="datepicker" name="st" type="text" style="width: 35%" 
							   size="50" class="code" placeholder="<?php _e('Start Date :', 'custom_table_example')?>" >
					</td>
				</tr>
				<tr class="form-field">
					<th valign="top" scope="row">
						<label for="email"><?php _e('End Date:', 'custom_table_example')?></label>
					</th>
					<td>
						<input id="datepicker1" name="et" type="text" style="width: 35%"  size="50" class="code" placeholder="<?php _e('End Date:', 'custom_table_example')?>" >
					</td>
				</tr>
				<tr class="form-field">
					<th valign="top" scope="row">
						<label for="email"><?php _e('Modified Date:', 'custom_table_example')?></label>
					</th>
					<td>
						<input id="datepicker2" name="mt" type="text" style="width: 35%"  size="50" class="code"  >
					</td>
				</tr>
				<!-- <tr class="form-field">
					<th valign="top" scope="row">
						<label for="email"><?php _e('Number of Events', 'custom_table_example')?></label>
					</th>
					<td>
						<input id="" name="noe" type="number" style="width: 35%" min="0" class="code" >
					</td>
				</tr> -->
				
				 <tr class="form-field">
					<th valign="top" scope="row">
						<label for="email"><?php _e('Parent Category', 'custom_table_example')?></label>
					</th>
					<td>
						<select name="parentCat" onchange="getChild">
							<option>Select Parent Category</option>
							<option value="3">THEATRE</option>
						</select>
					</td>
				</tr>
				<tr class="form-field">
					<th valign="top" scope="row">
						<label for="email"><?php _e('Child Category', 'custom_table_example')?></label>
					</th>
					<td>
						<select name="childCat[]" id="childCat" multiple>
							<option value="97">Children/Family</option>
							<option value="32">Off Broadway</option> 
							<option value="70">Broadway</option>
							<option value="82">Dance </option> 
							<option value="38">Musical /Play </option>
							<option value="75">Opera </option> 
							<option value="60">Ballet </option>
							<option value="35">Las Vegas </option>
							<option value="74">Other</option> 
						</select>
					</td>
				</tr> 
				</tbody>
			</table>
			<?php
			}

		/**
		 * Simple function that validates data and retrieve bool on success
		 * and error message(s) on error
		 *
		 * @param $item
		 * @return bool|string
		 */
		function custom_table_example_validate_event($item)
		{
			$messages = array();
			if (empty($item['childCat'])) $messages[] = __('Name is required', 'custom_table_example');
			if (empty($messages)) return true;
			return implode('<br />', $messages);
		}
			
		function getLocalCatId(){
			$filePath = __DIR__ ."/newfile.txt";
			$myfile = fopen($filePath , "r") or die("Unable to open file!");
			$catdata =  fread($myfile,filesize($filePath));
			$catDataLocal = unserialize($catdata);
			fclose($myfile);
			return $catDataLocal;
		}
		
		function dateshow_delete($postId) { 
		   global $wpdb;
		   $table_name = $wpdb->prefix . 'showDate';
		   $wpdb->query("
			   DELETE FROM $table_name WHERE idShow=".$postId);
		}
		
		function cron_event(){
			// wp_mail( 'seobrandtester227@gmail.com', 'The subject', 'The message' );
			global $wpdb;
			$table_name = $wpdb->prefix . 'showDate';				 
			$startDate = date('m/d/Y');
			$modifiedDate= date('m/d/Y', strtotime('-1 day'));
			$catMapArr =  array(3=>array('parent'=>26,97=>12,38=>6,32=>14,70=>13,82=>11,74=>13,75=>6,60=>11,35=>13));
			$catArr = array(97,38,32,70,82,74,75,60,35);
			$newAddedEvent = $updatedEvent = array();
			foreach($catArr as $catVal){
				$eventsData  = $newAddedEventCat =  $refineEventsData = $updatedEventCat = array();
				$params = array('childCategoryID'=>$catVal ,'modificationDate'=>$modifiedDate /*,'numberOfEvents'=>10*/,'beginDate' =>$startDate);
				$newAddedEvent = $updatedEvent = array();
				$eventsData = $this->tnObj->getAllEventDetailsArray($params); 
					
				if(count($eventsData) > 0){
					if(is_array($eventsData)){
						$eventArr = array();
						foreach($eventsData as $keyEvent =>$eventValue){
							if($eventValue->CountryID == 217){
									$eventIds[] =  $eventValue->ID ;
									$refineEventsData[$keyEvent] =  $eventsData[$keyEvent];
								}
							}
						}else{
							if($eventsData->CountryID == 217){
								$eventIds[] =  $eventsData->ID ;
								$refineEventsData =  $eventsData;
							}
						}
					$eventsData = $refineEventsData;
					$how_many = count($eventIds);
					$placeholders = array_fill(0, $how_many, '%d');
					$format = implode(', ', $placeholders);
					$my_sql_query = "SELECT * FROM $table_name  WHERE idDateApi IN ($format)";
					$results = $wpdb->get_results( $wpdb->prepare($my_sql_query,$eventIds),ARRAY_A);
					$updatedEvents = array();
			     
					if($results) {
						foreach($results as $key=>$val){
							$updatedEvents[$val['idDateApi']]= $val['idShow'];
						}			
					}
					if(is_array($eventsData)){
						foreach($eventsData as $keyEvent =>$eventValue){
							$key = $eventValue->Name;//."_".date('Y:m:d', strtotime($eventValue->Date));
							if(empty($eventArr[$key]['showId'])){
								$eventArr[$key]['showId'] = (isset($updatedEvents[$eventValue->ID]) && !empty($updatedEvents[$eventValue->ID]))?$updatedEvents[$eventValue->ID]:'';
							}
							$eventArr[$key]['Name'] = $eventValue->Name;
							$eventArr[$key]['VenueID'] = $eventValue->VenueID;
							$eventArr[$key]['ParentCategoryID'] = $eventValue->ParentCategoryID;
							$eventArr[$key]['ChildCategoryID'] = $eventValue->ChildCategoryID;
							$eventArr[$key]['event'][$eventValue->ID]['Date'] = $eventValue->Date;
						
						}
					}else{
							$key = $eventsData->Name;//."_".date('Y:m:d', strtotime($eventValue->Date));
							$eventArr[$key]['showId'] = (isset($updatedEvents[$eventsData->ID]) && !empty($updatedEvents[$eventsData->ID]))?$updatedEvents[$eventsData->ID]:'';
							$eventArr[$key]['Name'] = $eventsData->Name;
							$eventArr[$key]['VenueID'] = $eventsData->VenueID;
							$eventArr[$key]['ParentCategoryID'] = $eventsData->ParentCategoryID;
							$eventArr[$key]['ChildCategoryID'] = $eventsData->ChildCategoryID;
							$eventArr[$key]['event'][$eventsData->ID]['Date'] = $eventsData->Date;
					}
					$numEvents = count($eventArr);
					$user_id = get_current_user_id();
					if($numEvents > 0){ 
						foreach($eventArr as $key =>$eventData){
						
							$productPostID =false;
							$this->getVenues($eventData['VenueID']);
							$parChildId =    $catMapArr[$eventData['ParentCategoryID']]['parent'];
							$catChildId =  $catMapArr[$eventData['ParentCategoryID']][$eventData['ChildCategoryID']];
							$defaults = array(
									'ID'=>$eventData['showId'],
									'post_author' => $user_id,
									'post_status' => 'publish',
									'post_title' => wp_strip_all_tags($eventData['Name']),
									'post_type' => 'product'
								);
							if($eventData['showId']){
								$productPostID  = wp_update_post( $defaults );
								$updatedEvent[$productPostID] =  $productPostID;
								$updatedEventCat[$productPostID] =  $productPostID;
								
							}else{
								$post_ID ='';
								$post_ID = post_exists(wp_strip_all_tags($eventData['Name']));
								if($post_ID){
									$defaults['ID'] = $post_ID;
									$productPostID  = wp_update_post( $defaults );
									$updatedEvent[$productPostID] =  $productPostID;
									$updatedEventCat[$productPostID] =  $productPostID;
								}else{
									$productPostID  = wp_insert_post( $defaults );
									wp_set_post_terms( $productPostID, array($parChildId,$catChildId), "product_cat", true ) ;
									$newAddedEvent[$productPostID] =  $productPostID;
									$newAddedEventCat[$productPostID] =  $productPostID;
								}
							}
							
							if($productPostID){
								foreach($this->eventFields() as $metaKey){
									$metaValue = $eventData['Name'];
									if(($metaKey) =='venue'){
										$metaValue =$eventData['VenueID'];
									}
									if (!add_post_meta( $productPostID, $metaKey, $metaValue, true ) ) { 
										if(($metaKey) == 'venue'){
											update_post_meta (  $productPostID, $metaKey,$metaValue );
										}
									}
								}
								$this->dateshow_delete($productPostID);
							}
							foreach($eventData['event'] as $detailKey => $detailVal){
								$eventDate = strtotime($detailVal['Date']);
								$data=  array('idShow'=>$productPostID,'idDateApi'=>$detailKey,'dateShow'=>$eventDate);
								$format = array('%d','%d','%d');
								$wpdb->insert( $table_name, $data, $format ); 
							}
						}
					}
					$tableName  = $wpdb->prefix . 'eventlogs';
					$importDate = strtotime(date('m/d/Y'));
					$searchCreteria = serialize($params);
					$resultLog = serialize(array('added'=>$newAddedEventCat,'updated'=>$updatedEventCat));
					$now = date('Y-m-d H:i:s');
					$importData=  array('created'=>$now ,'added'=>count($newAddedEventCat),'updated'=>count($updatedEventCat),'search_creteria'=>$searchCreteria,'result_log'=>$resultLog,'ip'=>$this->get_client_ip(),'child_cat_id'=>$catChildId);
					$importFormat = array('%s','%d','%d','%s','%s','%s','%d');
					$wpdb->insert( $tableName, $importData, $importFormat ); 
				}
			}
				
		}
			function delete_ticket_event(){
			 
			//$this->gernateHtml();
			global $wpdb;
			$table_name = $wpdb->prefix . 'showDate';				//'modificationDate'=>'02/15/2016',
			$modifiedDate = date('m/d/Y');
			$startDate ='';  
			$endDate ='';  
			if(isset($_POST['submit'])){
				$post_data = $_POST;
				$item_valid = $this->custom_table_example_validate_event($post_data);
				if ($item_valid !== true) {?>
					<div id="notice" class="error"><p><?php echo "Please select at least one child category"; ?></p></div>
				<?php }
				else{
					$startDate  = 	isset($_POST['st'])?$_POST['st']:'';
					$endDate 	= 	isset($_POST['et'])?$_POST['et']:'';
					$modifiedDate = isset($_POST['mt'])?$_POST['mt']:'';
					$numberOfEvents = isset($_POST['noe'])?$_POST['noe']:'';
					$catArr =  !empty($_POST['childCat'][0])?$_POST['childCat']:'';
						$catArr = array(97,38,32,70,82,74);
					$catMapArr =  array(3=>array('parent'=>26,97=>12,38=>6,32=>14,70=>13,82=>11,74=>13));
					$newAddedEvent = $updatedEvent = array();
					if(!empty($catArr)) {
						foreach($catArr as $catVal){
							$eventsData  =$refineEventsData= $refineEventsDataOther = $newAddedEventCat = $updatedEventCat = array();
							$params = array('childCategoryID'=>$catVal,'countryID' =>'217' ,'modificationDate'=>$modifiedDate,'beginDate' =>$startDate ,	'endDate' =>$endDate /*,'numberOfEvents'=>2*/ );
							$eventsData = $this->tnObj->getAllEventDetailsArray($params); 
							
							
							if(count($eventsData) > 0){
								if(is_array($eventsData)){
									$eventArr =  $eventIds =array();
									foreach($eventsData as $keyEvent =>$eventValue){
										if($eventValue->CountryID == 217){
											$refineEventsData[$keyEvent] =  $eventsData[$keyEvent];
										}else{
											$eventIds[] =  $eventValue->ID ;
											$refineEventsDataOther[$keyEvent] =  $eventsData[$keyEvent];
										}
									}
								}else{
									if($eventsData->CountryID == 217){
										
									}else{
										$eventIds[] =  $eventValue->ID ;
											$refineEventsDataOther  =  $eventsData ;
									}
								}
								$how_many = count($eventIds);
								if($how_many >0){
									$placeholders = array_fill(0, $how_many, '%d');
									$format = implode(', ', $placeholders);
									$my_sql_query = "SELECT * FROM $table_name  WHERE idDateApi IN ($format)";
									$results = $wpdb->get_results( $wpdb->prepare($my_sql_query,$eventIds),ARRAY_A);
									$updatedEvents = array();
									if($results) {
										foreach($results as $key=>$val){
											$updatedEvents[$val['idDateApi']]= $val['idShow'];
											$arr[$val['idShow']] = $val['idShow'];
										}			
									}
									
									foreach($refineEventsDataOther as $key=>$eventValue){	
										$force_delete = true;
										if(empty($eventArrL['showId'][$updatedEvents[$eventValue->ID]])){
											$eventArrL['showId'][$updatedEvents[$eventValue->ID]] = (isset($updatedEvents[$eventValue->ID]) && !empty($updatedEvents[$eventValue->ID]))?$updatedEvents[$eventValue->ID]:'';
											$postid = $updatedEvents[$eventValue->ID];
											wp_delete_post( $postid, $force_delete ); 
											$this->dateshow_delete($postid);
										}
										$vPostid = $eventValue->VenueID;
										wp_delete_post( $vPostid, $force_delete ); 
									}
									
								}
						
								
							}
						}
					//	$this->pr(count($eventArrL['showId']));
						die;
					}
				}
			}
			echo "	</section>";
			
		}
		function insert_ticket_event(){
		//	$this->getCategories();
		//	die;
			// $this->delete_ticket_event();
			$this->gernateHtml();
			global $wpdb;
			$table_name = $wpdb->prefix . 'showDate';				//'modificationDate'=>'02/15/2016',
			$modifiedDate = date('m/d/Y');
			$startDate ='';  
			$endDate ='';  
			if(isset($_POST['submit'])){
				$post_data = $_POST;
				$item_valid = $this->custom_table_example_validate_event($post_data);
				if ($item_valid !== true) {?>
					<div id="notice" class="error"><p><?php echo "Please select at least one child category"; ?></p></div>
				<?php }
				else{
					$startDate  = 	isset($_POST['st'])?$_POST['st']:'';
					$endDate 	= 	isset($_POST['et'])?$_POST['et']:'';
					$modifiedDate = isset($_POST['mt'])?$_POST['mt']:'';
					$numberOfEvents = isset($_POST['noe'])?$_POST['noe']:'';
					$catArr =  !empty($_POST['childCat'][0])?$_POST['childCat']:'';
					//75
					$catMapArr =  array(3=>array('parent'=>26,97=>12,38=>6,32=>14,70=>13,82=>11,74=>13,75=>6,60=>11,35=>13));
					$newAddedEvent = $updatedEvent = array();
					if(!empty($catArr)) {
						foreach($catArr as $catVal){
							$eventsData  =$refineEventsData=  $newAddedEventCat = $updatedEventCat = array();
							$params = array('childCategoryID'=>$catVal,'countryID' =>'217' ,'modificationDate'=>$modifiedDate,'beginDate' =>$startDate ,	'endDate' =>$endDate /*,'numberOfEvents'=>2*/ );
							$eventsData = $this->tnObj->getAllEventDetailsArray($params); 
							
							
							if(count($eventsData) > 0){
								if(is_array($eventsData)){
									$eventArr =  $eventIds =array();
									foreach($eventsData as $keyEvent =>$eventValue){
										if($eventValue->CountryID == 217){
											$eventIds[] =  $eventValue->ID ;
											$refineEventsData[$keyEvent] =  $eventsData[$keyEvent];
										} 
									}
								}else{
									if($eventsData->CountryID == 217){
										$eventIds[] =  $eventsData->ID ;
										$refineEventsData =  $eventsData;
									}
								}
								$eventsData = $refineEventsData;
							
								$how_many = count($eventIds);
								$placeholders = array_fill(0, $how_many, '%d');
								$format = implode(', ', $placeholders);
								$my_sql_query = "SELECT * FROM $table_name  WHERE idDateApi IN ($format)";
								$results = $wpdb->get_results( $wpdb->prepare($my_sql_query,$eventIds),ARRAY_A);
								$updatedEvents = array();
								if($results) {
									foreach($results as $key=>$val){
										$updatedEvents[$val['idDateApi']]= $val['idShow'];
									}			
								}
							// count($updatedEvents);
								//$this->pr($updatedEvents);
								//$this->pr($eventsData);
						//die;
								if(is_array($eventsData)){
									foreach($eventsData as $keyEvent =>$eventValue){
										//$this->pr($eventValue);
										$key = $eventValue->Name;//."_".date('Y:m:d', strtotime($eventValue->Date));
										if(empty($eventArr[$key]['showId'])){
											$eventArr[$key]['showId'] = (isset($updatedEvents[$eventValue->ID]) && !empty($updatedEvents[$eventValue->ID]))?$updatedEvents[$eventValue->ID]:'';
										}
										$eventArr[$key]['Name'] = $eventValue->Name;
										$eventArr[$key]['VenueID'] = $eventValue->VenueID;
										$eventArr[$key]['ParentCategoryID'] = $eventValue->ParentCategoryID;
										$eventArr[$key]['ChildCategoryID'] = $eventValue->ChildCategoryID;
										$eventArr[$key]['event'][$eventValue->ID]['Date'] = $eventValue->Date;
									
									}
								}else{
										$key = $eventsData->Name;//."_".date('Y:m:d', strtotime($eventValue->Date));
										$eventArr[$key]['showId'] = (isset($updatedEvents[$eventsData->ID]) && !empty($updatedEvents[$eventsData->ID]))?$updatedEvents[$eventsData->ID]:'';
										$eventArr[$key]['Name'] = $eventsData->Name;
										$eventArr[$key]['VenueID'] = $eventsData->VenueID;
										$eventArr[$key]['ParentCategoryID'] = $eventsData->ParentCategoryID;
										$eventArr[$key]['ChildCategoryID'] = $eventsData->ChildCategoryID;
										$eventArr[$key]['event'][$eventsData->ID]['Date'] = $eventsData->Date;
								}
							    $numEvents = count($eventArr);
								$user_id = get_current_user_id();
							//	$this->pr($eventArr);
								//continue;
								//die;
							
								if($numEvents > 0){ 
									foreach($eventArr as $key =>$eventData){
									
										$productPostID =false;
										$this->getVenues($eventData['VenueID']);
										$parChildId =    $catMapArr[$eventData['ParentCategoryID']]['parent'];
										$catChildId =  $catMapArr[$eventData['ParentCategoryID']][$eventData['ChildCategoryID']];
										$defaults = array(
												'ID'=>$eventData['showId'],
												'post_author' => $user_id,
												'post_status' => 'publish',
												'post_title' => wp_strip_all_tags($eventData['Name']),
												'post_type' => 'product'
											);
										if($eventData['showId']){
											$productPostID  = wp_update_post( $defaults );
											$updatedEvent[$productPostID] =  $productPostID;
											$updatedEventCat[$productPostID] =  $productPostID;
											
										}else{
											$post_ID ='';
											$post_ID = post_exists(wp_strip_all_tags($eventData['Name']));
											if($post_ID){
												$defaults['ID'] = $post_ID;
												$productPostID  = wp_update_post( $defaults );
												$updatedEvent[$productPostID] =  $productPostID;
												$updatedEventCat[$productPostID] =  $productPostID;
											}else{
												$productPostID  = wp_insert_post( $defaults );
												wp_set_post_terms( $productPostID, array($parChildId,$catChildId), "product_cat", true ) ;
												$newAddedEvent[$productPostID] =  $productPostID;
												$newAddedEventCat[$productPostID] =  $productPostID;
											}
										}
										
										if($productPostID){
											foreach($this->eventFields() as $metaKey){
												$metaValue = $eventData['Name'];
												if(($metaKey) =='venue'){
													$metaValue =$eventData['VenueID'];
												}
												if (!add_post_meta( $productPostID, $metaKey, $metaValue, true ) ) { 
													if(($metaKey) == 'venue'){
														update_post_meta (  $productPostID, $metaKey,$metaValue );
													}
												}
											}
											$this->dateshow_delete($productPostID);
										}
										foreach($eventData['event'] as $detailKey => $detailVal){
											$eventDate = strtotime($detailVal['Date']);
											$data=  array('idShow'=>$productPostID,'idDateApi'=>$detailKey,'dateShow'=>$eventDate);
											$format = array('%d','%d','%d');
											$wpdb->insert( $table_name, $data, $format ); 
										}
									}
								}
								$tableName  = $wpdb->prefix . 'eventlogs';
								$importDate = strtotime(date('m/d/Y'));
								$searchCreteria = serialize($params);
								$resultLog = serialize(array('added'=>$newAddedEventCat,'updated'=>$updatedEventCat));
								$now = date('Y-m-d H:i:s');
								$importData=  array('created'=>$now ,'added'=>count($newAddedEventCat),'updated'=>count($updatedEventCat),'search_creteria'=>$searchCreteria,'result_log'=>$resultLog,'ip'=>$this->get_client_ip(),'child_cat_id'=>$catChildId);
								$importFormat = array('%s','%d','%d','%s','%s','%s','%d');
								$wpdb->insert( $tableName, $importData, $importFormat ); 
							}
							
						}
					}
				
					
					echo "<h2>Total New added Events : </h2>". count($newAddedEvent);
					echo "<br>";
					echo "<h2>Total updated Events : </h2> ". count($updatedEvent);
				}
			}
			echo "	</section>";
			
		}
		// Function to get the client IP address
		function get_client_ip() {
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP']))
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['REMOTE_ADDR']))
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			return $ipaddress;
		}
		function eventFields(){
			return array('wpcf-meta-title-main','wpcf-meta-title-venue','wpcf-meta-title-reviews','wpcf-meta-title-cast-crew','venue');
		}
		 function activate() {
			global $wpdb;
			$table_name = $wpdb->prefix . 'eventlogs'; // do not forget about tables prefix
			 $sql = "CREATE TABLE " . $table_name . " (
					  id int(11) NOT NULL AUTO_INCREMENT,
					  created datetime NOT NULL,
					  status  enum('1','0') NOT NULL,
					  added int(11) NULL,
					  updated int(11) NULL,
					  search_creteria VARCHAR(200) NOT NULL,
					  result_log text,
					  ip VARCHAR(200) NULL,
					  child_cat_id int(11) NOT NULL,
					  PRIMARY KEY  (id)
					);";
					
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
		 function deactivate() { }
		 function uninstall() { }

	}
	new Ticketbroadway;
}
