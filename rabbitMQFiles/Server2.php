#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login2.php.inc');

function doLogin($username,$password)
{
	//get username password
	
	$login = new loginDB();
	return  $login->validateLogin($username,$password);
	//return flase if not valid
}	


function doRegister($username,$bzname,$street,$city,$state,$zipcode,$email,$password)
{
	$register = new loginDB();
	return $register->validateRegister($username,$bzname,$street,$city,$state,$zipcode,$email,$password);
}

function doInfo($username)
{
	$info = new loginDB();
	return $info->getInfo($username);
}

function getInv($username,$sql)
{
	$db = mysqli_connect("localhost","user1","user1pass","ishopdb");
	$runQ = mysqli_query($db,$sql);
	$queryBack = mysqli_num_rows($runQ);

	if ($queryBack > 0 )
	{
		while($row = mysqli_fetch_assoc($runQ))
		{
			$temp[] = $row;
		}
		print_r($temp);
		return $temp;
	}
//	$inv = new loginDB();
//        return $inv->getinvB($username);
}


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
		return doRegister($request['username'],$request['bzname'],$request['street'],$request['city'],$request['state'],$request['zipcode'],$request['email'],$request['password']);
	
	case "info":
		return doInfo($request['username']);
	case "inv":
                return getInv($request['username'],$request['sql']);
	case "validate_session":
		return doValidate($request['sessionId']);
	}
	return array("returnCode" =>'0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>
