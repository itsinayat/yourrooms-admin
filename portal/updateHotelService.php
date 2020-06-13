<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$name =  $_POST["name"];
$address =  $_POST["address"];
$city =  $_POST["city"];
$pincode =  $_POST["pincode"];
$lattitude =  $_POST["lattitude"];
$longitude =  $_POST["longitude"];
$payathotel =  $_POST["payathotel"];
$freeBreakFast =  $_POST["freeBreakFast"];
$coupleFriendly =  $_POST["coupleFriendly"];
$freeWifi =  $_POST["freeWifi"];
$ac =  $_POST["ac"];
$isBlocked =  $_POST["isBlocked"];

if(isset($_POST["hotelId"])){
$id =  $_POST["hotelId"];
$body = "{ \"hotelName\":\"".$name."\",
 \"address\":\"".$address."\",
 \"lattitude\":\"".$lattitude."\",
 \"longitude\":\"".$longitude."\",
 \"payAtHotel\":".$payathotel.",
 \"freeBreakFast\":".$freeBreakFast.",
 \"id\":".$id.",
  \"isBlocked\":".$isBlocked.",
 \"coupleFriendly\":".$coupleFriendly.",
 \"freeWifi\":".$freeWifi.",
 \"city\" :\"".$city."\",
 \"pincode\":\"".$pincode."\",
 \"ac\":".$ac." }";
}else{
	$body = "{ \"hotelName\":\"".$name."\",
 \"address\":\"".$address."\",
 \"lattitude\":\"".$lattitude."\",
 \"longitude\":\"".$longitude."\",
 \"payAtHotel\":".$payathotel.",
 \"freeBreakFast\":".$freeBreakFast.",
  \"isBlocked\":".$isBlocked.",
 \"coupleFriendly\":".$coupleFriendly.",
 \"freeWifi\":".$freeWifi.",
 \"city\" :\"".$city."\",
 \"pincode\":\"".$pincode."\",
 \"ac\":".$ac." }";
}

$get_data = callAPI('POST', 'http://localhost:8080/admin/add-or-update-hotel',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}
?>