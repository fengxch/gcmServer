<?php
//get post json
$data = json_decode(file_get_contents('php://input'), true);

//handle the json
$string = file_get_contents("deviceid.json"); 
$json_a = json_decode($string, true);

$deviceid = $data["deviceid"];
//if(array_key_exists($deviceid, $json_a)) {
    $json_a[$deviceid]=array(
                'name'  => $data["name"],
                'itemids'  $data["itemids"]
                );
//}else{
	
//}

$handle = fopen("deviceid.json", "w");
fwrite($handle,json_encode($json_a));
fclose($handle);

header('Content-Type: application/json');
echo json_encode($json_a);

?>