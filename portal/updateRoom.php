<?php include "config.php"; ?>
 <?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/hotel/getRoom?id='.$_GET['id'],false,$_SESSION["token"]);
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
                  <h4 class="card-title">Room Details (<?php echo $_GET['id']?>)</h4>

                </div>
                <div class="card-body">
                  <form id ="hotelform" action="updateRoomService.php" method ="POST">

                    <div class="row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Id</label>
                          <input value="<?php echo $item->{'id'} ?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Name</label>
                          <input name="name" value="<?php echo $item->{'name'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Initial Price</label>
                          <input name="initialPrice" value="<?php echo $item->{'initialPrice'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                   
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Discount Price </label>
                          <input name="discountPrice" value="<?php echo $item->{'discountPrice'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Free Cancellation</label>
                          <input name="freeCancellation" value="<?php echo $item->{'freeCancellation'}? 'true':'false' ?>" type="text" class="form-control" >
                        </div>
                      </div>
               
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Balcony AVL</label>
                          <input name="balconyAvl" value="<?php echo $item->{'balconyAvl'} ? 'true':'false' ?>" type="text" class="form-control" >
                        </div>
                      </div>
						</div>
						<div class= "row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Double Bed</label>
                          <input name="doubleBed" value="<?php echo $item->{'doubleBed'} ? 'true':'false' ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Occupacy</label>
                          <input name="occupacy" value="<?php echo $item->{'occupacy'}?>" type="text" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Room Size</label>
                          <input name="roomSize" value="<?php echo $item->{'roomSize'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
					  
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Room Type</label>
                          <input name="roomType" value="<?php echo $item->{'roomType'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Reserved</label>
                          <input name="reserved" value="<?php echo $item->{'reserved'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Disabled</label>
                          <input name="disabled" value="<?php echo $item->{'disabled'}? 'true' : 'false'; ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">create_dt</label>
                          <input name="freeWifi" value="<?php echo $item->{'create_dt'}?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">update_dt</label>
                          <input  value="<?php echo $item->{'update_dt'} ?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
					  </div>
					 
					  
              
                    <button type="submit" class="btn btn-primary pull-right">Update Room</button>
                    <div class="clearfix"></div>
					<input name="roomId" value="<?php echo $item->{'id'} ?>" type="hidden" class="form-control" >
					<input name="hotelId" value="<?php echo $_GET['hotelId'] ?>" type="hidden" class="form-control" >
                  </form>
				  <div class="row">
					    <div class="col-md-4">
						 <label class="label">IMAGES <button type="button" data-toggle='modal' data-target='#addImage' class='btn btn-sm btn-warning'>ADD</button></label><br>
                         <?php
								$IM =$item->{'roomImages'};
								foreach ($IM as $i) {
									echo "<img width='20px' src ='".$baseurl."/".$i->{'url'}."'>&nbsp;&nbsp;&nbsp;<button class='btn btn-info btn-sm' type='button' data-toggle='modal' data-target='#exampleModal".$i->{'id'}."'>VIEW</button>&nbsp;&nbsp;&nbsp;<a href='deleteImage.php?&type=room&id=".$i->{'id'}."'  class='btn btn-sm btn-danger'>DELETE</a><br>";
								?>
								<div class="modal fade" id="exampleModal<?php echo $i->{'id'} ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      
       <center><?php echo "<img width='500px' src ='".$baseurl."/".$i->{'url'}."'>"; ?></center>

     
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
		  
		  
							

		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php 
$usersobj = callAPI('GET', $baseurl.'/admin/getAllUsers',false,$_SESSION["token"]);
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
    <input type="hidden" name="flag" value="room">
  <input type="submit" value="Upload Image" name="submit">
</form>
		</div>
    </div>
  </div>
</div>

</body>

</html>