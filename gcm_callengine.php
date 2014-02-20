<?php
include('util.php');

//get post json
$data = json_decode(file_get_contents('php://input'), true);

$apikey="AIzaSyA6-o89WI-spluhoANDfoC3fD7iZwzDRWc";
$message=$data["message"];
$deviceids=getDeviceids();
$post="apiKey=".$apikey."&registrationIDs=".$deviceids."&message=".$message;
var_dump($post);

echo json_encode(array('result' => request_by_other("gcm_engine.php", $post)));


/**
 * file_get_contents版本
 * 使用方法：
 * $post_string = "app=request&version=beta";
 * request_by_other('http://facebook.cn/restServer.php',$post_string);
 */
function request_by_other($remote_server,$post_string){
	$context = array(
			'http'=>array(
					'method'=>'POST',
					'header'=>'Content-type: application/x-www-form-urlencoded'."\r\n".
					'User-Agent : Jimmy\’s POST Example beta'."\r\n".
					'Content-length: '.strlen($post_string)+8,
					'content'=>'mypost='.$post_string)
	);
	$stream_context = stream_context_create($context);
	$data = file_get_contents($remote_server,FALSE,$stream_context);
	return $data;
}

?>