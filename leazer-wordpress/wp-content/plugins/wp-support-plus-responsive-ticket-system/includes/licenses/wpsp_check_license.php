<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$cu = wp_get_current_user();
if (!$cu->has_cap('manage_options')) exit; // Exit if current user is not admin

$license = sanitize_text_field($_POST[ 'license']);
$item_id = sanitize_text_field($_POST[ 'item_id']);
			
// data to send in our API request
$api_params = array( 
        'edd_action'=> 'check_license', 
        'license'   => $license, 
        'item_id'   => $item_id,
        'url'       => home_url()
);

// Call the custom API.
$response = wp_remote_post( WPSP_STORE_URL, array(
        'timeout'   => 15,
        'sslverify' => false,
        'body'      => $api_params
) );
// make sure the response came back okay
if ( is_wp_error( $response ) ){
    echo "License check failed!";
} else {
    $license_data = json_decode( wp_remote_retrieve_body( $response ) );
    if($license_data->success){
        if($license_data->license=='valid'){
            ?>
            <div style="color: green;">Active</div><br>
            <div>Expires: <?php echo date('F d, Y',strtotime($license_data->expires));?>.</div>
            <?php
        } else {
            ?>
            <div style="color: red;">Expired</div><br>
            <div>Expired on: <?php echo date('F d, Y',strtotime($license_data->expires));?>.</div>
            <?php
        }
    } else {
        echo "License check failed!";
    }
}
?>