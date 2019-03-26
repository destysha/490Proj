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

function notification($email, $product){
        global $db;
        $pull2 = "SELECT * FROM inventory";
        $pull = "SELECT * FROM json";
        $val = mysqli_query($ishopdb, $pull, $pull2) or die (mysqli_error($ishopdb));
        $num = mysqli_num_row($val);
        while ($r = mysqli_feth_array($val, MYSQLI_ASSOC)){
                $pd     = $r['product_description'];
                $pdn    = $r['product'];

                $pc     = $r['postal_code'];
                $zip    = $r['zipcode'];

                $rf     = $r['recalling_firm'];
                $br     = $r['brand'];

                if($zip == $pc){
                        if($pdn == $pd){
                                if($br == $rf){
                                        return 1;
                                }
                        }

                        else{
                                return 0;
                        }
                }
                else{
                        return 0;
                }
        }
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
	case "validate_session":
		return doValidate($request['sessionId']);
	}
	return array("returnCode" =>'0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();

?>
