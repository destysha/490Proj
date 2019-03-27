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
              <button class="button">
                <span>Notifications </span>
              </button>
              <span class="badge">3</span>
            </a>
          </span>
        </div>


        <div id="mySidenav" class="sidenav">
          <div class="busName">
            <!-- TO BE CHANGED USING PHP FROM SESSION -->
            <h1> <img src="images/ishop.png" id="logoiShopD"></h1>
          </div>
          <section id="navInfo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <button class="button" style="vertical-align:middle">
              <a href="businessInv.html">
                <span>Inventory </span>
              </a>
              </button>

            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> BU0003 </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> 46 Oxford Street Paterson, NJ 07522 </h3>
              <h2 class="navInfoTitle"> Email: </h2>
                <h3 class="navInfoData"> companyemail@email.com </h3>
              <h2 class="navInfoTitle"> Last Login: </h2>
                <h3 class="navInfoData"> March 30, 2019 at 12:30PM</h3>
            </article>
          </section>
          <section class="logoutButnC">
            <a href="#"><img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD"></a>
          </section>
          <section class="logoiShopC">
            <a href="index.html"><img src="images/ishop.png" id="logoiShopD"> </a>
          </section>
        </div>




        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <!-- TO BE CHANGED USING PHP FROM SESSION -->
            <h1> <a href="index.html"><img src="images/ishop.png" class="logoiShopD"> </a> </h1>
          
             	
		<h1>ISHOP INVENTORY FROM DB _HARIS</h1>
                    <table class="fixed_header">
                        <tr>
                          <th>Brand</th>
                          <th>Name</th>
                        </tr>
                        <?php
                        $conn = mysqli_connect("localhost","user1","user1pass","ishop");
                        if($conn->connect_error)
                        {
                                die("connection error:".$conn->connect_error);
                        }
                        $sql = "SELECT brand, name FROM inventory";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0)
                         {
                        while ($row = $result->fetch_assoc())
                        {
                                echo "<tr><td>".$row["brand"]."</td><td>".$row["name"]."</td></tr>";
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
		<form class="updateForm" id="updateForm" action="updateInv2.php" method="POST">
		<label for="user">User Name</label>
                <input type="text" name="user" id="user"placeholder="User Name" />
		<label for="product">Product</label>
		<input type="text" name="product" id="product"placeholder="Product" />
		<label for="brand">Brand</label>
		<input type="text" name="brand" id="brand"placeholder="Brand" />
		<label for="qty">Quantity</label>
                <input type="text" name="qty" id="quantity"placeholder="Quantity" />
		<input class="myButton"type="submit" name="submit-update" value="Add" onclick= "return chk()">
		</form><br>
	</div>
	<p id="msg"></p>
        <button class ="myButton" onclick="location.href='userinventory.php';">Back to Your Inventory</button>

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
			var product=document.getElementById('user').value;
			var  product=document.getElementById('product').value;
			var  brand=document.getElementById('brand').value;
			var  quantity=document.getElementById('quantity').value;
			var  dataString='user'=+user+'&product='+product+'&brand='+brand+'&quantity'+quantity;
			$.ajax({
				type:"post",
				url:  "updateInv2.php",
				data:dataString,
				data:{'user':user},
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
