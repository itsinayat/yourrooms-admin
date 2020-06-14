<?php include "config.php"; ?>
 <?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/admin/findBookingById/'.$_GET['id'],false,$_SESSION["token"]);
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
                          <input id="ps" name="paymentStatus" value="<?php echo $item->{'paymentStatus'} ?>" type="text" class="form-control" disabled>
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
					<a id="cancelbtn" href="cancelBookingService.php?id=<?php echo $item->{'id'} ?>" class="btn  btn-danger pull-left">CANCEL BOOKING</a>
					<button  type="button" data-toggle='modal' data-target='#initRefund' id="refundbtn" class="btn  btn-warning pull-left">INITIATE REFUND</button>
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
 <script>
 
var urlParams = new URLSearchParams(window.location.search);
var from = urlParams.get('from');
var x = document.getElementById("ps").value;
if(x=="REFUNDED"){
	document.getElementById("refundbtn").style.display = 'none';
}
if(from == 'refund'){
document.getElementById("refundbtn").style.display = 'none';
document.getElementById("cancelbtn").style.display = 'none';
}

 </script>
 
 
<!-- Modal -->
<div id="initRefund" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INITIATE REFUND</h4>
      </div>
      <div class="modal-body">
      <form action="initiateRefundService.php" method="POST">
    <div class="form-group">
      <label for="code">Enter Amount to refund:</label>
      <input required type="number" class="form-control" id="code" placeholder="Enter Code" name="refundAmount">
    </div>
    <input name ="bookingId" value="<?php echo $item->{'id'} ?>" type="hidden" class="form-control" >
    <button type="submit" class="btn btn-default btn-info">Submit</button>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>

</html>