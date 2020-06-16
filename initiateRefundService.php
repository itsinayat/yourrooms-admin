<?php include "config.php"; ?>
<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login.php');
} ?>

<?php
include "provider.php";
$bookingId =     $_POST["bookingId"];
$refundAmount =  $_POST["refundAmount"];

$body = "{ \"bookingId\":".$bookingId.",\"refundAmount\":".$refundAmount."}";

$get_data = callAPI('POST', $baseurl.'/payment/initiateRefund',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'statusCode'} == "200"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>