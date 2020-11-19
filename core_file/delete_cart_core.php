<?php
include("conn.php");


$get_id = $_REQUEST["id"];
echo $get_id;
$delete_data_cart = "DELETE FROM cart WHERE cart_id=$get_id";
$result_cart = mysqli_query($conn, $delete_data_cart);
if($result_cart == true){
  header("location: ../cart.php?Deleted");

}
?>
