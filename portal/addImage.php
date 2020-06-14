<?php include "config.php"; ?>
<?php 

session_start();
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php
include "provider.php";
$file =$_FILES["fileToUpload"];
$id =  $_POST["id"];
$flag =  $_POST["flag"];


$data = array(
    'id' => $id,
    'files' => curl_file_create($file['tmp_name'], $file['type'], $file['name']),
	'flag' => $flag
);

$get_data = uploadFile($baseurl.'/admin/uploadMultipleFiles',$data,$_SESSION["token"]);
header('Location: ' . $_SERVER['HTTP_REFERER']);	

?>