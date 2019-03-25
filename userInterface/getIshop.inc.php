<?php
	 session_start();
        #contains login client function
        require ('../rabbitMQFiles/testRabbitMQClient.php');

	$username = $_SESSION['username'];
	$inventory = "ishop";
	$response = inventory();
?>
