<?php
include("conn.php");

if(isset($_COOKIE["trnasid"])){
  $get_trans_id = $_COOKIE["trnasid"];
  echo $get_trans_id;
$insert_trans ="UPDATE cart SET cart_trans ='$get_trans_id'";

$insert_trans_result = mysqli_query($conn, $insert_trans);

if($insert_trans_result ==true){
  echo "done";
  header("location: ../checkout.php");
}else {
  echo "not";
}
}else {
  echo "not";
}
 ?>
