<?php
require_once('loader.php');

// return json response 
$json = array();

$nameUser  = $_POST["name"];
$emailTracked = $_POST["email"];
$gcmRegID  = $_POST["regId"]; // GCM Registration ID got from device

/**
 * Registering a user device in database
 * Store reg id in users table
 */
if (isset($nameUser) && isset($emailTracked) && isset($gcmRegID)) {
    
	// Store user details in db
    $res = storeUser($nameUser, $emailTracked, $gcmRegID);

    $registatoin_ids = array($gcmRegID);
    $message = array("product" => "shirt");

    $result = send_push_notification($registatoin_ids, $message);

    echo $result;
} else {
    // user details not found
}
?>