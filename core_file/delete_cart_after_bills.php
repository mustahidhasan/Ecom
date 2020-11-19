<?php
include("conn.php");
if(isset($_COOKIE["currentUser"])){
  $get_cookie = $_COOKIE["currentUser"];


$delete_data_cart_after_bills = "DELETE FROM cart WHERE user_email='$get_cookie'";
}
$delete_data_cart_after_bills_result = mysqli_query($conn, $delete_data_cart_after_bills);
if($delete_data_cart_after_bills_result == true){
  header("location: ../bills.php");
}
 ?>
