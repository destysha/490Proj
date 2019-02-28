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
	
		print "\n\nSuccessfully connected to database".PHP_EOL;
		print "\n\nWait a moment until username and password are verified...\n\n";
		sleep(4);
	}

	public function validateLogin($username,$password)
	{
		$un = $this->logindb->real_escape_string($username);
		$pw = $this->logindb->real_escape_string($password);
		$statement = "select * from testTable where username = '$un'";
		$response = $this->logindb->query($statement);
	
		print "\n\nChecking...\n\n";

		while ($row = $response->fetch_assoc())
		{
			//verifying user existance
			print "\n\nVerifying if user $un is in database...\n";
			sleep(3);
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
			sleep(3);
			if ($row["password"] == $pw)
			{
				echo "Password match for $username".PHP_EOL;
				return 1;// password match
			}
			echo "Password did not match for $username".PHP_EOL;
		}
	
		echo "Login failed.\n"; 
		print "Please wait a moment to try again...";

		return 0;//no users matched username
	}
}
?>
