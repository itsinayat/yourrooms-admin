<?php
include "provider.php";
$id =  $_POST["hotelId"];
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
echo $body;
$get_data = callAPI('POST', 'http://localhost:8080/admin/add-or-update-hotel',$body,"eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJpbmF5YXQxIiwiY3JlYXRlZCI6MTU5MTcxMTgxMjMyNiwiZXhwIjoxNTkyMzE2NjEyfQ.p_XzzJlS9z6rOlipRnx7AO8gHPz8V0KofYT8o6FbEyQEBWLJcL_qyDsTfz5tnixbA5PwabGGIi7UsSAw6b1AXg");
print_r($get_data);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>