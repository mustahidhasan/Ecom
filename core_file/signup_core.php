<?php
include("conn.php");
$submitted_file = $_FILES["signup_user_pic"];
$submitted_name = $submitted_file["name"];
$submitted_temp = $submitted_file["tmp_name"];
move_uploaded_file($submitted_temp, "../images/$submitted_name");


$get_name = $_REQUEST["signup_user_name"];
$get_email = $_REQUEST["signup_user_email"];
$get_address = $_REQUEST["signup_user_address"];
$get_phone = $_REQUEST["signup_user_phone"];
$get_pass = $_REQUEST["signup_user_pass"];


$store_data = "INSERT INTO admin_users(user_name, email, address, phone, password, user_image)VALUES('$get_name','$get_email','$get_address','$get_phone', '$get_pass', '$submitted_name')";
$result = mysqli_query($conn, $store_data);
if($result == true){
 header("location: ../login.php?lregistered");
}

 ?>
