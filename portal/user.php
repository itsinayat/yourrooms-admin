<?php include "config.php"; ?>
 <?php 
if(!isset($_SESSION["token"])){
	header('Location: login');
} ?>
<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/admin/findUser/'.$_GET['id'],false,$_SESSION["token"]);
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
                  <h4 class="card-title">User Profile (<?php echo $_GET['id']?>)</h4>

                </div>
                <div class="card-body">
                  <form action ="updateProfile.php" method="POST">
				  <input name="id" value="<?php echo $item->{'id'} ?>" type="hidden" class="form-control">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Id</label>
                          <input value="<?php echo $item->{'id'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Username</label>
                          <input value="<?php echo $item->{'username'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Email address</label>
                          <input value="<?php echo $item->{'email'} ?>" type="email" class="form-control" disabled>
                        </div>
                      </div>
                   
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">First Name</label>
                          <input value="<?php echo $item->{'firstName'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Last Name</label>
                          <input value="<?php echo $item->{'lastName'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
               
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Mobile</label>
                          <input value="<?php echo $item->{'mobile'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
						</div>
						<div class= "row">
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">DOB</label>
                          <input value="<?php echo $item->{'dob'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">GENDER</label>
                          <input value="<?php echo $item->{'gender'} ?>" type="text" class="form-control" disabled >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Referred By</label>
                          <input value="<?php echo $item->{'referred_by'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Referral Code</label>
                          <input value="<?php echo $item->{'referral_code'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Is Verified*</label>
                          <input name="verified" value="<?php echo $item->{'is_verified'}?'true':'false' ?>" type="text" class="form-control">
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Enabled*</label>
                          <input name="enabled" value="<?php echo $item->{'enabled'}?'true':'false' ?>" type="text" class="form-control" >
                        </div>
                      </div>
					  </div>
					  <div class="row">
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Is Deleted*</label>
                          <input name="deleted" value="<?php echo $item->{'del_ind'}?'true':'false' ?>" type="text" class="form-control" >
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Created On</label>
                          <input value="<?php echo $item->{'create_dt'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Updated On</label>
                          <input value="<?php echo $item->{'update_dt'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					    <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Role*</label>
                          <input name="role" value="<?php echo $item->{'role'}->{'name'} ?>" type="text" class="form-control">
                        </div>
                      </div>
					  </div>
					  <div class="row">
					    <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Wallet Id</label>
                          <input value="<?php echo $item->{'wallet'}->{'id'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					    <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Wallet Balance</label>
                          <input value="<?php echo $item->{'wallet'}->{'balance'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					  
                    </div>
                   
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
		  <p>* can be updated</p>
        </div>
      </div>
    </div>
  </div>
 

</body>

</html>