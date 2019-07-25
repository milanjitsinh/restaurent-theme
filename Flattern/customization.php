<?php

/**
 *
 */
function aj_listing_slider_html( $atts,$content ){

	$aj_listing_slider= get_option('aj_listing_slider_ids',true);
	$style = '';
	if(!empty($aj_listing_slider)) {
		//Set the slider Ids randomly
		shuffle($aj_listing_slider);
	?>
	<section class="lazy-aj-slick-slider slider">
		<?php
		foreach ( $aj_listing_slider as $listing_id ){

			 $src = wp_get_attachment_image_src( get_post_thumbnail_id($listing_id), 'full', false );
			?>
				<div class="homepage-cover page-cover entry-cover entry-cover--home entry-cover--" style="background-image: url(<?php echo !empty($src[0])? $src[0] : ''; ?>);">
					<div class="cover-wrapper container">
						<?php
						$listing = $listing_id;

						$listing_level = get_the_terms($listing, 'listing_level');
						$listing_level = wp_get_post_terms($listing, 'listing_level',  array("fields" => "names"));
						$listing_level =  !empty($listing_level['0']) ? strtoupper($listing_level['0']) : '';

						// // Assign your post details to $post (& not any other variable name!!!!)
						// global $post;
						// $post = get_post($listing);
						// setup_postdata( $post );

							$output = "";
							if(!empty($listing)){
								$listing_address = get_post_meta( $listing, 'aj_streetaddress', true );
								$listing_website = get_post_meta( $listing, '_company_website', true );
								$output = '<div><h3 class="slid34125">'.$listing_level." PROPERTY".'</h3><h2>'.get_the_title($listing).'</h2>
								<p>'.$listing_address.'</p></div>
								<div class="aj-home-btn-container">
								'.laa_listing_home_side($listing).'
								</div>';
							}

							// wp_reset_postdata();

							the_widget(
								'Listify_Widget_Search_Listings',
								apply_filters(
									'listify_widget_search_listings_default', array(
										//'title'       => $listing_level.' PROPERTY',
										'title'       => ' ',
										'description' => $output,
									)
								),
								array(
									'before_widget' => '<div class="listify_widget_search_listings">',
									'after_widget'  => '</div>',
									'before_title'  => '<div class="home-widget-section-title"><h4 class="home-widget-title">',
									'after_title'   => '</h4></div>',
									'widget_id'     => 'search-12391',
									'id'            => 'widget-area-home',
								)
							);
						?>
					</div>

					<?php if ( 'video' == $style && function_exists( 'the_custom_header_markup' ) ) : ?>
						<div class="custom-header-video">
							<div class="custom-header-media">
								<?php
									add_filter( 'theme_mod_external_header_video', 'listify_header_video' );
									the_custom_header_markup();
									remove_filter( 'theme_mod_external_header_video', 'listify_header_video' );
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php
		}
		?>
		</section>
		<?php
	}

	return '';
}
add_shortcode('aj_listing_slider','aj_listing_slider_html');

/**
 * Adding Slider settings on Listing Edit Page
 */
function aj_listing_slider_settings( $thepostid ){
	global $post;

	$aj_slider_setting = get_post_meta( $thepostid, 'aj_slider_setting',true  );
	$aj_walk_score_disable = get_post_meta( $thepostid, 'aj_walk_score_disable',true  );
	$aj_lat_long = get_post_meta( $thepostid, 'aj_lat_long',true  );
	$aj_streetaddress = get_post_meta( $thepostid, 'aj_streetaddress',true  );
	$aj_city = get_post_meta( $thepostid, 'aj_city',true  );
	$aj_state = get_post_meta( $thepostid, 'aj_state',true  );
	$aj_zip = get_post_meta( $thepostid, 'aj_zip',true  );
	?>
	<p class="form-field form-field-checkbox">
	</p>
	<p class="form-field form-field-checkbox">
		<label for="aj_slider_setting">Slider Setting</label>
		<input type="checkbox"  class="checkbox" <?php echo !empty($aj_slider_setting )? "checked='checked'" :''; ?> name="aj_slider_setting" id="aj_slider_setting" value="1">
		<span class="description">Check this if you want to display property in slider.</span>
	</p>

	<p class="form-field form-field-checkbox">
		<label for="aj_walk_score_setting">Walk Score Disable</label>
		<input type="checkbox"  class="checkbox" <?php echo !empty($aj_walk_score_disable )? "checked='checked'" :''; ?> name="aj_walk_score_disable" id="aj_walk_score_setting" value="1">
		<span class="description">Check this if you don't want to display Walk Score for this property.</span>
	</p>
	<p class="form-field">
		<label for="aj_latitude">Latitude:</label>
		<input type="text" disabled="disabled" autocomplete="off" name="aj_latitude" class="" id="aj_latitude" value="<?php echo !empty($aj_lat_long['latitude']) ? $aj_lat_long['latitude'] :''; ?>">
	</p>
	<p class="form-field">
		<label for="aj_longitude">Longitude:</label>
		<input type="text" disabled="disabled" autocomplete="off" name="aj_longitude" class="" id="aj_longitude" value="<?php echo !empty($aj_lat_long['longitude']) ? $aj_lat_long['longitude'] :''; ?>">
	</p>

	<p class="form-field">
		<label for="aj_streetaddress">Street Adress:</label>
		<input type="text" name="aj_streetaddress" class="" id="aj_streetaddress" value="<?php echo !empty($aj_streetaddress) ? $aj_streetaddress :''; ?>">
	</p>
	<p class="form-field">
		<label for="aj_city">City:</label>
		<input type="text" name="aj_city" class="" id="aj_city" value="<?php echo !empty($aj_city) ? $aj_city :''; ?>">
	</p>
	<p class="form-field">
		<label for="aj_state">State:</label>
		<input type="text" name="aj_state" class="" id="aj_state" value="<?php echo !empty($aj_state) ? $aj_state :''; ?>">
	</p>
	<p class="form-field">
		<label for="aj_zip">Zip:</label>
		<input type="text" name="aj_zip" class="" id="aj_zip" value="<?php echo !empty($aj_zip) ? $aj_zip :''; ?>">
	</p>
	<?php
}
add_action('job_manager_job_listing_data_end','aj_listing_slider_settings');

/*
 * Saving the slider settings of edit page
 */
function aj_listing_slider_settings_save($post_id, $post){
	global $post;

	if ( empty( $post_id ) || empty( $post ) || empty( $_POST ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( is_int( wp_is_post_revision( $post ) ) ) {
		return;
	}
	if ( is_int( wp_is_post_autosave( $post ) ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( 'job_listing' !== $post->post_type ) {
		return;
	}

	$aj_listing_slider= get_option('aj_listing_slider_ids',true);
	$aj_listing_slider = !empty($aj_listing_slider) ? $aj_listing_slider : array();

	if(!empty($_POST['aj_slider_setting'])){
		update_post_meta( $post_id, 'aj_slider_setting', $_POST['aj_slider_setting'] );
		if( !in_array( $post_id, $aj_listing_slider )){
			$aj_listing_slider[] = $post_id;
			update_option('aj_listing_slider_ids',$aj_listing_slider);
		}

	}else{
		update_post_meta( $post_id, 'aj_slider_setting', '' );
		if(in_array( $post_id, $aj_listing_slider )){
			$key = array_search ($post_id, $aj_listing_slider);
			unset($aj_listing_slider[$key]);
			update_option('aj_listing_slider_ids',$aj_listing_slider);
		}
	}
	if(!empty($_POST['aj_walk_score_disable'])){
		update_post_meta( $post_id, 'aj_walk_score_disable', $_POST['aj_walk_score_disable'] );
	}else{
		update_post_meta( $post_id, 'aj_walk_score_disable', '' );
	}
	if(!empty($_POST['_job_location'])){
		$aj_lat_long = getLatLong($_POST['_job_location']);
		update_post_meta( $post_id, 'aj_lat_long', $aj_lat_long );
	}else if(isset($_POST['_job_location']) && empty($_POST['_job_location']) ){
		update_post_meta( $post_id, 'aj_lat_long', array() );
	}

	//Code for update Street Address
	if(isset($_POST['aj_streetaddress'])){
		update_post_meta( $post_id, 'aj_streetaddress', $_POST['aj_streetaddress'] );
	}
	if(isset($_POST['aj_city'])){
		update_post_meta( $post_id, 'aj_city', $_POST['aj_city'] );
	}
	if(isset($_POST['aj_state'])){
		update_post_meta( $post_id, 'aj_state', $_POST['aj_state'] );
	}
	if(isset($_POST['aj_zip'])){
		update_post_meta( $post_id, 'aj_zip', $_POST['aj_zip'] );
	}

	if(isset($_POST['aj_slider_images'])){
		update_post_meta( $post_id, 'aj_slider_images', $_POST['aj_slider_images'] );
	}

	if(isset($_POST['aj_card_icons'])){
		update_post_meta( $post_id, 'aj_card_icons', $_POST['aj_card_icons'] );
	}

}
add_action('save_post','aj_listing_slider_settings_save',10,2);

/**
 * Code work on listing delete
 */
add_action('wp_trash_post', 'aj_custom_delete_function');
add_action('delete_post', 'aj_custom_delete_function');
/**
if(!empty($_GET['aj_custom_delete_function'])){
	aj_custom_delete_function('4281');
}
**/
function aj_custom_delete_function( $post_id ) {
    global $wpdb;
    $aj_listing_slider= get_option('aj_listing_slider_ids',true);
	$aj_listing_slider = !empty($aj_listing_slider) ? $aj_listing_slider : array();

	if(in_array( $post_id, $aj_listing_slider )){
		$key = array_search ($post_id, $aj_listing_slider);
		unset($aj_listing_slider[$key]);
		update_option('aj_listing_slider_ids',$aj_listing_slider);
	}
}
function job_manager_job_listing_data_fields_hide( $fields ){
	if(!empty($fields['_featured'])){
		unset($fields['_featured']);
	}
	if(!empty($fields['_featured2'])){
		unset($fields['_featured2']);
	}
	if(!empty($fields['_featured3'])){
		unset($fields['_featured3']);
	}
	if(!empty($fields['_featured4'])){
		unset($fields['_featured4']);
	}
	return $fields;
}
add_filter('job_manager_job_listing_data_fields', 'job_manager_job_listing_data_fields_hide',12);

function listify_login_form_latest( $form_id = 'listify-loginform' ) {
	if ( is_user_logged_in() ) {
		return;
	}
	?>

	<?php do_action( 'listify_login_form_before', $form_id ); ?>

	<?php
	wp_login_form(
		array(
			'redirect' => site_url('/my-favorites/'),
			'form_id' => $form_id,
		)
	);
	?>

	<?php do_action( 'listify_login_form', $form_id ); ?>

<p class="forgot-password">
	<?php echo listify_register_link(); ?>
	<?php echo listify_lostpassword_link(); ?>
</p>

	<?php do_action( 'listify_login_form_after', $form_id ); ?>

	<?php
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
/**
 * Walk Score details set
 *
 * @param $lat
 * @param $lon
 * @param $address
 * @return value
 */
function getWalkScore($lat, $lon, $address) {
  $Api_key = '2d277b2a2f6f6a3645ee7ed72e45cd5c';
  $address=urlencode($address);
  $url = "http://api.walkscore.com/score?format=json&address=$address";
  $url .= "&lat=$lat&lon=$lon&transit=1&wsapikey=$Api_key";
  $str = @file_get_contents($url);

  return $str;
}

/**
 * Get Lat long based on address
 *
 * @param unknown_type $address
 * @return unknown
 */
function getLatLong($address){
    if(!empty($address)){
    	$Api_key = 'AIzaSyDdLghA0j4S71P6-pZAJDb2xGvYOLWpJzs';
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = @file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false&key='.$Api_key);
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat;
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
/**
 * Shortcode For Display Walk Score on Single property Page
 */
function aj_walk_score_html($atts,$output){
	global $post;
	$post_id = $post->ID;

    $_job_location = get_post_meta( $post_id, '_job_location', true );
    if(!empty($_job_location)){

    	$aj_lat_long = get_post_meta( $post_id, 'aj_lat_long', true );
    	$aj_walk_score_disable = get_post_meta( $post_id, 'aj_walk_score_disable', true );
    	$address = stripslashes($_job_location);

    	if(!empty($aj_lat_long['latitude']) && !empty($aj_lat_long['longitude']) && empty($aj_walk_score_disable)){
    		$json_response = getWalkScore($aj_lat_long['latitude'],$aj_lat_long['longitude'],$address);
    		if(!empty($json_response)){
				$json_response = json_decode($json_response);
				$walkscore = !empty($json_response->walkscore) ? $json_response->walkscore : '';
				//$walkscore = !empty($json_response->status) ? $json_response->status : '';
				$listing_level_cls = '';
				$listing_level = wp_get_post_terms($post_id, 'listing_level',  array("fields" => "names"));
				$listing_level =  !empty($listing_level['0']) ? $listing_level['0'] : '';
				if(!empty($listing_level)){
					$listing_level_cls = strtolower($listing_level);
				}
				ob_start();
				?>
				<div class="<?php echo $listing_level_cls; ?>">
					<div class="job_listing-walkscore aj-single-list">
						<div class="walkscore-title">WalkScore</div>
						<div class="walkscore-desc"><?php echo $walkscore; ?></div>
					</div>
				</div>
				<?php
				$output .=ob_get_clean();
    		}
    	}

    }

	return $output;
}
add_shortcode( 'aj_walk_score', 'aj_walk_score_html' );

function aj_add_meta_boxes(){
	add_meta_box( 'aj_listify_slider_images', __( 'Property Card Slider Images', 'listify' ), 'aj_property_card_images', 'job_listing', 'side', 'low' );
	add_meta_box( 'card_icons', __( 'Card Icons', 'listify' ), 'aj_card_icons', 'job_listing', 'side', 'low' );
}

add_action( 'add_meta_boxes_job_listing', 'aj_add_meta_boxes');

/**
 * Render the Proprty Card Icons Settings
 * Drag & Drop with Checkbox
 *
 */
function aj_card_icons(){

	global $post;

	$aj_card_icons_updated = get_post_meta( get_the_ID(), 'aj_card_icons', true );
	$aj_card_icons_updated = !empty($aj_card_icons_updated)? $aj_card_icons_updated : array();

	$aj_card_icons = array(
		"ADAAccessible" => "ADA Accessible",
		"AlarmSystem"=>"Alarm System",
		"BusinessCenter"=>"Business Center",
		"CeilingFan"=>"Ceiling Fan",
		"CentralHeat_Air"=>"Central Heat & Air",
		"ClothingCareCenter"=>"Clothing Care Center",
		"CoveredParking"=>"Covered Parking",
		"Fireplace"=>"Fireplace",
		"FitnessCenter"=>"Fitness Center",
		"FreeCableTV"=>"Free Cable TV",
		"FreeHighSpeedInternet"=>"Free High Speed Internet",
		"FurnishedAvailable"=>"Furnished Available",
		"NonSmokingUnits"=>"Non-Smoking Units",
		"PetFriendly"=>"Pet Friendly",
		"SmokingUnits"=>"Smoking Units",
		"SwimmingPool"=>"Swimming Pool",
		"WasheDryer"=>"Washe/Dryer",
		"WasherDryerConnections"=>"Washer/Dryer Connections",
	);
	?>
	<style>
	.aj_error{display:none;padding: 5px 5px;background: #d41818c2;color: #fff;font-weight: 600;}
	</style>
	<div class="aj_error">Only 5 Icons you can select.</div>
	<ul id="aj_card_icons" class="aj_card_icons form-no-clear">

	<?php
	$i = 0;
	if(!empty($aj_card_icons_updated)){

		foreach( $aj_card_icons_updated as $key => $value ){

			if(!empty($aj_card_icons[$value])){
			?>
				<li id="li_id<?php echo $i; ?>"><label><input id="checkbox_id<?php echo $i; ?>" class="aj_card_icons_check" value="<?php echo $value?>" type="checkbox" checked="checked" name="aj_card_icons[]" > <?php echo $aj_card_icons[$value];?></label></li>
			<?php
			}
			$i++;
		}
	}

	foreach( $aj_card_icons as $key =>$value ){
		if(!in_array($key,$aj_card_icons_updated)){
		?>
			<li id="li_id<?php echo $i; ?>"><label><input id="checkbox_id<?php echo $i; ?>"value="<?php echo $key?>" class="aj_card_icons_check" type="checkbox" name="aj_card_icons[]" > <?php echo $value?></label></li>
		<?php
			$i++;
		}
	}
	?>
	</ul>

	<script type="text/javascript">
		$( ".aj_card_icons" ).sortable({
			delay: 150,
			stop: function() {
				var selectedData = new Array();
				$('.aj_card_icons>li').each(function() {
					selectedData.push($(this).attr("id"));
				});
			}
		});
		var aj_limit = 5;
		jQuery(document).ready(function (){
			jQuery('input.aj_card_icons_check').on('change', function(evt) {
			   if(jQuery('input.aj_card_icons_check:checked').length > aj_limit) {
			       this.checked = false;
			       jQuery('.aj_error').show();
			   }else{
			   	   jQuery('.aj_error').hide();
			   }
			});
		});


	</script>

	<?php
}
/**
 * Property Card Images
 *
 */
function aj_property_card_images(){
	global $post;
	// See if there's a media id already saved as post meta
	$aj_slider_images = get_post_meta( get_the_ID(), 'aj_slider_images', true );
	?>
	<style>
		.aj_image .image-preview img{
			max-width: 250px;
		    max-height: 120px;
		    width: 266px;
		    height: 200px;
		}
		.aj_image{
			padding: 10px 0px;
		}
		.aj_image label { font-weight: 600; }
		.aj-remove-slide{
			position: absolute;
		    right: 20px;
		    z-index: 999;
		    margin-top: 4px;
		    border: 2px solid #fff;
		    padding: 4px;
		    border-radius: 50%;
		    cursor: pointer;
		    color: #fff;
		}
	</style>
	<script>
	jQuery(document).ready(function($) {
		jQuery( document ).on( 'click', '.aj-remove-slide', function() {
			var slider_id = jQuery(this).attr('data-id');
			jQuery(slider_id).val('');
			jQuery(this).parent().html('');
		});
	});
	</script>
	<p class="hide-if-no-js howto" id="set-post-thumbnail-desc">Please provide images of this proportion to make load time better : 535*400</p>
	<div class="aj_image ajslide0">
		<label for="aj_slider_images[0]">Slider Image1</label><br>
		<div class="image-preview">
			<?php
			if(!empty($aj_slider_images['slide0'])){
				echo '<i class="aj-remove-slide" data-id="#aj_slider_images0">X</i>';
				echo '<img src="'.$aj_slider_images['slide0'].'">';
			} ?>
		</div>
		<input type="hidden" name="aj_slider_images[slide0]" id="aj_slider_images0" class="meta-image regular-text" value="<?php echo !empty($aj_slider_images['slide0']) ? $aj_slider_images['slide0'] : ''; ?>">
		<input type="button" class="button image-upload" value="Choose Image">
	</div>
	<div class="aj_image ajslide1">
		<label for="aj_slider_images[1]">Slider Image2</label><br>
		<div class="image-preview">
			<?php
			if(!empty($aj_slider_images['slide1'])){
				echo '<i class="aj-remove-slide" data-id="#aj_slider_images1">X</i>';
				echo '<img src="'.$aj_slider_images['slide1'].'">';
			} ?>
		</div>
		<input type="hidden" name="aj_slider_images[slide1]" id="aj_slider_images1" class="meta-image regular-text" value="<?php echo !empty($aj_slider_images['slide1']) ? $aj_slider_images['slide1'] : ''; ?>">
		<input type="button" class="button image-upload" value="Choose Image">
	</div>
	<div class="aj_image ajslide2">
		<label for="aj_slider_images[2]]">Slider Image3</label><br>
		<div class="image-preview">
			<?php
			if(!empty($aj_slider_images['slide2'])){
				echo '<i class="aj-remove-slide" data-id="#aj_slider_images2">X</i>';
				echo '<img src="'.$aj_slider_images['slide2'].'">';
			} ?>
		</div>
		<input type="hidden" name="aj_slider_images[slide2]" id="aj_slider_images2" class="meta-image regular-text" value="<?php echo !empty($aj_slider_images['slide2']) ? $aj_slider_images['slide2'] : ''; ?>">
		<input type="button" class="button image-upload" value="Choose Image">
	</div>

	<?php
}

function load_admin_libs() {
    //wp_enqueue_media();
    wp_enqueue_script( 'wp-media-uploader', get_stylesheet_directory_uri() . '/js/wp_media_uploader.js');
}
add_action( 'admin_enqueue_scripts', 'load_admin_libs' );

/*
if(!empty($_GET['testdata'])){
	$argument = array(
				'posts_per_page'   => -1,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => 'job_listing',
				'post_status'      => 'publish',
				'fields'      => 'ids',
			);
 $property_post = get_posts($argument);

 foreach ( $property_post as $key => $value ) {

 	$_job_location = get_post_meta( $value, '_job_location', true);
 	$job_data = explode( ',', $_job_location);
 	if(!empty($job_data[0])){
 		$aj_streetaddress = trim($job_data[0]);

 		update_post_meta( $value, 'aj_streetaddress', $aj_streetaddress);
 	}
 	if(!empty($job_data[1])){
 		$aj_city = trim($job_data[1]);

 		update_post_meta( $value, 'aj_city', $aj_city);
 	}
 	if(!empty($job_data[2])){

 		$aj_state_details = trim($job_data[2]);
 		$job_data_state = explode( ' ', $aj_state_details);

 		if(!empty($job_data_state[0])){
 			$state = trim($job_data_state[0]);
 			update_post_meta( $value, 'aj_state', $state);
 		}
 		if(!empty($job_data_state[1])){
 			$aj_zip = trim($job_data_state[1]);
 			update_post_meta( $value, 'aj_zip', $aj_zip);
 		}
 	}

 }
 exit;
}*/


function aj_walk_score_single_page_html($atts,$output){
	global $post;
	$post_id = $post->ID;

    $_job_location = get_post_meta( $post_id, '_job_location', true );
    if(!empty($_job_location)){

    	$aj_lat_long = get_post_meta( $post_id, 'aj_lat_long', true );
    	$aj_walk_score_disable = get_post_meta( $post_id, 'aj_walk_score_disable', true );
    	$address = stripslashes($_job_location);

    	if(!empty($aj_lat_long['latitude']) && !empty($aj_lat_long['longitude']) && empty($aj_walk_score_disable)){
    		$json_response = getWalkScore($aj_lat_long['latitude'],$aj_lat_long['longitude'],$address);
    		if(!empty($json_response)){
				$json_response = json_decode($json_response);

				$walkscore = isset($json_response->walkscore) ? $json_response->walkscore : '-';
				$transit_score = isset($json_response->transit->score) ? $json_response->transit->score : '-';
				//$walkscore = !empty($json_response->status) ? $json_response->status : '';
				$listing_level_cls = '';
				$listing_level = wp_get_post_terms($post_id, 'listing_level',  array("fields" => "names"));
				$listing_level =  !empty($listing_level['0']) ? $listing_level['0'] : '';
				if(!empty($listing_level)){
					$listing_level_cls = strtolower($listing_level);
				}
				ob_start();
				?>
				<div class="aj-walkscore-single-wrap">
					<div class="premier aj-walkscore-single">
						<div class="job_listing-walkscore aj-single-list">
							<div class="walkscore-title">WalkScore</div>
							<div class="walkscore-desc"><?php echo $walkscore; ?></div>
						</div>
					</div>
					<div class="sponsored aj-walkscore-single transit">
						<div class="job_listing-walkscore aj-single-list">
							<div class="walkscore-title">TransitScore</div>
							<div class="walkscore-desc"><?php echo $transit_score; ?></div>
						</div>
					</div>
				</div>
				<?php
				$output .=ob_get_clean();
    		}
    	}

    }

	return $output;
}
add_shortcode( 'aj_walk_score_single_page', 'aj_walk_score_single_page_html' );

function admin_phone_override($fields){
	$field = array(
			'_phone_override' => array(
				'label'       => __( 'Phone Override', 'listify' ),
				'placeholder' => '',
				'description' => '<b>Instructions: </b> If this filed is filled out, this number will display on the site. For example, can be used to replace with extensions set up with Vontage.',
				'priority'    => 90,
			),
		);

		return array_slice( $fields, 0, 4, true ) + $field + array_slice( $fields, 4, null, true );
}
add_filter( 'job_manager_job_listing_data_fields', 'admin_phone_override' );


function aj_listify_the_listing_set_price( $post = null ){
	$post_id = get_post()->ID;
	$price_from = get_post_meta($post_id, '_price_from', true);
	$price_to = get_post_meta($post_id, '_price_to', true);
	$price_from = !empty($price_from)? $price_from : 0;
	$price_to = !empty($price_to)? $price_to : 0;
	echo '<div class="aj-sinlge-prices">$'.$price_from.' - $'. $price_to.'</div>';
}
add_action( 'single_job_listing_meta_start', 'aj_listify_the_listing_set_price', 15 );

function aj_featured_images_section_html( $attr, $content){

	ob_start();
	?>
	<aside id="listify_widget_taxonomy_image_grid-2" class="home-widget listify_widget_taxonomy_image_grid">
		<div class="home-widget-section-title">
			<h2 class="home-widget-title">What are you looking for?</h2>
		</div>
		<div class="row">
		<?php
		$aj_featured_settings = get_option('aj_featured_settings', true );
		if(!empty($aj_featured_settings)){
			foreach ( $aj_featured_settings as $key => $value ){
			?>
			<div id="image-grid-term-housing-available" class="col-12 col-sm-6 col-md-<?php echo !empty($value['width']) ? $value['width'] :'12' ?> image-grid-item">
				<div style="background-image: url(<?php echo !empty($value['title']) ? $value['image'] :'none' ?>);" class="entry-cover image-grid-cover has-image">
					<a href="<?php echo !empty($value['title']) ? $value['link'] :'' ?>" class="image-grid-clickbox"></a>
					<a href="<?php echo !empty($value['title']) ? $value['link'] :'' ?>" class="cover-wrapper"><?php echo !empty($value['title']) ? $value['title'] :'' ?></a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
		} ?>
	</aside>
	<?php
	$html = ob_get_clean();
	return $html.$content;
}
add_shortcode( 'aj_featured_images_section', 'aj_featured_images_section_html');
/**
 * Added Filter for gravity form work
 *
 * @param unknown_type $data
 * @param unknown_type $object
 * @return unknown
 */
function gform_form_tag_chek($data,$object){
	if(!empty($object['id']) && $object['id'] == '2'){
		$data = str_replace('/wp-admin/admin-ajax.php#gf_2', '/search/', $data);
	}
	return  $data;
}
add_filter( 'gform_form_tag', 'gform_form_tag_chek',99, 2 );
