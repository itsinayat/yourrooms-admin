<?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
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
    <h4 class="card-title ">ALL REFUNDS</h4>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						<th>BookingId
                        </th>
                        <th>
                          RefundId
                        </th>
                        <th>
                          PaymentId
                        </th>
						<th>
                          Status
                        </th>
						<th>
                          Total Amount
                        </th>
						<th>
                          Refund Amount
                        </th>
						<th>
                          Created At
                        </th>
						
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/admin/getAllRefunds',false,$_SESSION["token"]);
$response = json_decode($get_data);

$data = $response->{'data'}[0];

foreach ($data as $item) {
?>
                        <tr>
                          <td>
                            <?php echo $item->{'bookingId'} ?><br>
							<a href="dashboard?tab=updateBooking&from=refund&id=<?php echo $item->{'bookingId'} ?>" class="btn btn-sm btn-primary">SHOW</a>
                          </td>
						  <td>
                             <?php echo $item->{'refundId'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'paymentId'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'status'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'totalAmount'} ?>
                          </td>
						   
						  <td>
                             <?php echo $item->{'refundAmount'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'createdAt'} ?>
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