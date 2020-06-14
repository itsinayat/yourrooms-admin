<?php include "config.php"; ?>
<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php
include "provider.php";
$id =  $_GET["id"];

$body = "{ \"id\":".$id."}";

$get_data = callAPI('POST', $baseurl.'/hotel/cancelBooking',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'statusCode'} == "200"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>