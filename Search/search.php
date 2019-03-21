<?php
include_once('dbconnect.php');
 $dbcon = mysqli_select_db($conn,$DBNAME);

 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }

 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }


if(isset($_POST['search'])){
	$q = $_POST['q'];
	$query = mysqli_query($conn,"SELECT username, password * FROM `testTable` WHERE `username` LIKE '%$qname%'"); 
	$count = mysqli_num_rows($query);
	if($count == "0"){
		$output = '<shaidy>No result found!</shaidy>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$s = $row['username`']; 
				$output .= '<haris>'.$s.'</haris><br>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
	</head>
	<body>
		<form method="POST" action="search.php">
			<input type="text" name="q" placeholder="query">
			<input type="submit" name="search" value="Search">
		</form>
		<?php echo $output; ?>
	</body>
</html>
