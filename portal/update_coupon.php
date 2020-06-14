<?php include "config.php"; ?>
 <?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/admin/getCouponById/'.$_GET['id'],false,$_SESSION["token"]);
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
                  <form id ="hotelform" action="updateCouponService.php" method ="POST">
				  <input type="hidden" name ="id" value= "<?php echo $item->{'id'} ?>">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Id</label>
                          <input value="<?php echo $item->{'id'} ?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Code</label>
                          <input name="code" value="<?php echo $item->{'code'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">VALUE</label>
                          <input name="value" value="<?php echo $item->{'value'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
                   
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">ENABLED </label>
                          <input name="enabled" value="<?php echo $item->{'enabled'}? 'true':'false' ?>" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">EXPIRY(yyyy-mm-dd)</label>
                          <input name="expiry" value="<?php echo $item->{'expiry'} ?>" type="text" class="form-control" >
                        </div>
                      </div>
					  </div>
					  <button type="submit" class="btn btn-primary pull-right">Update Coupon</button>
                    <div class="clearfix"></div>
        </form>
		</div>
    </div>
  </div>
</div>


</body>

</html>