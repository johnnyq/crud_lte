<?php 
  session_start();
  include "config.php";
    
  if(isset($_POST['login'])){

      $email = mysqli_real_escape_string($mysqli,$_POST['email']);
      $password = mysqli_real_escape_string($mysqli,$_POST['password']);

      $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
      
      if(mysqli_num_rows($sql) == 1){
          $row = mysqli_fetch_array($sql);
          session_start();
          $_SESSION['logged'] = TRUE;
          $_SESSION['user_id'] = $row['user_id'];
          header("Location: index.php");
      }else{
          $response = "<div class='alert alert-warning'><strong>Invalid username or password.</strong><button class='close' data-dismiss='alert'>&times;</button></div>";
      }
  }
  if(isset($_POST['forgot'])){

      $email = mysqli_real_escape_string($mysqli,$_POST['email']);

      $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$email'");
      
      if(mysqli_num_rows($sql) == 1){
          $row = mysqli_fetch_array($sql);
          $code = rand(100,999);
          //$message = "Your activation link is: http://ds.local/reset_password.php?email=$email&code=$code";
          $message = "hello";
          mail($email, "Password Reset", $message);
          $sql = mysqli_query($mysqli,"UPDATE users set activation_code = '$code' WHERE email = '$email'");
          $response = "<div class='alert alert-warning'><strong>Activation link was sent to your email.</strong><button class='close' data-dismiss='alert'>&times;</button></div>";
      }else{
          $response = "<div class='alert alert-warning'><strong>You must enter your email to reset your password.</strong><button class='close' data-dismiss='alert'>&times;</button></div>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b><?php echo $config_app_name; ?></b>App
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php 
        
      if(isset($response)){
        echo "$response";
      }
        
    ?>
    <p class="login-box-msg"><?php echo $config_login_message; ?></p>
    <form autocomplete="off" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <div class="col-xs-8">
          <button type="submit" name="forgot" class="btn btn-link">Forgot password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
