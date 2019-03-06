#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function loginUser($username, $password)
{
	//set up database
	$host = 'localhost';
	$user = 'user1';
	$pw = 'user1pass';
	$db = 'test';
	$mysqli = new mysqli($host, $user, $pw, $db);
	if ($mysqli->connect_error)
	{
		echo "DB CONNECT ERROR".PHP_EOL;
		 die('Connect Error, '.$mysqli->connect_errno.':
' . $mysqli->connect_error);

	}
	
	$un = $mysqli->escape_string($username);
	$pass = $mysqli->escape_string($password);
	
        $query = "select * from testTable where username = '$un' and password = '$pass'";
        $response = $mysqli->query($query);
        while ($row = $response->fetch_assoc())
        {
                echo "checking password for $username".PHP_EOL;
                if ($row["password"] == $pass)
                {
			echo "passwords match for $username".PHP_EOL;

                }
                echo "passwords did not match for $username".PHP_EOL;
        }
        return false;//no users matched username
}
function regUser($username, $password)
{
	//set up database
        $host = 'localhost';
        $user = 'user1';
        $pw = 'user1pass';
        $db = 'testdb';
	$mysqli = new mysqli($host, $user, $pw, $db);
	if ($mysqli->connect_error)
        {
                echo "DB CONNECT ERROR".PHP_EOL;
                die('Connect Error, '.$mysqli->connect_errno.':
' . $mysqli->connect_error);
        }
        $un = $mysqli->escape_string($username);
	$pass = $mysqli->escape_string($password);

        $query = "select * from testTable where username = '$un'";
	$response = $mysqli->query($query);
	if( $response->num_rows == 0)#account doesn't exist already, createone
	{
		$query="INSERT INTO testTable values('$un','$pass')";
		$mysqli->query($query) or die($mysqli->error);
		echo "Account created successfully".PHP_EOL;
		echo "passwords match for $username".PHP_EOL;
		
	}
	else #account already exists
	{
		echo "Account already exists you're beat".PHP_EOL;
		return false;
	}
}

?>

