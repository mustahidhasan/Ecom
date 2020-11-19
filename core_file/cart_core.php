<?php
include("conn.php");
if(!isset($_COOKIE["currentUser"])) {

} else {
$useremail =  $_COOKIE["currentUser"];

}
$product_id = $_REQUEST["PQID"];
$product_qty = $_REQUEST["qty"];


$add_to_cart = "INSERT INTO cart(user_email, product_id, qty_cart)VALUES('$useremail', '$product_id', '$product_qty')";
$result_add_to_cart = mysqli_query($conn, $add_to_cart);
if($result_add_to_cart == true){

    header("location: ../index.php?");
  

}
?>
