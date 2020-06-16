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
<?php include "config.php"; ?>
<div class="row">

<?php 
include 'provider.php';
$get_data = callAPI('GET', $baseurl.'/admin/getAllConfiguration',false,$_SESSION["token"]);
$response = json_decode($get_data);
$data = $response->{'data'}[0];
foreach($data as $item){
?>
<div class="col-sm-3">
<div class="card">
<div class="card-header card-header-primary">
    <h4 class="card-title "><?php echo $item->{'key'} ?></h4>
</div>
<form action="updateConfig.php" method="POST">
<div class="card-body">
<input type="hidden" name="key" value="<?php echo $item->{'key'} ?>">
<input name="value" type= "text" class="form-control" value="<?php echo $item->{'value'} ?>">
 </div>
 <input type="submit" class="btn btn-info btn-sm" value="UPDATE">
 <a href="deleteConfig.php?key=<?php echo $item->{'key'} ?>" class="btn btn-danger btn-sm">DELETE</a>
</form>
</div>
</div>
<?php }?>

</div>


<button type="button" data-toggle='modal' data-target='#addCoupon' class="btn btn-primary">ADD NEW CONFIG</button>

<!-- Modal -->
<div id="addCoupon" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADD NEW CONFIGURATION</h4>
      </div>
      <div class="modal-body">
         <form action="addNewConfig.php" method="POST">
    <div class="form-group">
      <label for="code">key:</label>
      <input required type="text" class="form-control" id="code" placeholder="Enter Key	" name="key">
    </div>
    <div class="form-group">
      <label for="value">value:</label>
      <input required type="text" class="form-control" id="value" placeholder="Enter Value" name="value">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
      </div>
     
    </div>

  </div>
</div>
</body>

</html>