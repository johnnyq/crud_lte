<?php 
	
	include "config.php";
	include "includes/header.php"; 
	include "includes/check_login.php";
	include "includes/nav.php";

	$users_added_today = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM users WHERE DATE(FROM_UNIXTIME(user_created)) = CURDATE()"));

?>

<section class="content-header">
	<h1>Dashboard<small>Version 1.0</small></h1>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Users Added Today</span>
              <span class="info-box-number"><?php echo $users_added_today; ?></span>
            </div>
          </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>