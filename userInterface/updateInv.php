<?php

$product = $_POST['product'];
$brand = $_POST['brand'];
$qty   = $_POST['qty'];
$conn = mysqli_connect("localhost","user1","user1pass","ishopdb");
      if($conn->connect_error)
      {
        die("connection error:".$conn->connect_error);
      }
      $sql = "INSERT INTO businessinv (product,brand,qty) VALUES('$product','$brand','$qty')";
$result = $conn->query($sql);
$msg="Updated Inventory!";

//try to alert user with msg
	header('location:ishopInv.php');
?>
