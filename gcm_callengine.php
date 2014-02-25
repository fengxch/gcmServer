<?php
include('util.php');

//get post json
$data = json_decode(file_get_contents('php://input'), true);

$apikey="AIzaSyA6-o89WI-spluhoANDfoC3fD7iZwzDRWc";
$message=$data["message"];
$deviceids=getDeviceids();
$post="apiKey=".$apikey."&registrationIDs=".$deviceids."&message=".$message;
var_dump($post);

$domain = $_SERVER['HTTP_HOST'];
$prefix = $_SERVER['HTTPS'] ? 'https://' : 'http://';
$relative = '/gcmServer/gcm_engine.php';
var_dump($prefix.$domain.$relative);
echo json_encode(array('result' => request_by_other($prefix.$domain.$relative, $post)));


/**
* Curl版本
* 使用方法：
* $post_string = "app=request&version=beta";
* request_by_curl('http://facebook.cn/restServer.php',$post_string);
*/
function request_by_curl($remote_server,$post_string){
   $ch = curl_init();
   curl_setopt($ch,CURLOPT_URL,$remote_server);
   curl_setopt($ch,CURLOPT_POSTFIELDS,$post_string);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
   $data = curl_exec($ch);
   curl_close($ch);
   return $data;
}

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