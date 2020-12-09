<?php
$host = "localhost";
$user = "istyeyco_mustahid";
$password = "DV&6qYVpoinU";
$dbname = "istyeyco_mustahiddb";

$conn = mysqli_connect($host, $user, $password, $dbname);
if($conn == false){
  echo "Not Connected";
}

 ?>
