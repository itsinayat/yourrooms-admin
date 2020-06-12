<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$HotelId =  $_GET["hotelId"];
$StaffId =  $_GET["staffId"];

$body = "{ \"hotelId\":\"".$HotelId."\", \"staff\" :[".$StaffId."]}";
echo $body;
$get_data = callAPI('POST', 'http://localhost:8080/admin/remove-staff-from-hotel',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>