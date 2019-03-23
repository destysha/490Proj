<?php
	session_start();
	#contains login client function
	require ('../rabbitMQFiles/testRabbitMQClient.php'); 
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$response = login ( $username, $password );
	
	
	#successful login
	if ( $response != false ) 
	{
		header  ( 'location:../loginOK.html' );
		require("successF.php");
	}
	
	else
	{
		header  ( 'location:../index.html' );
		require("errorF.php");
	}
?>
