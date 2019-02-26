<?php

class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("127.0.0.1","user1","user1pass","test");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from testTable where username = '$un'";
	$response = $this->logindb->query($statement);

	while ($row = $response->fetch_assoc())
	{
		//verifying user existance
		print "\n\nVerifying if user $un is in database...\n";
		if ($row["username"] == $un)
		{
			print "$un is in database.";
			
		}
		else
		{
			print "$un is not in database.";
		}


		//echo "passwords did not match for $username".PHP_EOL;
		echo "\n\nChecking password for $username...".PHP_EOL;
		if ($row["password"] == $pw)
		{
			echo "Password match for $username".PHP_EOL;
			return 1;// password match
		}
		echo "Password did not match for $username".PHP_EOL;
	}
	return 0;//no users matched username
}
}
?>
