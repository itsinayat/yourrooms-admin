
<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php
include "provider.php";
$file =$_FILES["fileToUpload"];
$hotelId =  $_POST["hotelId"];
$flag =  $_POST["flag"];


$data = array(
    'id' => $hotelId,
    'files' => curl_file_create($file['tmp_name'], $file['type'], $file['name']),
	'flag' => $flag
);

$get_data = uploadFile('http://localhost:8080/admin/uploadMultipleFiles',$data,$_SESSION["token"]);
header('Location: ' . $_SERVER['HTTP_REFERER']);	

?>