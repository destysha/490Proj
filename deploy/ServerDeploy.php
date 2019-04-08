#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function insertV($machine,$version,$packageName)
{
	$db = new  mysqli("localhost","user1","user1pass","deploy");
	
	$date = time();
	echo "inserting new version into table";
	$query = "INSERT INTO deployTable (date,type,version,packageName,status) VALUES('$date','$machine','$version','$packageName','pending')";
	
	$db->query($query); 
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
	
	case "newPackage":
		return insertV($request['machine'],$request['version'],$request['packageName']);
	return array("returnCode" =>'0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>
