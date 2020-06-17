<?php include "config.php"; ?>
<?php 
session_start();
if(!isset($_SESSION["token"])){
	header('Location: login.php');
} ?>
<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Yorrooms Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

</head>

<body class="">
 <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
		
		 <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <span class="bmd-form-group"><div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form>
			
          <div class="collapse navbar-collapse justify-content-end">
           
            <ul class="navbar-nav">
             
              <list class="nav-item dropdown">
                <a  class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="logoutAction.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
	  <br><br> <br>
      <!-- End Navbar -->
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="index.php" class="simple-text logo-normal">
          <button class="btn btn-lg btn-primary">Yorrooms Admin</button>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id='index' class="nav-item">
            <a class="nav-link" href="./index.php?tab=main">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
		  
		  <li id='bookings' class="nav-item ">
            <a class="nav-link" href="./index.php?tab=bookings">
              <i class="material-icons">history</i>
              <p>Manage	 Bookings</p>
            </a>
          </li>
          <li id='hotels' class="nav-item ">
            <a class="nav-link" href="./index.php?tab=hotels">
              <i class="material-icons">business</i>
              <p>Manage Hotels</p>
            </a>
          </li>
          <li id="coupons" class="nav-item ">
            <a class="nav-link" href="./index.php?tab=coupons">
              <i class="material-icons">content_paste</i>
              <p>Manage Coupons</p>
            </a>
          </li>
		  
		   <li id="users" class="nav-item ">
            <a class="nav-link" href="./index.php?tab=users">
              <i class="material-icons">account_box</i>
              <p>Manage Users</p>
            </a>
          </li>
		   <li id="refund" class="nav-item ">
            <a class="nav-link" href="./index.php?tab=refund">
              <i class="material-icons">library_books</i>
              <p>Manage refund</p>
            </a>
          </li>
		   <li id="configure" class="nav-item ">
            <a class="nav-link" href="./index.php?tab=configure">
              <i class="material-icons">unarchive</i>
              <p>Configure</p>
            </a>
          </li>
        
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="">
        <div class="container-fluid">
		<?php
		if(isset($_GET['tab'])){
		if($_GET['tab']=='bookings'){
			include "bookings.php";
		}
		else if($_GET['tab']=='update_bookings'){
			include "update_booking.php";
		}
		else if($_GET['tab']=='view_trxn'){
			include "view_trxn.php";
		}
		else if($_GET['tab']=='users'){
			include "users.php";
		}
		else if($_GET['tab']=='user'){
			include "user.php";
		}
		else if($_GET['tab']=='hotels'){
			include "hotels.php";
		}
		else if($_GET['tab']=='update_hotel'){
			include "update_hotel.php";
		}
		else if($_GET['tab']=='main'){
			include "main.php";
		}
		else if($_GET['tab']=='coupons'){
			include "coupons.php";
		}
		else if($_GET['tab']=='update_coupon'){
			include "update_coupon.php";
		}
		else if($_GET['tab']=='updateBooking'){
			include "updateBooking.php";
		}
		
		else if($_GET['tab']=='updateRoom'){
			include "updateRoom.php";
		}
		else if($_GET['tab']=='addRooms'){
			include "addRooms.php";
		}
		else if($_GET['tab']=='refund'){
			include "refund.php";
		}
		else if($_GET['tab']=='configure'){
			include "configure.php";
		}
		}else{
			include "main.php";
		}
		
		?>
		</div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="./assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="./assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="./assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="./assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="./assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="./assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="./assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="./assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="./assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="./assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>


  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
    <script>
var urlParams = new URLSearchParams(window.location.search);
var tab = urlParams.get('tab');
var act;
if(tab=='main' || tab==null){
var navlink = document.getElementById("index");
navlink.className += " active";
}
if(tab=='bookings'){
var navlink = document.getElementById("bookings");
navlink.className += " active";
}
if(tab=='hotels'){
var navlink = document.getElementById("hotels");
navlink.className += " active";
}
if(tab=='coupons'){
var navlink = document.getElementById("coupons");
navlink.className += " active";
}


if(tab=='users'){
var navlink = document.getElementById("users");
navlink.className += " active";
}

if(tab=='refund'){
var navlink = document.getElementById("refund");
navlink.className += " active";
}
if(tab=='configure'){
var navlink = document.getElementById("configure");
navlink.className += " active";
}
 
  </script>

</body>

</html>