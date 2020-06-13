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
    <h4 class="card-title ">ALL USERS</h4>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						<th>ID
                        </th>
                        <th>
                          FIRST NAME
                        </th>
                        <th>
                          LAST NAME
                        </th>
						<th>
                          EMAIL
                        </th>
						<th>
                          MOBILE
                        </th>
						<th>
                          DOB
                        </th>
						<th>
                          GENDER
                        </th>
						
                        <th>
                          REFERRAL CODE
                        </th>
						<th>
                          REFERRED_BY
                        </th>
                        <th>
                          IS VERIFIED
                        </th>
						
						 <th>
                          IS DELETED
                        </th>
						 <th>
                          CREATED ON
                        </th> <th>
                          UPDATED ON
                        </th>
						 <th>
                          USERNAME
                        </th>
                        
						<th>
                          IS ENABLED
                        </th>
						<th>
                          ROLE
                        </th>
                      </thead>
                      <tbody>
					  
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/admin/getAllUsers',false,$_SESSION["token"]);
$response = json_decode($get_data);

$data = $response->{'data'}[0];

foreach ($data as $item) {
?>
                        <tr>
                          <td>
                            <?php echo $item->{'id'} ?><br>
							<a href="dashboard?tab=user&id=<?php echo $item->{'id'} ?>" class="btn btn-sm btn-primary">update</a>
                          </td>
						  <td>
                             <?php echo $item->{'firstName'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'lastName'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'email'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'mobile'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'dob'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'gender'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'referral_code'} ?>
                          </td>
						  <td>
                             <?php
if(isset($item->{'referred_by'})){
?>
<a href="dashboard?tab=user&id=<?php echo $item->{'referred_by'} ?>">View</a>
<?php
}else{
	echo "NA";
}
							 
							 ?>
                          </td>
						  <td>
                             <?php echo $item->{'is_verified'}?'true':'false' ?>
                          </td>
						
						  <td>
                             <?php echo $item->{'del_ind'}?'true':'false' ?>
                          </td>
						  <td>
                             <?php echo $item->{'create_dt'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'update_dt'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'username'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'enabled'}?'true':'false' ?>
                          </td>
						  <td>
                             <?php echo $item->{'role'}->{'name'} ?>
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