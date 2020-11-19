<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ecom";

$conn = mysqli_connect($host, $user, $password, $dbname);
if($conn == false){
  echo "Not Connected";
}

 ?>
