<?php include "config.php"; ?>
 <?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$role =  $_POST["role"];
$del_ind =  $_POST["deleted"];
$enabled =  $_POST["enabled"];
$is_verified =  $_POST["verified"];
$id =  $_POST["id"];

$body = "{ \"id\":".$id.",
 \"role\":\"".$role."\",
 \"del_ind\":".$del_ind.",
 \"enabled\":".$enabled.",
 \"is_verified\":".$is_verified."}";

$get_data = callAPI('POST', $baseurl.'/admin/updateProfileById',$body,$_SESSION["token"]);
$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}

?>