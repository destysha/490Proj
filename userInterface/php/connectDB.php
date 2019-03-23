<?php

    ////////////////////////// CONNECT TO DATABASE ///////////////////////////////
    $connectDB = mysqli_connect ( "localhost", "user1", "user1pass", "ishopdb" );

    if ( $connectDB->connect_error )
    {
      die ("Failed to connect to database: " . $connectDB->connect_error);
    }
    //////////////////////////////////////////////////////////////////////////////

    ///////////////////////////// QUERY TO DATABASE //////////////////////////////
    $username = $_SESSION ['username'];

    $query  =  "SELECT * FROM business
                WHERE username='$username'";

    $result = $connectDB->query($query);

    if ( $result->num_rows > 0 )
    {
      while($row = $result->fetch_assoc())
      {
        $bzname  = $row[ "bzname" ];
        $bzid    = $row[ "bzid" ];
        $street  = $row[ "street" ];
        $city    = $row[ "city" ];
        $zipcode = $row[ "zipcode" ];
        $state   = $row[ "state" ];
        $email   = $row[ "email" ];
      }
    }

    else
    {
      echo "<br><br>No rows retrieved<br><br>";
    }

    $connectDB->close();

?>
