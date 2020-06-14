<?php include "config.php"; ?>
 <?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$code =  $_POST["code"];
$value =  $_POST["value"];
$enabled =  $_POST["enabled"];
$expiry =  $_POST["expiry"];
if(isset($_POST["id"])){
	$id =  $_POST["id"];
	$body = "{ \"id\":".$id.",
 \"code\":\"".$code."\",
 \"value\":".$value.",
 \"expiry\":\"".$expiry."\",
 \"enabled\":".$enabled."}";
}else{
	$body = "{ \"code\":\"".$code."\",
 \"value\":".$value.",
 \"expiry\":\"".$expiry."\",
 \"enabled\":".$enabled."}";
}


$get_data = callAPI('POST', $baseurl.'/admin/addUpdateNewCoupon',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>