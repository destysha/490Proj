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
            <button class="button" style="vertical-align:middle"><span>Inventory </span></button>

            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> <?php echo $bzid; ?> </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> <?php echo "$street $city, $state $zipcode"; ?>, NJ 07522 </h3>
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
            <h1> <a href="index.html"><img src="images/ishop.png" width="200px"> </a> </h1>
          </div>

          <div class="table100 ver3 m-b-110">
            <div class="table100-head">
              <table>
                <thead>
                  <tr class="row100 head">
                    <th class="cellMod">ADD</th>
                    <th class="cellMod">NAME</th>
                    <th class="cellMod">BRAND</th>
                    <th class="cellMod">UPC14</th>
                  </tr>
                </thead>
              </table>
            </div>

            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <tr class="row100 body">
                    <td class="cellMod" id="row"><button id="addDelBtn"><i class="fa fa-plus"></i></button></td>
                    <td class="cellMod" id="row">Rice</td>
                    <td class="cellMod" id="row">Jasmine</td>
                    <td class="cellMod" id="row">5755858678</td>
                  </tr>

                  <tr class="row100 body">
                    <td class="cellMod" id="row"><button id="addDelBtn"><i class="fa fa-plus"></i></button></td>
                    <td class="cellMod" id="row">Rice</td>
                    <td class="cellMod" id="row">Jasmine</td>
                    <td class="cellMod" id="row">5755858678</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
