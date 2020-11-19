<?php
include("conn.php");
$get_trans = $_REQUEST['trans'];
$delivery_date = date('Y-m-d', strtotime($_POST['datetime_delivery']));


  $set_delivery_report = "UPDATE orders SET Delivery_status= 'Accepted' WHERE trans_id= '$get_trans'";
  $set_delivery_report_rs = mysqli_query($conn, $set_delivery_report);
  if($set_delivery_report_rs == true){
    $update_checkout_after_reject = "UPDATE checkout SET status ='Accepted', c_delivery_date ='$delivery_date' WHERE trans = '$get_trans'";
    $update_checkout_after_reject_res = mysqli_query($conn, $update_checkout_after_reject);
    if($update_checkout_after_reject_res == true){

      header("location: ../dashboard.php");
    }

  }


 ?>
