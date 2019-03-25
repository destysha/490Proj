<?php
	include (" php/connectDB.php ");
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
            <a href="#"><img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD"></a>
          </section>
          <section class="logoiShopC">
            <img src="images/ishop.png" title="iShopLogo" alt="iShopLogo" id="logoiShopD">
          </section>
        </div>


        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <!-- TO BE CHANGED USING PHP FROM SESSION -->
            <h1> BUSINESS NAME </h1>
          </div>

                <div class="table100 ver3 m-b-110">
                  <div class="table100-head">
                    <table>
                      <thead>
                        <tr class="row100 head">
                          <th class="cellMod">DELETE</th>
                          <th class="cellMod">UPDATE</th>
                          <th class="cellMod">NAME</th>
                          <th class="cellMod">BRAND</th>
                          <th class="cellMod">QTY</th>
                          <th class="cellMod">UPC14</th>
                          <th class="cellMod">RECALL</th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                  <div class="table100-body js-pscroll">
                    <table>
                      <tbody>
                        <tr class="row100 body">
                          <td class="cellMod" id="row"><button id="addDelBtn"><i class="fa fa-trash"></i></button></td>
                          <td class="cellMod" id="row"><button id="addDelBtn"><i class="fa fa-pencil-square-o"></i></button></td>
                          <td class="cellMod" id="row">Rice</td>
                          <td class="cellMod" id="row">Jasmine</td>
                          <td class="cellMod" id="row">2</td>
                          <td class="cellMod" id="row">5755858678</td>
                          <td class="cellMod recall" id="row">RECALL</td>
                        </tr>

                        <tr class="row100 body">
                          <td class="cellMod" id="row"><button id="addDelBtn"><i class="fa fa-trash"></i></button></td>
                          <td class="cellMod" id="row"><button id="addDelBtn"><i class="fa fa-pencil-square-o"></i></button></td>
                          <td class="cellMod" id="row">Rice</td>
                          <td class="cellMod" id="row">Jasmine</td>
                          <td class="cellMod" id="row">2</td>
                          <td class="cellMod" id="row">5755858678</td>
                          <td class="cellMod recall" id="row"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
    <!--===============================================================================================-->
  </body>
</html>
