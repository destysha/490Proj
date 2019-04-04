<?php

	session_start();
require ('../rabbitMQFiles/testRabbitMQClient.php');
$username = $_SESSION ['username'];

/////Getting all info related to users account based on whos logged in ..session///////

$res = info($username);
	$ans = array();
	foreach ($res as $i)
	{
//		echo"<br>".$i."<br>";
		array_push($ans,$i);
	}
	$bID = $ans[0];
	$user = $ans[1]; 
	$bzname =$ans[2]; 
	$street = $ans[3];  
	$city = $ans[4]; 
	$state = $ans[5]; 
	$zipcode = $ans[6]; 

/*	$email = $ans[7];

$listB = binv($username);
	$inv = array();
	foreach($listB as $i)
	{
		echo"** ".$i."  ^^".PHP_EOL;
		array_push($inv,$i);
		//foreach($i as $l)
		//{
		//	array_push($inv,$s);
		//	echo"B   ".$s."     E".PHP_EOL;
		//}	
	}
	echo" --invList done --"PHP_EOL;

 */
?>
