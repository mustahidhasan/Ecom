<?php
include("conn.php");
if(isset($_REQUEST["spec_tran"])){
  $get_trans = $_REQUEST["spec_tran"];
  $set_delivery_report = "UPDATE orders SET Delivery_status= 'Rejected' WHERE trans_id= '$get_trans'";
  $set_delivery_report_rs = mysqli_query($conn, $set_delivery_report);
  if($set_delivery_report_rs == true){
    $get_checkout_cart = "SELECT c_qty_cart, c_product_id, qty FROM checkout INNER JOIN product ON checkout.c_product_id=product.id";
    $get_checkout_cart_res = mysqli_query($conn, $get_checkout_cart);
    if($get_checkout_cart_res == true){

      while ($row = mysqli_fetch_array($get_checkout_cart_res)) {
        $checked_out_qty =  $row["c_qty_cart"];echo "</br>";
        $get_checkedout_product_id = $row["c_product_id"];
        $store_qty= $row["qty"];echo "</br>";
        $change = $store_qty + $checked_out_qty;

        $update_store_qty = "UPDATE product SET qty ='$change' WHERE id='$get_checkedout_product_id'";
        $update_store_qty_res = mysqli_query($conn, $update_store_qty);
        if($update_store_qty_res == true){
          $update_checkout_after_reject = "UPDATE checkout SET status ='Rejected' WHERE trans = '$get_trans'";
          $update_checkout_after_reject_res = mysqli_query($conn, $update_checkout_after_reject);
          if($update_checkout_after_reject_res == true){
            header("location: ../dashboard.php");
          }



        }

      }
    }

  }
}
 ?>
