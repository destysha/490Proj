<?php
	session_start();
	#contains login client function
	require ('../rabbitMQFiles/testRabbitMQClient.php'); 
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$response = login ( $username, $password );
	
	$logs = array();

	#successful login
	if ( $response != false ) 
	{
		array_push($logs,$username,$password) ;
	header  ( 'location:../loginOK.html' );
	require("successF.php");
		
	}
	
	else
	{
		array_push($logs,$username,$password);
		header  ( 'location:../index.php' );
		require("errorF.php");
	}
?>
