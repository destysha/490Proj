<?php
<<<<<<< HEAD
	session_start();
	include ("php/connectDB.php");
        $username = $_SESSION ["username"];
        $bzname   = $_SESSION ["bzname"];
        $bID      = $_SESSION ["bID"];
        $street   = $_SESSION ["street"];
        $city     = $_SESSION ["city"];
        $zc       = $_SESSION ["zipcode"];
        $state    = $_SESSION ["state"];
        $email    = $_SESSION ["email"];
	
	

	$product = "";
	$brand = "";
	$qty = "";
	$id = 0;

	$conn = mysqli_connect('localhost','user1','user1pass','ishopdb');

	if(isset($_POST['save']))
	{
	  $product = $_POST['product'];
	  $brand = $_POST['brand'];
          $qty = $_POST['qty'];
	
	  $edit_state = false;

	  $query = "INSERT INTO businessinv(product,brand,qty,businessID)  VALUES('$product','$brand','$qty','$bID') ";
	  mysqli_query($conn,$query);
	
	  $_SESSION['msg'] = "Product Saved";
	  header('location:businessInv.php');
	}
	
	//update records 
	if(isset($_POST["update"]))
=======
session_start();

require ('../rabbitMQFiles/testRabbitMQClient.php');
$username = $_SESSION ['username'];

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

	if(isset($_GET['delete']))
>>>>>>> 994fbd85ab760de37dca9b313a348cdce29ad5d5
	{
		$id = $_GET['delete'];
		$del = del($id);
		header('location:businessInv.php');
	}
?>
