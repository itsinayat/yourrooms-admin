

<?php
include "provider.php";
$file =$_FILES["fileToUpload"];
print_r( $file);
$hotelId =  $_POST["hotelId"];
$flag =  $_POST["flag"];
echo $hotelId;


$data = array(
    'id' => $hotelId,
    'files' => curl_file_create($file['tmp_name'], $file['type'], $file['name']),
	'flag' => $flag
);



$get_data = uploadFile('http://localhost:8080/admin/uploadMultipleFiles',$data,"eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJpbmF5YXQxIiwiY3JlYXRlZCI6MTU5MTcxMTgxMjMyNiwiZXhwIjoxNTkyMzE2NjEyfQ.p_XzzJlS9z6rOlipRnx7AO8gHPz8V0KofYT8o6FbEyQEBWLJcL_qyDsTfz5tnixbA5PwabGGIi7UsSAw6b1AXg");
print_r($get_data);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>