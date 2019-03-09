<?php

class loginDB
{ //open class bracket
private $logindb;

	public function __construct()
	{//open _construct bracket
		$this->logindb = new mysqli("localhost","user1","user1pass","test");

		if($this->logindb->connect_errno !=0)
		{//open if bracket
			echo "error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
			exit(1);
		}//close if bracket
		echo "correctly connected to database".PHP_EOL;
	}//close _construct bracket	

	
	public function validateLogin($username,$password)
	{//open validateLogin bracket
		$uname = $this->logindb->real_escape_string($username);
		$pass = $this->logindb->real_escape_string($password);
		$statement = "SELECT * FROM testTable WHERE username = '$uname' and password = '$pass' ";
		$response = $this->logindb->query($statement);
		
		echo "testing validateLogin".PHP_EOL;
		while ( $row = $response->fetch_assoc() )
		{//open while loop bracket
			echo "checking if user $uname is in the database...\n";

			if($row['username'] == $uname)
			{//open if $row['username'] 
				echo "$uname is in the database. \n";
				//return 1;
			}//close if $row['username']
			else
			{//open else bracket for $uname in db
				echo "$un is not in the database. \n";
			}//close else bracket for $uname in db

			echo "checking password for $username".PHP_EOL;

			if($row['password'] == $pass)
			{//open bracket for checking pass
				echo"passwords match for $username".PHP_EOL;
				return 1;
			}//close bracket for checking pass

			echo "passwords did not match for $username".PHP_EOL;
			
		}//close while loop bracket
		return 0; //no users matched username
	}//close validateLogin bracket

	
	public function validateRegister($username,$password)
	{//open bracket  validateRegister
		$uname = $this->logindb->real_escape_string($username);
		$pass = $this->logindb->real_escape_string($password);
		$statement = "SELECT * FROM testTable WHERE username = '$uname' ";
		$response = $this->logindb->query($statement);

		if ( $response->num_rows == 0) //account doesnt exit, let them make one
		{//open if statement
			$statement = "INSERT INTO testTable (username,password) VALUES('$uname','$pass') ";
			$this->logindb->query($statement) or die ($this->logindb->error);
			echo"Account created Successfully".PHP_EOL;
			return 1;
		}//close if statement
		else
		{//open else statement
			echo "Account already exists".PHP_EOL;
			return 0;
		}//close else statement
	}//close bracket ValidateRegister
}//close class bracket 
?>
