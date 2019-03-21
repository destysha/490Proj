#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function doLogin($username,$password)
{
	//get username password
	( $db = mysqli_connect ('127.0.0.1','user1','user1pass','test') );
	
	if(mysqli_connect_errno())
	{
		echo "failed to connect".mysqli_connect_error();
	}
	echo "Successfully connected to db";
	mysqli_select_db($db,'test');
	$query = "SELECT * FROM testTable WHERE username = '$username' and password = '$password'";
	($do = mysqli_query ($db,$query)) or die(mysqli_error($db));
	$number = mysqli_num_rows($do);
	if ($number ==1)
	{
		echo "\n you can go sign in \n";
		return true;
	}else
	{
		echo "\n Sorry try again\n";
		return false;
	}
	
}	

/*
function doRegister($username,$password)
{
	$register = new loginDB();
	return $register->validateRegister($username,$password);
}
*/
function requestProcessor($request)
{
  	echo "received request".PHP_EOL;
	var_dump($request);

  	if(!isset($request['type']))
  	{
    	 return "ERROR: unsupported message type";
 	}
  	switch ($request['type'])
  	{
    	case "login":
      		return doLogin($request['username'],$request['password']);
	case "register":
		return doRegister($request['username'],$request['password']);
	
	}
	return array("returnCode" =>'0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "Server3.php Begin".PHP_EOL;
$server->process_requests('requestProcessor');
echo "Server3.php End".PHP_EOL;
exit();

?>
