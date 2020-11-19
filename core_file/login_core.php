<?php
include("conn.php");

$get_email = $_REQUEST["user_email"];
$get_password = $_REQUEST["user_pass"];


$confirm_login = "SELECT * FROM admin_users where email='$get_email' AND password='$get_password'";
$result_confirm_login = mysqli_query($conn, $confirm_login);
$count1 = mysqli_num_rows($result_confirm_login);

if($result_confirm_login == true){
  if($count1 === 1){
    setcookie("currentUser", $get_email, time() + (86400 * 30), "/");


    while ($row = mysqli_fetch_array($result_confirm_login)) {
      header('location: ../index.php?loggedin');

    }
  }else {
    header("location: ../login.php?Error");
  }
}



 ?>
