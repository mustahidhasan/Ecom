<?php

include("conn.php");

echo $getEditId = $_REQUEST["editing_id"];
echo $get_name = $_REQUEST["product_name"];
echo $get_category = $_REQUEST["product_catagory"];
echo $get_price= $_REQUEST["product_price"];
echo $get_quantity = $_REQUEST["product_quantity"];

$get_image = $_FILES["product_image"]["name"];
$get_temp_img = $_FILES["product_image"]["tmp_name"];
echo $get_temp_img;
$location = "../images/";

move_uploaded_file($get_temp_img, $location."$get_image");


$get_description = $_REQUEST["product_description"];
echo $get_description = $_REQUEST["product_description"];


  $getEditId = $_REQUEST["editing_id"];

  $get_name = $_REQUEST["product_name"];
  $get_category = $_REQUEST["product_catagory"];
  $get_price= $_REQUEST["product_price"];
  $get_quantity = $_REQUEST["product_quantity"];
  $get_image = $_REQUEST["product_image"];
  $get_description = $_REQUEST["product_description"];
/*
$updateData = "UPDATE product SET name='$get_name', categories='$get_category', price='$get_price', qty='$get_quantity', image='$get_image', short_dsc='$get_description' WHERE id=$getEditId";
$result = mysqli_query($conn, $updateData);

if($result == true){
  header("location: ../dashboard.php?Edited");

}*/


if($get_name != null){
  $updateData = "UPDATE product SET name='$get_name' WHERE id=$getEditId";
  $result = mysqli_query($conn, $updateData);

  if($result == true){
    header("location: ../dashboard_addproduct.php?Edited");

  }
}elseif ($get_category != null) {
  $updateData = "UPDATE product SET categories='$get_category' WHERE id=$getEditId";
  $result = mysqli_query($conn, $updateData);

  if($result == true){
    header("location: ../dashboard_addproduct.php?Edited");

  }
}elseif ($get_price != null) {
  // code...
  $updateData = "UPDATE product SET price='$get_price' WHERE id=$getEditId";
  $result = mysqli_query($conn, $updateData);

  if($result == true){
    header("location: ../dashboard_addproduct.php?Edited");

  }
}elseif ($get_quantity != null) {
  $updateData = "UPDATE product SET qty='$get_quantity' WHERE id=$getEditId";
  $result = mysqli_query($conn, $updateData);

  if($result == true){
    header("location: ../dashboard_addproduct.php?Edited");

  }
}elseif ($get_image != null) {
  // code...
  $updateData = "UPDATE product SET image='$get_image' WHERE id=$getEditId";
  $result = mysqli_query($conn, $updateData);

  if($result == true){
    header("location: ../dashboard_addproduct.php?Edited");

  }

}elseif ($get_description != null) {
  // code...
  $updateData = "UPDATE product SET short_dsc='$get_description' WHERE id=$getEditId";
  $result = mysqli_query($conn, $updateData);

  if($result == true){
    header("location: ../dashboard_addproduct.php?Edited");

  }
}

 ?>
