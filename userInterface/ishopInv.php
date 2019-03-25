<?php
	include (" php/connectDB.php ");
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

  <!--===============================================================================================-->
  </head>

  <body>
    <div class="bgimg">
      <div class="insidebg">

        <div id="topNav-container">
          <span id="navToggle" onclick="openNav()">&#9776;</span>

          <span id="right-notification">
            <a href="#" class="notification">
              <button class="button">
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
            <a href="businessInv.php" class="buinv">
                <button class="button" style="vertical-align:middle"><span>Inventory </span></button>
            </a>


            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> <?php echo $bzid; ?> </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> <?php echo "$street $city, $state $zipcode"; ?></h3>
              <h2 class="navInfoTitle"> Email: </h2>
                <h3 class="navInfoData"> <?php echo $email; ?> </h3>
              <!--<h2 class="navInfoTitle"> Last Login: </h2>
                <h3 class="navInfoData"> March 30, 2019 at 12:30PM</h3> -->
            </article>
          </section>
          <section class="logoutButnC">
            <a href="../phpFiles/logout.php">
	        <img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD">
	    </a>
          </section>
          <section class="logoiShopC">
            <img src="images/ishop.png" title="iShopLogo" alt="iShopLogo" id="logoiShopD">
          </section>
        </div>


        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <h1> <a href="index.php"><img src="images/ishop.png" width="200px"> </a> </h1>
          </div>

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
                        $sql = "SELECT * FROM inventory";
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
   
      <!-- The Map Modal -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>LOCALIZER</p>

          <section class="contact_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.4529525156877!2d-74.17745888503858!3d40.92773907930902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fdb3b53a8603%3A0x7bf5fca607743ad6!2s100+N+5th+St%2C+Paterson%2C+NJ+07522!5e0!3m2!1sen!2s!4v1542240288675"
              width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </section>
        </div>
      </div>
	    
      <!-- The widget modal -->
      <div id="wModal" class="wmodal">
        <!-- Widget Modal content -->
        <div class="wmodal-content">
          <span class="wclose">&times;</span>
          <p class="pFR">Food Safety Notification Recalls</p>

          <div class="wContent">
            <!--<iframe src="https://www.foodsafety.gov/recalls/widget/widget.html" width="167" height="380" alt="Food Safety Widget" title="Food Safety Widget" frameborder="0">&nbsp;</iframe>-->
          </div>
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
    <!--===============================================================================================-->
  </body>
</html>
