<?php include "config.php"; ?>
<?php 
if(!isset($_SESSION["token"])){
	header('Location: login.php');
} ?>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head> 
<body>
<div class="card">
<div class="card-header card-header-primary">
    <h4 class="card-title ">ALL BOOKINGS</h4>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						<th>ID
                        </th>
                        <th>
                          BOOKING_ID
                        </th>
                        <th>
                          HOTEL_ID
                        </th>
						<th>
                          ROOM_ID
                        </th>
						<th>
                          NO_OF_GUESTS
                        </th>
						<th>
                          TXN
                        </th>
						<th>
                          BKNG_STATUS
                        </th>
						<th>
                          PYMT_STATUS
                        </th>
                        <th>
                          CHKIN_DATE/STATUS
                        </th>
                        <th>
                          CHKOUT_DATE/STATUS
                        </th>
						 <th>
                          USER
                        </th>
						 <th>
                          BKNG_PRICE(Rs)
                        </th>
						 <th>
                          COUPON
                        </th>
						<th>
                          COUPON_DSCNT(Rs)
                        </th>
						 <th>
                          DISCNT(Rs)
                       
                        </th>
						<th>
                          GST
                        </th>
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/admin/getAllBookings',false,$_SESSION["token"]);
$response = json_decode($get_data);

$data = $response->{'data'}[0];

foreach ($data as $item) {
?>
                        <tr>
                          <td>
                            <?php echo $item->{'id'} ?><br>
							<a href="index.php?tab=updateBooking&id=<?php echo $item->{'id'} ?>" class="btn btn-sm btn-primary">update</a>
                          </td>
						  <td>
                             <?php echo $item->{'bookingId'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'hotelId'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'rooms'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'noOfGuests'} ?>
                          </td>
						   <td>
						  <?php if($item->{'transaction'} != null){ ?>
                             <a href="index.php?tab=view_trxn&id=<?php echo $item->{'transaction'}->{'id'} ?>">View</a>
							<?php }else{
								echo "NA";
							} ?>
						  </td>
						  <td>
                             <?php echo $item->{'bookingStatus'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'paymentStatus'} ?>
                          </td>
						  <td>
                             <?php echo substr($item->{'checkinDate'},0,10).'/'.$item->{'checkinStatus'} ?>
                          </td>
						  <td>
                             <?php echo substr($item->{'checkoutDate'},0,10). '/'. $item->{'checkoutStatus'} ?>
                          </td>
						  
						  <td>
						  <?php if($item->{'user'}-> {'id'} != null){ ?>
                             <a href="index.php?tab=user&id=<?php echo $item->{'user'}-> {'id'} ?>">View</a>
							<?php }else{
								echo "NA";
							} ?>
                          
                          </td>
						  <td>
                            <?php echo $item->{'booking_price'} ?>
                          </td>
						  <td>
                             <?php
							echo $item->{'discount_coupon'}; 
							 
							 ?>
                          </td>
						  <td>
                              <?php echo $item->{'coupon_discount'} ?>
                          </td>
						  <td>
                           <?php echo $item->{'discount_price'} ?>
                          </td>
						  <td>
                              <?php echo $item->{'gst'} ?>
                          </td>
						  
                        </tr>
                 <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
			  </div>
            </div>
    </div>
  </div>
<script>
$(document).ready(function() {
    var table = $('#example').removeAttr('width').DataTable( {
        columnDefs: [
            { width: 500, targets: 0 },
			{"className": "dt-center", "targets": "_all"}
        ],
		
        fixedColumns: true
    } );
} );
</script>
</body>

</html>