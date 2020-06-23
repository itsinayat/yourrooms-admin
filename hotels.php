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
    <h4 class="card-title ">ALL HOTELS</h4>
</div>

<div class="card-body">
 <button type="button" data-toggle='modal' data-target='#addHotel' class="btn btn-danger pull-left">ADD NEW HOTEL</button>
          
    <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						<th>ID
                        </th>
                        <th>
                          HOTEL NAME
                        </th>
                        <th>
                          ADDRESS
                        </th>
						<th>
                          LATTITUDE
                        </th>
						<th>
                          LONGITUDE
                        </th>
						<th>
                          PAY AT HOTEL
                        </th>
						<th>
                          FREE BREAKFAST
                        </th>
						<th>
                          COUPLE FRIENDLY
                        </th>
                        <th>
                          FREE WIFI
                        </th>
                       
						 <th>
                          RATING
                        </th>
						 <th>
                          AC
                        </th>
						<th>
                          BLOCKED?
                        </th>
						<th>
                          CREATED ON?
                        </th>
						
						
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/hotel/getAll-hotels',false,$_SESSION["token"]);
$response = json_decode($get_data);

$data = $response->{'data'}[0];

foreach ($data as $item) {
?>
                        <tr>
                          <td>
                            <?php echo $item->{'id'} ?><br>
							<a href="index.php?tab=update_hotel&id=<?php echo $item->{'id'} ?>" class="btn btn-sm btn-primary">update/addImage/Staff</a>
                          </td>
						  <td>
                             <?php echo $item->{'hotelName'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'address'}.",".$item->{'city'}.",".$item->{'pincode'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'lattitude'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'longitude'} ?>
                          </td>
						   <td>
							<?php echo $item->{'longitude'} ?>
						  </td>
						  <td>
                             <?php echo $item->{'freeBreakFast'}  ? 'true' : 'false'; ?>
                          </td>
						  <td>
                             <?php echo $item->{'coupleFriendly'}? 'true' : 'false'; ?>
                          </td>
						  <td>
                             <?php echo $item->{'freeWifi'} ? 'true' : 'false';?>
                          </td>
						  
						  
						  <td>
                            <?php echo $item->{'rating'} ?>
                          </td>
						  <td>
                             <?php
							echo $item->{'ac'}? 'true' : 'false';; 
							 
							 ?>
                          </td>
						  <td>
                              <?php echo $item->{'isBlocked'}? 'true' : 'false'; ?>
                          </td>
						  <td>
                           <?php echo $item->{'create_dt'} ?>
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
           
			{"className": "dt-center", "targets": "_all"}
        ],
		
        fixedColumns: true
    } );
} );
</script>
<!-- Modal -->
<div id="addHotel" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADD NEW HOTEL</h4>
      </div>
      <div class="modal-body">
         <form action="updateHotelService.php" method="POST">
    <div class="form-group">
      <label for="code">NAME:</label>
      <input required type="text" class="form-control"  placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="value">ADDRESS:</label>
      <input required type="text" class="form-control"  placeholder="Enter Address" name="address">
    </div>
	<div class="form-group">
      <label for="expiry">CITY:</label>
      <input required type="text" class="form-control"  placeholder="Enter City" name="city">
    </div>
	
	<div class="form-group">
      <label for="expiry">PINCODE:</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="pincode">
    </div>
	<div class="form-group">
      <label for="expiry">LATTITUDE:</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="lattitude">
    </div>
	<div class="form-group">
      <label for="expiry">LONGITUDE:</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="longitude">
    </div>
	<div class="form-group">
      <label for="expiry">PAY AT HOTEL(true/false):</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="payathotel">
    </div>
	<div class="form-group">
      <label for="expiry">FREE BREAKFAST(true/false):</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="freeBreakFast">
    </div>
	<div class="form-group">
      <label for="expiry">COUPLE FRIENDLY(true/false):</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="coupleFriendly">
    </div>
	<div class="form-group">
      <label for="expiry">FREE WIFI(true/false):</label>
      <input required type="text" class="form-control" placeholder="true/false" name="freeWifi">
    </div>
	<div class="form-group">
      <label for="expiry">AC AVAILABLE?(true/false):</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="ac">
    </div>
	<div class="form-group">
      <label for="expiry">IS BLOCKED?(true/false):</label>
      <input required type="text" class="form-control"  placeholder="true/false" name="isBlocked">
    </div>
    <button type="submit" class="btn btn-info btn-info">Submit</button>
  </form>
      </div>
     
    </div>
  </div>

</div>
</body>

</html>