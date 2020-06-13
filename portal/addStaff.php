<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>

<?php
include "provider.php";
$staffId = $_POST['users'];  
$HotelId =  $_POST["hotelId"];
$body = "{ \"hotelId\":\"".$HotelId."\", \"staff\" :[".$staffId."]}";
echo $body;
$get_data = callAPI('POST', 'http://localhost:8080/admin/add-staff-to-hotel',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>