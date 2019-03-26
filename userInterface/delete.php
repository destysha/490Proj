<?php
	session_start();
	
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

	  $query = "INSERT INTO businessinv(product,brand,qty)  VALUES('$product','$brand','$qty')";
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

		mysqli_query($conn,"UPDATE businessinv SET product='$product',brand='$brand',qty='$qty' WHERE id=$id");
		$_SESSION['msg'] = " You updated successfully";
		header('location:businessInv.php');
	}

	//delete row
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($conn,"DELETE FROM businessinv WHERE id=$id");
		$_SESSION['msg'] = " Deleted Row ";
                header('location:businessInv.php');

	}	

	//get info  from database table to display what user inserted
	$list = mysqli_query($conn,"SELECT * FROM businessinv");
?>
