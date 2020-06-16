<?php include "config.php"; ?>
 <?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$comment =  $_POST["comment"];
$approved =  $_POST["approved"];
$deleted =  $_POST["deleted"];
$id =  $_POST["id"];

	$body = "{ \"id\":".$id.",
 \"comment\":\"".$comment."\",
 \"approved\":".$approved.",
 \"del_ind\":".$deleted."}";
print_r($body);
$get_data = callAPI('POST', $baseurl.'/admin/updateReview',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>