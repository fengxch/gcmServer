<?php
function getDeviceids()
{
	$string = file_get_contents("deviceid.json");
	$json_a = json_decode($string, true);
	$result='';
	foreach($json_a as $key=>$val){
		$result.=$key.",";
	}
	$result = mb_substr($result, 0, -1);
	echo $result;
}
//getDeviceids();
?>