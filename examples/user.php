<?php 
include 'provider.php';
$get_data = callAPI('GET', 'http://localhost:8080/admin/findUser/'.$_GET['id'],false,"eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJpbmF5YXQxIiwiY3JlYXRlZCI6MTU5MTcxMTgxMjMyNiwiZXhwIjoxNTkyMzE2NjEyfQ.p_XzzJlS9z6rOlipRnx7AO8gHPz8V0KofYT8o6FbEyQEBWLJcL_qyDsTfz5tnixbA5PwabGGIi7UsSAw6b1AXg");
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
                  <form>
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
                          <label class="label">Is Verified?</label>
                          <input value="<?php echo $item->{'is_verified'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Is Enabled?</label>
                          <input value="<?php echo $item->{'is_enabled'} ?>" type="text" class="form-control" disabled>
                        </div>
                      </div>
					  </div>
					  <div class="row">
					   <div class="col-md-2">
                        <div class="fg">
                          <label class="label">Is Deleted?</label>
                          <input value="<?php echo $item->{'del_ind'} ?>" type="text" class="form-control" disabled>
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
                          <label class="label">Role</label>
                          <input value="<?php echo $item->{'role'}->{'name'} ?>" type="text" class="form-control" disabled>
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
        </div>
      </div>
    </div>
  </div>
 

</body>

</html>