<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php

include "provider.php";
$key =  $_GET["key"];
echo $key;
$get_data = callAPI('GET', 'http://localhost:8080/admin/deleteConfig/'.$key.'',false,$_SESSION["token"]);
$response = json_decode($get_data);
if($response->{'message'} == "SUCCESS"){
header('Location: ' . $_SERVER['HTTP_REFERER']);	
}else{
	print_r($get_data);
}

?>