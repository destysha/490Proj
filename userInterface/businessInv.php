<?php 
	session_start();
	include ("Emad.php");
	$cnt = $_SESSION['noticnt'];
	$output = $_SESSION['noti'];

//	include ("php/connectDB2.php");
/*
	$username = $_SESSION ["username"];
	$bzname   = $_SESSION ["bzname"];
        $bID      = $_SESSION ["bID"];
        $street   = $_SESSION ["street"];
        $city     = $_SESSION ["city"];
        $zc       = $_SESSION ["zipcode"];
        $state    = $_SESSION ["state"];
        $email    = $_SESSION ["email"];
 */
//include('delete.php');
require ('../rabbitMQFiles/testRabbitMQClient.php');
$username = $_SESSION ['username'];

/////Getting all info related to users account based on whos logged in ..session///////

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


//	include('delete.php');
/*
	if(isset($_POST['update']))
	{
		$product = $_POST['product'];
		$brand = $_POST['brand'];
		$qty = $_POST['qty'];
	
		require ('../rabbitMQFiles/testRabbitMQClient.php');
		$re = update($product,$brand,$qty,$bID);
		echo"$re".PHP_EOL;

	}

 */

/*
	//get table to updated
	  if(isset($_GET['edit'])){
	  $id = $_GET['edit'];
	  
	  $edit_state=true;	
	  $rec = mysqli_query($conn,"SELECT * FROM businessinv WHERE id=$id AND businessID =$bID");
	  $record = mysqli_fetch_array($rec);
		
	  $product = $record['product'];
	  $brand = $record['brand'];
	  $qty = $record['qty'];
	  $id = $record['id'];
	}
*/
?>
<!DOCTYPE html>
<html>
  <head>
    <title> <?php echo $bzname; ?> | Inventory </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/inventory.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
  <!--===============================================================================================-->
  </head>

  <body>
    <div class="bgimg">
      <div class="insidebg">

       <div id="topNav-container">
          <span id="navToggle" onclick="openNav()">&#9776;</span>

          <span id="right-notification">
            <a href="#" class="notification">
              <button class="button" id="bWidget">
                <span>Notifications </span>
              </button>
              <span class="badge"><?php echo $cnt;  ?></span>
            </a>
          </span>
        </div>


        <div id="mySidenav" class="sidenav">
          <div class="busName">
          <h1> <?php echo $bzname; ?> </h1>
          </div>
          <section id="navInfo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <button class="button" style="vertical-align:middle">
              <a href="businessInv.php">
                <span id="invSpan">Inventory </span>
              </a>
              </button>

            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> <?php echo "BU00$bID"; ?> </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> <?php echo "$street $city, $state $zc"; ?></h3>
              <h2 class="navInfoTitle"> Email: </h2>
                <h3 class="navInfoData"> <?php echo $email; ?> </h3>
              <!--<h2 class="navInfoTitle"> Last Login: </h2>
                <h3 class="navInfoData"> March 30, 2019 at 12:30PM</h3> -->
            </article>
          </section>
          <section class="logoutButnC">
            <a href="../phpFiles/logout.php"><img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD"></a>
          </section>
          <section class="logoiShopC">
            <a href="index.php"><img src="images/ishop.png" id="logoiShopD"> </a>
          </section>
        </div>
	      
      <!-- The widget modal -->
      <div id="wModal" class="wmodal">
        <!-- Widget Modal content -->
        <div class="wmodal-content">
          <span class="wclose">&times;</span><br>
          <p class="pFR">Food Safety Notification Recalls</p>

          <div class="wContent">
            <?php           
                    //header('Content-type: text/plain');
                    echo nl2br( "$output",false );
            ?>
          </div>
        </div>
      </div>
	



        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <h1> <?php echo $bzname; ?> </h1><br>
          </div>
 		<div class ="inventory" class="animate form">
		

		<!--March 27 Haris -->
	<?php
//		require ('../rabbitMQFiles/testRabbitMQClient.php');
//		$username = $_SESSION ['username'];
		
		$sql = "SELECT product,brand,qty,id FROM businessinv WHERE businessID = '$bID'";
		$record = fetchInv($username,$sql);

		$html = "<table class = 'fixed_header'>";
		$html .= "<thead>";
		  $html .="<tr class='trS'>";
			$html .="<th class='thS'>Product</th>";
			$html .="<th class='thS'>Brand</th>";
			$html .="<th class='thS'>Qty</th>";
			$html .="<th class='thS'>Action</th>";
		  $html .="</tr>";
		$html .="</thead>";
			$count = 1;
			foreach ($record as $aR)
			{
				$c = 0;
				foreach($aR as $key => $row)
				{
					if($c ==3)
					{
						$html.="<td><a href='delete.php?delete=".$row."'>Delete</a></td>";
						//$html.="<td class='thS'> <a href='delete.php?delete=".$row.">'DELETE</a></td>";
					}
					else{
						$html .="<td class='thS'>".$row."</td>";
					}
					$c++;
				}
				$html .= "</tr>";
				$count +=1;
			}
			$html .="</table>";
			echo $html;

	?>
<br><br>
			<button class="myButton" onclick="location.href='ishopInv.php';">Update Inventory</button>

		<br><br><br>
	<!--<h1>TABLE OF BUSINESS FROM DB </h1>     Old Table, New is above this *-->
	<!--	<br>
                    <table class="fixed_header">
                        <tr>
                          <th>PRODUCT</th>
                          <th>BRAND</th>
			  <th>QTY</th>
                        </tr>
			<?php/* 
			$conn = mysqli_connect("localhost","user1","user1pass","ishopdb");
			if($conn->connect_error)
			{
				die("connection error:".$conn->connect_error);
			}
			$sql = "SELECT * FROM businessinv WHERE businessID = $bID";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			 {
                        while ($row = $result->fetch_assoc())
                        {
                                echo "<tr><td>".$row["product"]."</td><td>".$row["brand"]."</td><td>".$row["qty"]."</td></tr>";
                        }
                        echo "</table>";
                } //end if for each row
                else
                {
                        echo "no results in table";
		}	
		$conn->close();
			 */?>
                    </table><br><br>
   		<button class="myButton" onclick="location.href='ishopInv.php';">Update Inventory</button>
		</div>
-->

<br><br>

<!-- Taken out momentaraly

<h1 class="headers">HARIS FORM UPDATE INV</h1><br>
<form class="updateForm" method = "POST" action="businessInv.php">
	<div>
                    <label>Product</label>
                     <input type="text" name="product" value="Product">
		  </div>
	<div>
                    <label>Brand</label>
                     <input type="text" name="brand" value="Brand">
		  </div>
	<div>
                    <label>Qty</label>
                     <input type="text" name="qty" value="qty">
                  </div>
	
	<input type="submit" name="update" value="Update"> <br><br>
<button class="myButton" name="update"onclick="location.href='businessInv.php';">Update</button>
</form>	

-->
        </section>
      </div> //these 2 div's are right under opening body tag
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/inventory.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/bootstrap/js/popper.js"></script>
    	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    	<script>
    		$('.js-pscroll').each(function(){
    			var ps = new PerfectScrollbar(this);

    			$(window).on('resize', function(){
    				ps.update();
    			})
    		});


    	</script>
    <!--===============================================================================================-->
  </body>
</html>
