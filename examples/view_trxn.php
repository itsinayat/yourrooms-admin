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
    <h4 class="card-title ">TRANSACTION DETAIL(<?php echo $_GET['id']?>)</h4>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						 <th>
                          ORDER_ID
                        </th>
                        <th>
                          TOTAL_AMT
                        </th>
                        <th>
                          PAID_AMT
                        </th>
						<th>
                          DISCOUNT_TYPE
                        </th>
						<th>
                          PAYMENT_MODE
                        </th>
						
						
						<th>
                          PYMT_ID
                        </th>
                        <th>
                          CREATE_DATE
                        </th>
                        <th>
                          TRXN_ID
                        </th>
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/admin/viewTransactionById/'.$_GET['id'],false,$_SESSION["token"]);
$response = json_decode($get_data);
$item = $response->{'data'}[0];
?>
                        <tr>
                          <td>
                            <?php echo $item->{'order_id'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'totalAmount'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'paidAmount'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'discountType'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'payment_mode'} ?>
                          </td>
						  
				
				
						  <td>
                             <?php echo $item->{'paymentId'} ?>
                          </td>
						  <td>
                              <?php echo substr($item->{'create_dt'},0,19) ?>
                          </td>
						  <td>
                            <?php echo $item->{'transaction_id'} ?>
                          </td>
						  
                        </tr>
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
            { width: 200, targets: 0 },
			{"className": "dt-center", "targets": "_all"}
        ],
		
        fixedColumns: true
    } );
} );
</script>
</body>

</html>