

<?php
include "provider.php";
$staffId = $_POST['users'];  
$HotelId =  $_POST["hotelId"];
$body = "{ \"hotelId\":\"".$HotelId."\", \"staff\" :[".$staffId."]}";
echo $body;
$get_data = callAPI('POST', 'http://localhost:8080/admin/add-staff-to-hotel',$body,"eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJpbmF5YXQxIiwiY3JlYXRlZCI6MTU5MTcxMTgxMjMyNiwiZXhwIjoxNTkyMzE2NjEyfQ.p_XzzJlS9z6rOlipRnx7AO8gHPz8V0KofYT8o6FbEyQEBWLJcL_qyDsTfz5tnixbA5PwabGGIi7UsSAw6b1AXg");
print_r($get_data);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>