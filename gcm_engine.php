<?php
include('util.php');

// Message to be sent
$message = $_POST['message'];
if(is_null($message)){
	$data = json_decode(file_get_contents('php://input'), true);
	if(is_null($data["message"])){
		echo "empty return";
		return;
	}else{
		$message = $data["message"];
	}
}
var_dump($message);
// Set POST variables
$url = 'https://android.googleapis.com/gcm/send';
$myArray;
if (empty($_POST['registrationIDs'])) {
	$myArray = explode(',', getDeviceids());
}else{
	$myArray = explode(',', $_POST['registrationIDs']);
}
var_dump($myArray);
$apikey;
if(empty($_POST['apiKey'])){
	$apikey="AIzaSyA6-o89WI-spluhoANDfoC3fD7iZwzDRWc";
}else{
	$apikey=$_POST['apiKey'];
}
//echo "array0".$myArray[0];
//echo "array1".$myArray[1];
$fields = array(
                'registration_ids'  => $myArray,
                'data'              => array( "message" => $message ),
                );

$headers = array( 
                    'Authorization: key=' . $apikey,
                    'Content-Type: application/json'
                );

// Open connection
$ch = curl_init();

// Set the url, number of POST vars, POST data
curl_setopt( $ch, CURLOPT_URL, $url );

curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

// Execute post
$result = curl_exec($ch);

// Close connection
curl_close($ch);

echo $result;

?>