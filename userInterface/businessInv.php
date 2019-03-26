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

	include('delete.php');

	//get table to updated
	  if(isset($_GET['edit'])){
	  $id = $_GET['edit'];
	  
	  $edit_state=true;	
	  $rec = mysqli_query($conn,"SELECT * FROM businessinv WHERE id=$id ");
	  $record = mysqli_fetch_array($rec);
		
	  $product = $record['product'];
	  $brand = $record['brand'];
	  $qty = $record['qty'];
	  $id = $record['id'];
	}

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
              <span class="badge">3</span>
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
            <!--<iframe src="https://www.foodsafety.gov/recalls/widget/widget.html" width="167" height="380" alt="Food Safety Widget" title="Food Safety Widget" frameborder="0">&nbsp;</iframe>-->
          </div>
        </div>
      </div>
	



        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <h1> <?php echo $bzname; ?> </h1>
          </div>
 		<div class ="inventory" class="animate form">
		<h1>TABLE OF BUSINESS FROM DB </h1>
		<br>
                    <table class="fixed_header">
                        <tr>
                          <th>PRODUCT</th>
                          <th>BRAND</th>
			  <th>QTY</th>
                        </tr>
			<?php
			$conn = mysqli_connect("localhost","user1","user1pass","ishopdb");
			if($conn->connect_error)
			{
				die("connection error:".$conn->connect_error);
			}
			$sql = "SELECT * FROM businessinv";
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
			?>
                    </table><br><br>
   		<button class="myButton" onclick="location.href='ishopInv.php';">Update Inventory</button>
		</div>
		
<br><br>
<h1>Table With Delete Option</h1><br><br>
<?php  if(isset($_SESSION['msg'])): ?>
	<div class="msg">
	  <?php
	  echo $_SESSION['msg'];
	  unset($_SESSION['msg']);
	  ?>
	</div>
<?php endif ?>

<!--NEW TABLE WITH DELETE OPTION: ATTEMPT #1 -->
	  <div class="del-table">
	    <table class="fixed_header">
		<thead>
		  <tr>
			<th>Del_Product</th>
			<th>Del_Brand</th>
			<th>Del_Qty</th>
			<th colspan="2">Del_Action</th>
		  </tr>
		</thead>
		<tbody>
		  <?php while ($row = mysqli_fetch_array($list)) { ?>
			<tr>
			   <td><?php echo $row['product']; ?></td>
			   <td><?php echo $row['brand']; ?></td>
			   <td><?php echo $row['qty']; ?></td>
			   <td>
                                <a href="businessInv.php?edit=<?php echo $row['id'];  ?>">Edit</a>
                           </td>
			   <td>
                                <a href="delete.php?del=<?php echo $row['id'];?>">Delete</a>
                           </td>
			</tr>
		  <?php } ?>
		</tbody>
	    </table>
		<br><br><br>
		<h1>FIll Out Form</h1>

		<form method="post" action="delete.php" class="updateForm">
		<input type="hidden" name="id" value="<?php echo $id;  ?>">
		  <div>
		    <label>Product</label>
		     <input type="text" name="product" value="<?php echo $product; ?>">
		  </div>
		  <div>
                    <label>Brand</label>
                      <input type="text" name="brand" value="<?php echo $brand; ?>">
                  </div>
		  <div>
                    <label>Qty</label>
                      <input type="text" name="qty" value="<?php echo $qty; ?>">
                  </div>

		  <div>
	              <?php  if ($edit_state == false): ?>
			<button class="myButton" type="submit" name="save">Save</button>
		      <?php  else: ?>
			<button class="myButton" type="submit" name="update">Update</button>
		      <?php  endif?>
                  </div>
		</form>
	  </div>		
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
