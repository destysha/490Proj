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
	
?>

<!DOCTYPE html>

<html>
  <head>
    <title> iShop | Inventory </title>
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
	<script src"https://code.jquery.com/jquery-3.3.1.min.js"></script>
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


        <div id="mySidenav" class="sidenav">
          <div class="busName">
            <h1> <img src="images/ishop.png" id="logoiShopD"></h1>
          </div>
          <section id="navInfo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <button class="button" style="vertical-align:middle">
              <a href="ishopInv.php">
                <span>Inventory </span>
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
            <a href="#"><img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD"></a>
          </section>
          <section class="logoiShopC">
            <a href="index.php"><img src="images/ishop.png" id="logoiShopD"> </a>
          </section>
        </div>




        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <!-- TO BE CHANGED USING PHP FROM SESSION -->
            <h1> <a href="index.php"><img src="images/ishop.png" class="logoiShopD" width="200px"> </a> </h1>
          </div>

     	  <!--
                  <div class="table100-body js-pscroll">
                    <table>
                      <tbody>
                        <tr class="row100 body">
                          <td class="cellMod">Like a butterfly</td>
                          <td class="cellMod">Boxing</td>
                          <td class="cellMod">9:00 AM - 11:00 AM</td>
                          <td class="cellMod">Aaron Chapman</td>
                          <td class="cellMod">10</td>
                          <td class="cellMod"><button id="addBtn"><i class="fa fa-plus"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>-->
		
		<h1>ISHOP INVENTORY FROM DB </h1>
                    <table class="fixed_header">
                        <tr>
                          <th>PRODUCT</th>
                          <th>BRAND</th>
                        </tr>
                        <?php
                  	$conn = mysqli_connect("localhost","user1","user1pass","ishopdb");
                        if($conn->connect_error)
                        {
                                die("connection error:".$conn->connect_error);
                        }
                        $sql = "SELECT name,brand FROM inventory";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0)
                         {
                        while ($row = $result->fetch_assoc())
                        {
                                echo "<tr><td>".$row["name"]."</td><td>".$row["brand"]."</td></tr>";
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
	<br><br>
	
		echo"<SCRIPT>alert($_GET['msg']);</SCRIPT>";
	
	<div>
		<form class="updateForm" id="updateForm" action="updateInv.php" method="POST">
		<label for="product">Product</label>
		<input type="text" name="product" id="product"placeholder="Product" />
		<label for="brand">Brand</label>
		<input type="text" name="brand" id="brand"placeholder="Brand" />
		<label for="qty">Quantity</label>
                <input type="text" name="qty" id="quantity"placeholder="Quantity" />
		<input class="myButton"type="submit" name="submit-update" value="Update" onclick= "return chk()">
		</form><br>
	</div>
	<p id="msg"></p>
        <button class ="myButton" onclick="location.href='businessInv.php';">Back to Your Inventory</button>

        </section>

      </div>
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
	<script>
		function chk()
		{
			var  product=document.getElementById('product').value;
			var  brand=document.getElementById('brand').value;
			var  quantity=document.getElementById('quantity').value;
			var  dataString='product='+product+'&brand='+brand+'&quantity'+quantity;
			$.ajax({
				type:"post",
				url:  "updateInv.php",
				data:dataString,
				data:{'product':product},
				data:{'brand':brand}.
				data:{'quantity':quantity};
				cache:false,
				success: function(html){
					$('#msg').html(html);
				}
			});
			return false;
		}
	</script>
    <!--===============================================================================================-->
  </body>
</html>
