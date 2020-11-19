<?php
include("conn.php");

 $get_name = $_REQUEST["product_name"];
 $get_category = $_REQUEST["product_catagory"];
 $get_price= $_REQUEST["product_price"];
 $get_quantity = $_REQUEST["product_quantity"];

 $get_image = $_FILES["product_image"]["name"];
 $get_temp_img = $_FILES["product_image"]["tmp_name"];
 echo $get_temp_img;
 $location = "../images/";

 move_uploaded_file($get_temp_img, $location."$get_image");


 $get_description = $_REQUEST["product_description"];



if($get_name != '' && $get_category != '' && $get_price != '' && $get_quantity != '' && $get_description != ''){
  $insert_jobs = "INSERT INTO product(categories, name, price, qty, image, short_dsc)VALUES
          ('$get_category', '$get_name', '$get_price', '$get_quantity', '$get_image', '$get_description')";

  $result_insert_jobs = mysqli_query($conn, $insert_jobs);

  if($result_insert_jobs == true){
    header("location: ../dashboard_addproduct.php?inserted");
  }else{
    header("location: ../dashboard_addproduct.php?not_inserted");
  }
}else {
  header("location: ../dashboard_addproduct.php?not_inserted");
}



 ?>
