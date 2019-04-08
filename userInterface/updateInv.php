<?php
session_start();
$username = $_SESSION ['username'];
require ('../rabbitMQFiles/testRabbitMQClient.php');
$res = info($username);
        $ans = array();
        foreach ($res as $i)
        {
//              echo"<br>".$i."<br>";
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

if(isset($_GET['add']))
        {
                $id = $_GET['add'];
        echo"$id".PHP_EOL;
                $update = add($id,$bID);
                header('location:ishopInv.php');
        }


/*
$product = $_POST['product'];
$brand = $_POST['brand'];
$qty   = $_POST['qty'];



$Update = update($product,$brand,$qty,$bID);
*/

/*$conn = mysqli_connect("localhost","user1","user1pass","ishopdb");
      if($conn->connect_error)
      {
        die("connection error:".$conn->connect_error);
      }
      $sql = "INSERT INTO businessinv (product,brand,qty,businessID) VALUES('$product','$brand','$qty','$bID')";
$result = $conn->query($sql);
$msg="Updated Inventory!";
 */
//try to alert user with msg
	header('location:ishopInv.php');

