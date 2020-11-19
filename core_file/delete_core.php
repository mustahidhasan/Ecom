<?php
include("conn.php");

$get_id = $_REQUEST["id"];

$delete_data = "DELETE FROM product WHERE id=$get_id";
$result = mysqli_query($conn, $delete_data);
if($result == true){
  header("location: ../dashboard_addproduct.php?Deleted");
}
?>
