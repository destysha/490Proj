<?php

$user = $_POST['user'];
$product = $_POST['product'];
$brand = $_POST['brand'];
$qty   = $_POST['qty'];
$conn = mysqli_connect("localhost","user1","user1pass","ishop");
      if($conn->connect_error)
      {
        die("connection error:".$conn->connect_error);
      }
$sql = "INSERT INTO bzinventory (user,product,brand,qty) VALUES('$user','$product','$brand','$qty')";
$result = $conn->query($sql);
$msg="Updated Inventory!";

//try to alert user with msg
	header('location:ishopInv.php');
?>
