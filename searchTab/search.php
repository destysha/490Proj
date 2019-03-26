<?php
$conn = mysqli_connect("localhost","user1","user1pass","test");
if($conn->connect_error)
{
die("connection error:".$conn->connect_error);
}

$sql = "SELECT bzid,username,street,city,state,email,password FROM testTable";

$result = $conn->query($sql);
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>
<body>
<br><br><br>
#new search bar
<form action ="binventory.php" method="POST">
<input type="text" name="search" placeholder="Search">
<button type="submit" name="submit-search">Submit</button>
</form>
<h1>These are your results</h1>
<table class="fixed_header">
<tr>
<th>business Id</th>
<th>Username</th>
<th>Street</th>
<th>City</th>
<th>State</th>
<th>Email</th>
<th>Password</th>
</tr>
<?php

$string = $_POST['search'];
$search = "SELECT * FROM testTable WHERE username = '$string'";
$answer = $conn->query($search);

if($answer->num_rows > 0)
{
while ($row = $answer->fetch_assoc())
{
echo "<tr><td>".$row["bzid"]."</td><td>".$row["username"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["state"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td></tr>";
}
echo "</table>";
} //end if for each row
else
{
echo "no results in table";
}
$conn->close();

?>
</table>
<br><br><br>

#old search bar
<div class="topnav">
<div class="search-container">
<form action="search.php">
<input type="text" placeholder="Search" name="search">
<button type="submit">Submit</button>
</form>
</div>
</div><br><br>
<h1>Business Inventory</h1>
<table class = "fixed_header">
<thead>
<tr>
<th>Update</th>
<th>B iD</th>
<th>Product</th>
<th>Brand</th>
<th>Qty</th>
<th>UPC 14</th>
</tr>
</thead>
<tbody>
<tr>
<td>Row 1-0</td>
<td>Row 1-1</td>
<td>Row 1-2</td>
<td>Row 1-3</td>
<td>Row 1-4</td>
</tr>
<tr>
<td>Row 2-0</td>
<td>Row 2-1</td>
<td>Row 2-2</td>
<td>Row 2-3</td>
<td>Row 2-4</td>
</tr>
<tr>
<td>Row 3-0</td>
<td>Row 3-1</td>
<td>Row 3-2</td>
<td>Row 3-3</td>
<td>Row 3-4</td>
</tr>
<tr>
<td>Row 4-0</td>
<td>Row 4-1</td>
<td>Row 4-2</td>
<td>Row 4-3</td>
<td>Row 4-4</td>
</tr>
<tr>
<td>Row 5-0</td>
<td>Row 5-1</td>
<td>Row 5-2</td>
<td>Row 5-3</td>
<td>Row 5-4</td>
</tr>
<tr>
<td>Row 6-0</td>
<td>Row 6-1</td>
<td>Row 6-2</td>
<td>Row 6-3</td>
<td>Row 6-4</td>
</tr>
<tr>
<td>Row 7-0</td>
<td>Row 7-1</td>
<td>Row 7-2</td>
<td>Row 7-3</td>
<td>Row 7-4</td>
</tr>
</tbody>
</table>

<h1>Table from DataBase</h1>
<table class="fixed_header">
<tr>
<th>business Id</th>
<th>Username</th>
<th>Street</th>
<th>City</th>
<th>State</th>
<th>Email</th>
<th>Password</th>
</tr>
<?php
/*connection at the top of the page
$sql = "SELECT bzid,username,street,city,state,email,password FROM testTable";

$result = $conn->query($sql);
*/
if($result->num_rows >0)
{
while ($row = $result->fetch_assoc())
{
echo "<tr><td>".$row["bzid"]."</td><td>".$row["username"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["state"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td></tr>";
}
echo "</table>";
} //end if for each row
else
{
echo "no results in table";
}
$conn->close();
?>
</table>
</body>
</html>