<?php
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




$product = $_POST['product'];
$brand = $_POST['brand'];
$qty   = $_POST['qty'];
$conn = mysqli_connect("localhost","user1","user1pass","ishopdb");
      if($conn->connect_error)
      {
        die("connection error:".$conn->connect_error);
      }
      $sql = "INSERT INTO businessinv (product,brand,qty,businessID) VALUES('$product','$brand','$qty','$bID')";
$result = $conn->query($sql);
$msg="Updated Inventory!";

//try to alert user with msg
	header('location:ishopInv.php');
?>
