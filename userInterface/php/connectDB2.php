<?php

	session_start();
require ('../rabbitMQFiles/testRabbitMQClient.php');
$username = $_SESSION ['username'];


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
	$email = $ans[7];
	 
/////OLD CODE BELOW THIS///
/*
	session_start();

    ////////////////////////// CONNECT TO DATABASE ///////////////////////////////
    $connectDB = mysqli_connect('localhost','user1','user1pass','ishopdb');

    if($connectDB->connect_error)
    {
       die("Connection error:".$connectDB->connect_error);
     }
    //////////////////////////////////////////////////////////////////////////////

    ///////////////////////////// QUERY TO DATABASE //////////////////////////////
    $username = $_SESSION ['username'];
	
    $query = "SELECT * FROM business
    	      WHERE username = '$username'";

	 mysqli_query($connectDB,$query);
    

    $result = $connectDB->query($query);

    if ( $result->num_rows > 0 )
    {
      while ($row = $result->fetch_assoc())
      {
        $bzname  = $row[ "bzname" ];
        $bID     = $row[ "businessID" ];
        $street  = $row[ "street" ];
        $city    = $row[ "city" ];
        $zipcode = $row[ "zipcode" ];
        $state   = $row[ "state" ];
        $email   = $row[ "email" ];
          
        $_SESSION ['bzname']  = $row[ "bzname" ];
        $_SESSION ['bID']     = $row[ "businessID" ];
        $_SESSION ['street']  = $row[ "street" ];
        $_SESSION ['city']    = $row[ "city" ];
        $_SESSION ['zipcode'] = $row[ "zipcode" ];
        $_SESSION ['state']   = $row[ "state" ];
        $_SESSION ['email']   = $row[ "email" ];
      }
    }

    else
    {
      echo "<br><br>No rows retrieved<br><br>";
    }

 //   $connectDB->close();
 */
?>
