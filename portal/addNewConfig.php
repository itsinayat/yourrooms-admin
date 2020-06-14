<?php include "config.php"; ?>
<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$key =  $_POST["key"];
$value =  $_POST["value"];



$body = "{ \"key\":\"".$key."\",
 \"value\":\"".$value."\"}";

$get_data = callAPI('POST', $baseurl.'/admin/addNewConfig',$body,$_SESSION["token"]);
$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}

?>