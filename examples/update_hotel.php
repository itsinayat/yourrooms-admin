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
					  <div class="row">
					    <div class="col-md-4">
						 <label class="label">STAFFS <button type="button" data-toggle='modal' data-target='#addStaff' class='btn btn-sm btn-warning'>ADD</button></label><br>
							<?php
								$ST =$item->{'staffs'};
								foreach ($ST as $s) {
									echo "<a class='btn btn-info btn-sm' href ='dashboard.php?tab=user&id=".$s->{'id'}."'>VIEW STAFF(".$s->{'id'}.")</a><a href='removeStaff.php?staffId=".$s->{'id'}."&hotelId=".$_GET['id']."'  class='btn btn-sm btn-danger'>REMOVE</a><br>";
								}	  
							  ?>
                      </div>
					    <div class="col-md-4">
						 <label class="label">IMAGES <button type="button" data-toggle='modal' data-target='#addImage' class='btn btn-sm btn-warning'>ADD</button></label><br>
                         <?php
								$IM =$item->{'hotelImages'};
								foreach ($IM as $i) {
									echo "<img width='20px' src ='http://localhost:8080/".$i->{'url'}."'>&nbsp;&nbsp;&nbsp;<button class='btn btn-info btn-sm' type='button' data-toggle='modal' data-target='#exampleModal".$i->{'id'}."'>VIEW</button>&nbsp;&nbsp;&nbsp;<a href='deleteImage.php?id=".$i->{'id'}."'  class='btn btn-sm btn-danger'>DELETE</a><br>";
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
              
                    <button type="submit" class="btn btn-primary pull-right">Update Hotel</button>
                    <div class="clearfix"></div>
					<input name="hotelId" value="<?php echo $item->{'id'} ?>" type="hidden" class="form-control" >
                  </form>
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
    <?php 
$usersobj = callAPI('GET', 'http://localhost:8080/admin/getAllUsers',false,$_SESSION["token"]);
$users = json_decode($usersobj);
$userslist = $users->{'data'}[0];
?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <div class="modal-body">
	<form action="addImage.php" method="post" enctype="multipart/form-data">
	Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
   <input type="hidden" name="hotelId" value="<?php echo $_GET['id'] ?>">
    <input type="hidden" name="flag" value="hotel">
  <input type="submit" value="Upload Image" name="submit">
</form>
		</div>
    </div>
  </div>
</div>
</body>

</html>