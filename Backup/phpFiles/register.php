<?php
session_start();
require('../rabbitMQFiles/testRabbitMQClient.php'); #will have register client function

$username = $_POST['usernamesignup'];
$password = $_POST['passwordsignup'];
$response = register($username,$password);

if($response != false){ #account was registered successfully
	echo"Created User successfully!!";

}
else{
	echo"Sorry username already exists";
}
?>
