<?php include "config.php"; ?>
 <?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login.php');
} ?>
<?php

include "provider.php";

if(isset($_POST["roomId"])){
$id =  $_POST["roomId"];	
}

$hotelId =  $_POST["hotelId"];
$name =  $_POST["name"];
$freeCancellation =  $_POST["freeCancellation"];
$balconyAvl =  $_POST["balconyAvl"];
$doubleBed =  $_POST["doubleBed"];
$occupacy =  $_POST["occupacy"];
$roomSize =  $_POST["roomSize"];
$roomType =  $_POST["roomType"];
$initialPrice =  $_POST["initialPrice"];
$discountPrice =  $_POST["discountPrice"];
if(isset($_POST["reserved"])){
	$reserved =  $_POST["reserved"];
}

if(isset($_POST["disabled"])){
	$disabled =  $_POST["disabled"];
}


if(isset($_POST["roomId"])){
	//update
$body = "{ \"id\":".$id.",
 \"hotelId\":".$hotelId.",
 \"name\":\"".$name."\",
 \"freeCancellation\":".$freeCancellation.",
 \"balconyAvl\":".$balconyAvl.",
 \"doubleBed\":".$doubleBed.",
  \"disabled\":".$disabled.",
  \"occupacy\":\"".$occupacy."\",
 \"roomSize\":\"".$roomSize."\",
 \"roomType\":\"".$roomType."\",
 \"initialPrice\" :\"".$initialPrice."\",
 \"discountPrice\":\"".$discountPrice."\",
 \"reserved\":".$reserved." }";
}else{
	//create
$body = "{ \"hotelId\":".$hotelId.",
 \"name\":\"".$name."\",
 \"freeCancellation\":".$freeCancellation.",
 \"balconyAvl\":".$balconyAvl.",
 \"doubleBed\":".$doubleBed.",
  \"occupacy\":\"".$occupacy."\",
 \"roomSize\":\"".$roomSize."\",
 \"roomType\":\"".$roomType."\",
 \"initialPrice\" :\"".$initialPrice."\",
 \"discountPrice\":\"".$discountPrice."\" }";
}
print_r($body);
$get_data = callAPI('POST', $baseurl.'/admin/add-or-update-rooms-to-hotel',$body,$_SESSION["token"]);

$response = json_decode($get_data);
if($response->{'statusCode'} == "432"){
header('Location: index.php?tab=update_hotel&id='.$hotelId);	
}else{
	print_r($get_data);
}
?>