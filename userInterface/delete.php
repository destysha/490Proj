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
	{
		$product = mysqli_real_escape_string($conn,$_POST['product']);
		$brand = mysqli_real_escape_string($conn,$_POST['brand']);
		$qty = mysqli_real_escape_string($conn,$_POST['qty']);
		$id = mysqli_real_escape_string($conn,$_POST['id']);

		mysqli_query($conn,"UPDATE businessinv SET product='$product',brand='$brand',qty='$qty' WHERE id=$id AND businessID = $bID");
		$_SESSION['msg'] = " You updated successfully";
		header('location:businessInv.php');
	}

	//delete row
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($conn,"DELETE FROM businessinv WHERE id=$id  AND businessID=$bID");
		$_SESSION['msg'] = " Deleted Row ";
                header('location:businessInv.php');

	}	

	//get info  from database table to display what user inserted
	$list = mysqli_query($conn,"SELECT * FROM businessinv WHERE businessID = $bID");
?>
