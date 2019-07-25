<?php 

$sdate = '2019-06-15';
$edate=date("Y-m-d");
function analyticsui() {


$basicauth = "Token token=41d258a43c6fb6dcdaba95ab607382c7" ;
$url = 'https://showmojo.com/api/v3/reports/detailed_prospect_data';
$headers = array('Authorization' => $basicauth);
$sdate = '2019-06-15';
$edate=date("Y-m-d");

if(isset($_GET['syndicateListDataStart'])&& isset($_GET['syndicateListDataEnd'])){
    $sdate =$_GET['syndicateListDataStart'];
    $edate =$_GET['syndicateListDataEnd'];
   
    }

$requestParam = array(
    'method'      => 'POST',
    'timeout'     => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => $headers,
    	'body'        => array(
        'start_date' =>  $sdate,
        'end_date' =>   $edate
    ),
    'cookies'     => array()
    );
    
$response = wp_remote_post( $url, $requestParam
);
//print_r($requestParam);
if ( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    echo 'Something went wrong: $error_message';
} else {
 $responseData = json_decode(wp_remote_retrieve_body($response), 1);
 //print_r($responseData);
 ?>
 <div class='wpjms-date-range-field'>
	
			<div class="filter-wrapper">
					<form method="get">
						<label>Filter:</label>
						<input type='text' value="<?php echo $_GET['syndicate_list_data-range']; ?>" name='syndicate_list_data-range' autocomplete='off' placeholder="Filter by date">
						<input hidden type='text' name='syndicateListDataStart'  value="<?php echo $_GET['syndicateListDataStart']; ?>"   autocomplete='off' placeholder="Filter by date">
						<input hidden type='text' name='syndicateListDataEnd'   value="<?php echo $_GET['syndicateListDataEnd']; ?>" autocomplete='off' placeholder="Filter by date">
						<input type="submit" value="Filter">
					</form>
				</div>
		</div>
 <table id='syndicatedleadsTable'class="leads_table tablesorter tablesorter-green" style='width:100%'>
 <thead>
  <tr>
   <?php  foreach($responseData['response']['data'][0] as $key=>$value): ?>
            <th><?php echo $key; ?></th>
  <?php endforeach;?>
  </tr>
 </thead>
 <tbody>

<?php  foreach($responseData['response']['data'] as $results): ?>
        <tr>
  <?php  foreach($results as $key=>$value): ?>
            <td><?php echo $value; ?></td>
  <?php endforeach;?>
        </tr>
<?php endforeach;?>
</tbody>

</table>
<?php
}
}
add_shortcode( 'syndicate_leads_list', 'analyticsui' );


function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style('analytics','//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' );
    wp_enqueue_style('style2', $plugin_url . 'analyticstable.css' );
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

add_action( 'wp_footer', function() {
$ajaxUrl = admin_url( 'admin-ajax.php' );

?>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.js"></script>
<script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
<script src='http://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='http://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js'></script>
<script type="text/javascript" src="https://lbkapts.com/wp-content/plugins/laa-functions/includes//assets/js/moment.min.js"></script>
<script type="text/javascript" src="https://lbkapts.com/wp-content/plugins/laa-functions/includes//assets/js/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://lbkapts.com/wp-content/plugins/laa-functions/includes//assets/css/daterangepicker.css" media="screen">
<script>
jQuery( document ).ready(function(){
    refresh_datatable();

});
jQuery( document ).ready( function( $ ){

	/* Date Range Picker
	------------------------------------------ */

 jQuery('input[name="syndicate_list_data-range"]').daterangepicker({
      autoApply: true,
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  jQuery('input[name="syndicate_list_data-range"]').on('apply.daterangepicker', function(ev, picker) {
      jQuery(this).val(picker.startDate.format('YYYY-MM-DD') + ' To ' + picker.endDate.format('YYYY-MM-DD'));
      jQuery('input[name="syndicateListDataStart"]').val(picker.startDate.format('YYYY-MM-DD'));
      jQuery('input[name="syndicateListDataEnd"]').val(picker.endDate.format('YYYY-MM-DD'));
      });

  jQuery('input[name="syndicate_list_data-range"]').on('cancel.daterangepicker', function(ev, picker) {
      jQuery(this).val('');
  });

});

function refresh_datatable(){
       jQuery('#syndicatedleadsTable').DataTable( {
	         destroy: true,
		     dom: 'Bfrtip',
             buttons: [
                {
                  extend: 'csv',
                  text: 'Export CSV',
                  className: 'CSV',
                  filename: 'CSV',
                  exportOptions: {
                    modifier: {
                      page: 'all'}
              }
            } ],
        language: {
        searchPlaceholder: "Search records"
    }
    } );
    }
</script>
<?php

}, 100 );

?>