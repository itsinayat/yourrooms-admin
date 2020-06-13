<?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/admin/findHotel/'.$_GET['id'],false,$_SESSION["token"]);
$response = json_decode($get_data);
$item = $response->{'data'}[0];
?>
	  <html>
<head>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


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
                  <h4 class="card-title">Hotel Details (<?php echo $_GET['id']?>)</h4>
				  </div>
                <div class="card-body">
                  <form id ="hotelform" action="updateHotelService.php" method ="POST">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Id</label>
                          <input value="<?php echo $item->{'id'} ?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Hotel Name</label>
                          <input name="name" value="<?php echo $item->{'hotelName'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">ADDRESS</label>
                          <input name="address" value="<?php echo $item->{'address'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                   
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">CITY </label>
                          <input name="city" value="<?php echo $item->{'city'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">PIN CODE</label>
                          <input name="pincode" value="<?php echo $item->{'pincode'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
               
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Lattitude</label>
                          <input name="lattitude" value="<?php echo $item->{'lattitude'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
						</div>
						<div class= "row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Longitude</label>
                          <input name="longitude" value="<?php echo $item->{'longitude'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Pay AT Hotel</label>
                          <input name="payathotel" value="<?php echo $item->{'payAtHotel'}? 'true' : 'false'; ?>" type="text" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Free Breakfast</label>
                          <input name="freeBreakFast" value="<?php echo $item->{'freeBreakFast'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Couple Friendly</label>
                          <input name="coupleFriendly" value="<?php echo $item->{'coupleFriendly'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Free WIFI?</label>
                          <input name="freeWifi" value="<?php echo $item->{'freeWifi'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Rating</label>
                          <input  value="<?php echo $item->{'rating'} ?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
					  </div>
					  <div class="row">
					  
					  
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">AC AVAILABLE?</label>
                          <input name="ac" value="<?php echo $item->{'ac'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					    <div class="col-md-2">
                        <div class="fg">
                          <label class="label">isBlocked</label>
                          <input name="isBlocked" value="<?php echo $item->{'isBlocked'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">CREATED  ON</label>
                          <input value="<?php echo $item->{'create_dt'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					  
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Last Updated On</label>
                          <input value="<?php echo $item->{'update_dt'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					  
					  
					  
					  </div>
					
              
                    <button type="submit" class="btn btn-primary pull-right">Update Hotel</button>
                    <div class="clearfix"></div>
					<input name="hotelId" value="<?php echo $item->{'id'} ?>" type="hidden" class="form-control" >
                  </form>
				    <div class="row">
					    <div class="col-md-3">
						 <label class="label">STAFFS <button type="button" data-toggle='modal' data-target='#addStaff' class='btn btn-sm btn-warning'>ADD</button></label><br>
							<?php
								$ST =$item->{'staffs'};
								foreach ($ST as $s) {
									echo "<a class='btn btn-info btn-sm' href ='index?tab=user&id=".$s->{'id'}."'>VIEW STAFF(".$s->{'id'}.")</a><a href='removeStaff.php?staffId=".$s->{'id'}."&hotelId=".$_GET['id']."'  class='btn btn-sm btn-danger'>REMOVE</a><br>";
								}	  
							  ?>
                      </div>
					    <div class="col-md-3">
						 <label class="label">IMAGES <button type="button" data-toggle='modal' data-target='#addImage' class='btn btn-sm btn-warning'>ADD</button></label><br>
                         <?php
								$IM =$item->{'hotelImages'};
								foreach ($IM as $i) {
									echo "<img width='20px' src ='http://localhost:8080/".$i->{'url'}."'>&nbsp;&nbsp;&nbsp;<button class='btn btn-info btn-sm' type='button' data-toggle='modal' data-target='#exampleModal".$i->{'id'}."'>VIEW</button>&nbsp;&nbsp;&nbsp;<a href='deleteImage.php?type=hotel&id=".$i->{'id'}."'  class='btn btn-sm btn-danger'>DELETE</a><br>";
								?>
								<div class="modal fade" id="exampleModal<?php echo $i->{'id'} ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      
       <center><?php echo "<img width='500px' src ='http://localhost:8080/".$i->{'url'}."'>"; ?></center>

     
    </div>
  </div>
</div>
								<?php
								}	  
							  ?>
							  <!-- Modal -->

                      </div>

					  
                    </div>
                </div>
              </div>
            </div>
          </div>
		  
		  
							
		  
		  <!----- room start-->
		  <div class="card">
<div class="card-header card-header-primary">
<h4 class="card-title ">ROOMS</h4>
</div>

<div class="card-body">
	  <a href="index?tab=addRooms&hotelId=<?php echo $_GET['id']; ?>" class='btn btn-danger'>ADD ROOMS TO HOTEL</a> 
              
   <div class="table-responsive">
        <table id="example" class="table .table-bordered display" style="width:100%">
            <thead class="text-primary">
						<th>ID
                        </th>
						<th>NAME
                        </th>
						<th>INITIAL PRICE
                        </th>
                        <th>
                          DISCOUNT PRICE
                        </th>
                        <th>
                         FREE CANCEL
                        </th>
						 <th>
                         BALCONY
                        </th>
						<th>
                          DOUBLE BED
                        </th>
						<th>
                          OCCUPACY
                        </th>
						<th>
                          ROOM SIZE
                        </th>
						<th>
                          ROOM TYPE
                        </th>
						<th>
                          RESERVED
                        </th>
						<th>
                          CREATED ON
                        </th>
						
						<th>
                          DISABLED
                        </th>
						<th>
                          UPDATED ON
                        </th>
						<th>
                         IMAGES
                        </th>
                      </thead>
                      <tbody>
					  
<?php 
$get_data1 = callAPI('GET', 'http://localhost:8080/hotel/getAll-rooms?hotel_id='.$_GET['id'].'',false,$_SESSION["token"]);
$response1 = json_decode($get_data1);

$data1 = $response1->{'data'}[0];

foreach ($data1 as $item) {
?>
                        <tr>
						 <td>
                            <?php echo $item->{'id'} ?>
                          </td>
						  <td>
                            <?php echo $item->{'name'} ?>
                          </td>
                          <td>
                            <?php echo $item->{'initialPrice'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'discountPrice'} ?>
                          </td>
						  <td>
                             <?php echo $item->{'freeCancellation'}? 'true':'false' ?>
                          </td>
						  <td>
                             <?php echo $item->{'balconyAvl'}? 'true':'false' ?>
                          </td>
						  <td>
                             <?php echo $item->{'doubleBed'} ? 'true':'false' ?>
                          </td>
						   <td>
                             <?php echo $item->{'occupacy'} ?>
                          </td>
						   <td>
                             <?php echo $item->{'roomSize'} ?>
                          </td>
						   <td>
                             <?php echo $item->{'roomType'} ?>
                          </td>
						   <td>
                             <?php echo $item->{'reserved'}? 'true':'false' ?>
                          </td>
						   <td>
                             <?php echo $item->{'create_dt'} ?>
                          </td>
						   <td>
                             <?php echo $item->{'disabled'}? 'true':'false' ?>
                          </td>
						  
						   <td>
                             <?php echo $item->{'update_dt'} ?>
                          </td>
						  <td>
						  <a href="index?tab=updateRoom&hotelId=<?php echo $_GET['id'] ?>&id=<?php echo $item->{'id'} ?>" class="btn btn-sm btn-primary" >VIEW</a>
						  </td>

						  
						  
                        </tr>
                 <?php }?>
                      </tbody>
                    </table>
					<!-- image start-->
					<!-- image end-->
                  </div>
				    </div>
              </div>
		  
		  <!---room end --->
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php 
$usersobj = callAPI('GET', 'http://localhost:8080/admin/getAllUsers',false,$_SESSION["token"]);
$users = json_decode($usersobj);
$userslist = $users->{'data'}[0];
?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <div class="modal-body">
	 <form action="addStaff.php" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">SELECT USERNAME TO ADD FROM BELOW:</label>
            <select name ='users' class="form-control">
			<?php foreach ($userslist as $u) { ?>
			<option value="<?php echo $u->{'id'} ?>"> <?php echo $u->{'username'} ?></option>
			<?php } ?>
			</select>
			<input type="hidden" value="<?php echo $_GET['id'] ?>" name = "hotelId">
          </div>
		  <input type="submit" value="Add Now">
        </form>
		</div>
    </div>
  </div>
</div>


<div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <div class="modal-body">
	<form action="addImage.php" method="post" enctype="multipart/form-data">
	Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
   <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <input type="hidden" name="flag" value="hotel">
  <input type="submit" value="Upload Image" name="submit">
</form>
		</div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    var table = $('#example').removeAttr('width').DataTable( {
        columnDefs: [
            { width: 100, targets: 0 },
			{"className": "dt-center", "targets": "_all"}
        ],
		
        fixedColumns: true
    } );
} );
</script>
</body>

</html>