<?php
session_start();
require('../rabbitMQFiles/testRabbitMQClient.php'); #will have register client function

$logs = array();


$username = $_POST['usernamesignup'];
$street = $_POST['streetsignup']; 
$city = $_POST['citysignup'];
$state = $_POST['statesignup'];
$email = $_POST['emailsignup'];
$password1 = $_POST['passwordsignup'];
$password = $_POST['passwordsignup_confirm'];
$response = register($username,$street,$city,$state,$email,$password);


	if($response != false){ #account was registered successfully
		$_SESSION['success'] = "Registered";
		$_SESSION['username'] = $username;
		array_push($logs,"Register->"."User:".$username." "."Password:".$password);	
		echo"Created User successfully!!";
	}
	else{
	
		echo"Sorry username already exists";
	}
	
?>
