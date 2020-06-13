<?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
//users count
$get_data = callAPI('GET', 'http://localhost:8080/admin/getAllUsers',false,$_SESSION["token"]);
$userCount = sizeof(json_decode($get_data)->{'data'}[0]);
//hotel count
$get_data_hotel = callAPI('GET', 'http://localhost:8080/hotel/getAll-hotels',false,$_SESSION["token"]);
$hotelCount = sizeof(json_decode($get_data_hotel)->{'data'}[0]);
//all bookings
$get_data_bkng = callAPI('GET', 'http://localhost:8080/admin/getAllBookings',false,$_SESSION["token"]);
$bookingCount = sizeof(json_decode($get_data_bkng)->{'data'}[0]);
//getRevenue
$get_data_revenue = callAPI('GET', 'http://localhost:8080/admin/getRevenue',false,$_SESSION["token"]);
$revenue = json_decode($get_data_revenue)->{'data'}[0];
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_box</i>
                  </div>
                  <p class="card-category">Total Users</p>
                  <h3 class="card-title"><?php echo $userCount; ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger"></i>
                    <a href="javascript:;"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Total Hotels</p>
                  <h3 class="card-title"><?php echo $hotelCount; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">analytics</i>
                  </div>
                  <p class="card-category">Total Bookings</p>
                  <h3 class="card-title"><?php echo $bookingCount; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                     <i class="material-icons">account_balance_wallet</i>
                  </div>
                  <p class="card-category">Total Revenue</p>
                  <h3 class="card-title">Rs. <?php echo $revenue; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i> 
                  </div>
                </div>
              </div>
            </div>
          </div>
         
      </div>
	  </div>