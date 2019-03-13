<?php 
	
	include "config.php";
	include "includes/header.php"; 
  
  if(isset($_POST['update_password'])){
    $user_id = intval($_POST['user_id']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    mysqli_query($mysqli,"UPDATE users SET password = '$password' WHERE user_id = $user_id");
    header("Location: login.php");
  }

	if(isset($_GET['code'])){
  	$code = $_GET['code'];
  	$email = $_GET['email'];
    $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE activation_code = $code AND email = '$email'");
  	if(mysqli_num_rows($sql)==1){
      $row = mysqli_fetch_array($sql);
      $user_id = $row['user_id'];

?>
<section class="content-header">	    
  <h4>Reset Password</h4>
</section>    
<section class="content">
  <div class="box box-primary">
    <div class="box-body">
      
      <div id="response"></div>

      <form action="post" class="form col-md-4" autocomplete="off">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">	     
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" value="<?php echo "$password"; ?>">
          <br>
          <button class="btn btn-primary" name="update_password"><span class="glyphicon glyphicon-ok"></span> Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
<? } } ?>
<?php include "includes/footer.php"; ?>