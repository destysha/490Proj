<?php
session_start();
require('../rabbitMQFiles/testRabbitMQClient.php'); #will have register client function

$username = $_POST['usernamesignup'];
$street = $_POST['streetsignup']; 
$city = $_POST['citysignup'];
$state = $_POST['statesignup'];
$email = $_POST['emailsignup'];
$password = $_POST['passwordsignup_confirm'];
$response = register($username,$street,$city,$state,$email,$password);

if($response != false){ #account was registered successfully
	echo"Created User successfully!!";

}
else{
	echo"Sorry username already exists";
}
?>
