<?php

include("conn.php");
if(isset($_COOKIE["currentUser"])){
  $get_cookie = $_COOKIE["currentUser"];
  $bill = "INSERT INTO checkout(c_user_email, c_product_id, c_qty_cart, c_cart_total, trans) SELECT user_email, product_id, qty_cart, cart_total, cart_trans FROM cart WHERE user_email = '$get_cookie'";

$bill_result = mysqli_query($conn, $bill);
if($bill_result == true){

  if(isset($_COOKIE["currentUser"])){
    $get_trans = $_COOKIE["trnasid"];

    $insert_trans = "INSERT INTO orders(trans_id)VALUES($get_trans)";
    $insert_trans_res = mysqli_query($conn, $insert_trans);
    if($insert_trans == true){
      $get_checkout_cart = "SELECT c_qty_cart, c_product_id, qty FROM checkout INNER JOIN product ON checkout.c_product_id=product.id";
      $get_checkout_cart_res = mysqli_query($conn, $get_checkout_cart);
      if($get_checkout_cart_res == true){

        while ($row = mysqli_fetch_array($get_checkout_cart_res)) {
          $checked_out_qty =  $row["c_qty_cart"];echo "</br>";
          $get_checkedout_product_id = $row["c_product_id"];
          $store_qty= $row["qty"];
          $change = $store_qty - $checked_out_qty;

          $update_store_qty = "UPDATE product SET qty ='$change' WHERE id='$get_checkedout_product_id'";
          $update_store_qty_res = mysqli_query($conn, $update_store_qty);
          if($update_store_qty_res == true){
            header("location: delete_cart_after_bills.php");
          }

        }
      }




    }else {
      echo "not in orders ";
    }


  }

}else {
  echo "not inserted";
}

}


 ?>
