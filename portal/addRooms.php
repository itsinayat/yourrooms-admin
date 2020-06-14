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
                  <h4 class="card-title">Room Details</h4>

                </div>
                <div class="card-body">
                  <form id ="hotelform" action="updateRoomService.php" method ="POST">

                    <div class="row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Name</label>
                          <input required name="name"  type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Initial Price</label>
                          <input required name="initialPrice"  type="text" class="form-control" >
                        </div>
                      </div>
                   
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Discount Price </label>
                          <input required name="discountPrice"  type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Free Cancellation</label>
                          <input required name="freeCancellation"  type="text" class="form-control" >
                        </div>
                      </div>
               
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Balcony AVL</label>
                          <input required name="balconyAvl" type="text" class="form-control" >
                        </div>
                      </div>
						</div>
						<div class= "row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Double Bed</label>
                          <input required name="doubleBed" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Occupacy</label>
                          <input required name="occupacy"  class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Room Size</label>
                          <input required name="roomSize"  type="text" class="form-control" >
                        </div>
                      </div>
					  
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Room Type</label>
                          <input required name="roomType"  type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Reserved</label>
                          <input required value="false" name="reserved"  type="text" class="form-control" disabled >
                        </div>
                      </div>

					  </div>
					 
					  
              
                    <button type="submit" class="btn btn-primary pull-right">Add Room</button>
                    <div class="clearfix"></div>
					<input name="hotelId" value="<?php echo $_GET['hotelId'] ?>" type="hidden" class="form-control" >
                  </form>
                </div>
              </div>
            </div>
          </div>
		  
		  
							

		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </div>
  </div>




</body>

</html>