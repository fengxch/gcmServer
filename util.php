<?php
function getDeviceids()
{
	$string = file_get_contents("deviceid.json"); 
	$json_a = json_decode($string, true); 
	$result='';
	foreach($json_a->entries as $row){
		foreach($row as $key => $val)
		{
			$result.$key.',';
		}
	}
	echo $result;
}
?>