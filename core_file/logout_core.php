<?php
// set the expiration date to one hour ago
setcookie("currentUser", "", time() - 3600, "/");
header("location: ../index.php");
?>
