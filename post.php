<?php

	include "config.php";
	include "includes/check_login.php";

	if(isset($_POST['add_user'])){
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $first_name = mysqli_real_escape_string($mysqli,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli,$_POST['last_name']);
    $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
    $phone = preg_replace("/[^0-9]/", '',$phone);
    mysqli_query($mysqli,"INSERT INTO users SET email = '$email', password = '$password', first_name = '$first_name', last_name = '$last_name', phone = '$phone', user_created = UNIX_TIMESTAMP(now())");
    echo "<div class='alert alert-warning'>User successfully added.<button class='close' data-dismiss='alert'>&times;</button></div>";
  }

	if(isset($_POST['edit_user'])){  
    $user_id = intval($_POST['user_id']);
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $first_name = mysqli_real_escape_string($mysqli,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli,$_POST['last_name']);
    $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
    $phone = preg_replace("/[^0-9]/", '',$phone);

    mysqli_query($mysqli,"UPDATE users SET email = '$email', password = '$password', first_name = '$first_name', last_name = '$last_name', phone = '$phone', user_modified = UNIX_TIMESTAMP(now()) WHERE user_id = $user_id");
    echo "<div class='alert alert-warning'>User successfully updated.<button class='close' data-dismiss='alert'>&times;</button></div>";
  }

	if(isset($_POST['delete_user'])){
    $user_id = intval($_POST['delete_user']);
    mysqli_query($mysqli,"DELETE FROM users WHERE user_id = $user_id");
  
  }

  if(isset($_POST['update_password'])){
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    mysqli_query($mysqli,"UPDATE users SET password = '$password' WHERE user_id = $session_user_id");
    echo "<div class='alert alert-warning'>Password successfully updated.<button class='close' data-dismiss='alert'>&times;</button></div>";
  }

?>	