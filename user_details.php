<?php 
	
	include "config.php";
	include "includes/header.php"; 
	include "includes/check_login.php";
	include "includes/nav.php";
  
	if(isset($_GET['user_id'])){
      $user_id = intval($_GET['user_id']);
      $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = $user_id");
      $row = mysqli_fetch_array($sql);
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $email = $row['email'];
      $password = $row['password'];
      $phone = $row['phone'];
      if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
      $user_created = date($config_date_format,$row['user_created']);
      $user_modified = date($config_date_format,$row['user_modified']);
  }

?>
	    
<section class="content-header">
  <h3>User Details</h3>
  <ol class="breadcrumb">
  	<li><a href="index.php">Home</a></li>
  	<li><a href="users.php">Users</a></li>
  	<li class="active">User Details</li>
  </ol>
</section>
<section class="content">
  <div class="box box-primary">
    <div class="box-body">
      <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo "$first_name $last_name"; ?></p>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo "$email"; ?></p>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo "$phone"; ?></p>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label">Created</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo "$user_created"; ?></p>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label">Modified</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo "$user_modified"; ?></p>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <a class="btn btn btn-default" href="users.php">Back</a>
      </div>
    </div>
  </div>
</section>

<?php include "includes/footer.php"; ?>