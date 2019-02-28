<?php
	session_start();
	#contains login client function
	require ('../rabbitMQFiles/testRabbitMQClient.php'); 
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$response = login ( $username, $password );
	
	print  "I AM HERE";
	
	#successful login
	if ( $response != false ) 
	{
		header  ( 'location:../loginOK.html' );
	}
	
	else
	{
		header  ( 'location:../index.html' );
	}
	
?>
