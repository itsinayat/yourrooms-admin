<?php include "config.php"; ?>
<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login.php');
} ?>
<?php
include "provider.php";
$id =  $_GET["id"];

$body = "{ \"id\":".$id.",
 \"bookingStatus\":\"".$bookingStatus."\",
 \"checkinStatus\":\"".$checkinStatus."\",
 \"checkoutStatus\":\"".$checkoutStatus."\",
 \"paymentStatus\":\"".$paymentStatus."\"}";

$get_data = callAPI('POST', $baseurl.'/hotel/update-booking',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>