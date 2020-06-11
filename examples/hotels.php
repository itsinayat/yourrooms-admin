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
						 <th>
                          STAFFS
                        </th>
                        </th>
						<th>
                          HOTEL IMAGES
                        </th>
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/hotel/getAll-hotels',false,"eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJpbmF5YXQxIiwiY3JlYXRlZCI6MTU5MTcxMTgxMjMyNiwiZXhwIjoxNTkyMzE2NjEyfQ.p_XzzJlS9z6rOlipRnx7AO8gHPz8V0KofYT8o6FbEyQEBWLJcL_qyDsTfz5tnixbA5PwabGGIi7UsSAw6b1AXg");
$response = json_decode($get_data);

$data = $response->{'data'}[0];

foreach ($data as $item) {
?>
                        <tr>
                          <td>
                            <?php echo $item->{'id'} ?><br>
							<a href="dashboard?tab=update_hotel&id=<?php echo $item->{'id'} ?>" class="btn btn-sm btn-danger">update</a>
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
						  <td>
                              <?php
								$ST =$item->{'staffs'};
								foreach ($ST as $s) {
									echo "<a href ='dashboard.php?tab=user&id=".$s->{'id'}."'>"."".$s->{'id'}."</a>&nbsp; &nbsp; &nbsp;";
								}	  
							  ?>
                          </td>
						  <td>
								
                              <?php
								$IM =$item->{'hotelImages'};
								foreach ($IM as $i) {
									echo "<a href ='dashboard.php?tab=image&id=".$i->{'id'}."'>".$i->{'id'}."</a>&nbsp; &nbsp; &nbsp;";
								}	  
							  ?>
                         
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
</body>

</html>