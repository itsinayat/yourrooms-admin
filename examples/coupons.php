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
    <h4 class="card-title ">ALL BOOKINGS</h4>
</div>

<div class="card-body">
<button type="button" data-toggle='modal' data-target='#addCoupon' class="btn btn-danger pull-left">ADD NEW COUPON</button>
              
    <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						<th>UPDATE
                        </th>
						<th>DELETE
                        </th>
						<th>ID
                        </th>
                        <th>
                          COUPON CODE
                        </th>
                        <th>
                         VALUE
                        </th>
						<th>
                          EXPIRY
                        </th>
						<th>
                          ENABLED
                        </th>
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/user/get-all-coupons',false,$_SESSION["token"]);
$response = json_decode($get_data);

$data = $response->{'data'}[0];

foreach ($data as $item) {
?>
                        <tr>
						 <td>
                            <a href ="dashboard.php?tab=update_coupon&id=<?php echo $item->{'id'} ?>" >UPDATE</a>
                          </td>
						  <td>
                            <a href ="deleteCouponService.php?id=<?php echo $item->{'id'} ?>" >DELETE</a>
                          </td>
                          <td>
                            <?php echo $item->{'id'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'code'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'value'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'expiry'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'enabled'} ? 'true':'false' ?>
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

<!-- Modal -->
<div id="addCoupon" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADD NEW COUPON</h4>
      </div>
      <div class="modal-body">
         <form action="updateCouponService.php" method="POST">
    <div class="form-group">
      <label for="code">Code:</label>
      <input type="text" class="form-control" id="code" placeholder="Enter Code" name="code">
    </div>
    <div class="form-group">
      <label for="value">value:</label>
      <input type="text" class="form-control" id="value" placeholder="Enter Value" name="value">
    </div>
	<div class="form-group">
      <label for="expiry">Expiry(yyyy-mm-dd):</label>
      <input type="text" class="form-control" id="expiry" placeholder="Enter expiry" name="expiry">
    </div>
	
	<div class="form-group">
      <label for="expiry">enabled(true/false):</label>
      <input type="text" class="form-control" id="enabled" placeholder="true/false" name="enabled">
    </div>
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