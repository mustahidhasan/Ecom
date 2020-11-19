<?php

  setcookie("myJavascriptVar", "", time() - 3600, "/");
  echo "string";
  header("location: ../dashboard_login.php");

 ?>
