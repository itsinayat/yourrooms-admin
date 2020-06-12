<?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/admin/findBookingById/'.$_GET['id'],false,$_SESSION["token"]);
$response = json_decode($get_data);
$item = $response->{'data'}[0];
?>
	  <html>
<head>
<style>
.label{
	font-size:20px;
	color:#9c27b0;;
}
</style>
</head> 
<body>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Update Booking (<?php echo $_GET['id']?>)</h4>

                </div>
                <div class="card-body">
                  <form method="POST" action = "updateBookingService.php">
				   <input name="id" value="<?php echo $item->{'id'} ?>" type="hidden" class="form-control">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Id</label>
                          <input value="<?php echo $item->{'id'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">BOOKING STATUS</label>
                          <input name="bookingStatus" value="<?php echo $item->{'bookingStatus'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">PAYMENT STATUS</label>
                          <input name="paymentStatus" value="<?php echo $item->{'paymentStatus'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">CHEKIN STATUS</label>
                          <input name="checkinStatus" value="<?php echo $item->{'checkinStatus'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
					  
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">CHECKOUT STATUS</label>
                          <input name="checkoutStatus" value="<?php echo $item->{'checkoutStatus'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
               
                      </div>
					  <a href="cancelBooking.php?id=<?php echo $item->{'id'} ?>" class="btn  btn-danger pull-left">CANCEL BOOKING</a>
					<a href="initiateRefund.php?id=<?php echo $item->{'id'} ?>" class="btn  btn-warning pull-left">INITIATE REFUND</a>
                    <button type="submit" class="btn btn-primary pull-right">Update Booking</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div><strong>
			  <p style="color:red">*BOOKING STATUS: CANCELLED/PENDING/SUCCESS </p>
			  <p style="color:red">*CHEKIN STATUS: CANCELLED/PENDING/SUCCESS </p>
			<p style="color:red">*CHEKOUT STATUS: CANCELLED/PENDING/SUCCESS </p>
			<p style="color:red">*PAYMENT STATUS: CANCELLED/PENDING/PAID </p>
			</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

</body>

</html>