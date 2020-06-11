

<?php
include "provider.php";
$username = $_POST['username'];  
$password =  $_POST["password"];
$body = "{ \"username\":\"".$username."\", \"password\" :\"".$password."\"}";
echo $body;
$get_data = callAPI('POST', 'http://localhost:8080/user/login',$body,null);
$response = json_decode($get_data);
print_r($get_data);
if($response->{'statusCode'}==401){
	setcookie('loginError', $response->{'message'}, time() + 1);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
	if($response->{'data'}[0]->{'role'} != 'ROLE_SUPERADMIN'){
		setcookie('loginError', 'UNAUTORIZED ACCESS', time() + 1);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		$token =  $response->{'data'}[0]->{'tokenKey'};
		session_start();
		$_SESSION["token"] = $token ;
		header('Location: dashboard.php');
	}
}
?>