<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
      <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <?php if (!isset($_COOKIE["myJavascriptVar"])) { ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <img class="logo" src="images/logo.png" alt="">
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	    <span class="navbar-toggler-icon"></span>
  	  </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    	    <ul class="navbar-nav mr-auto">
    	      <li class="nav-item active order_count" >
    	        <a class="nav-link" href="dashboard.php">Orders <span class="sr-only"></span></a>
              <?php
              include("core_file/conn.php");
              $count_cart = "SELECT COUNT(trans_id) AS count_table FROM orders  WHERE Delivery_status != 'Accepted' AND Delivery_status != 'Rejected' ";
              $count_cart_rs = mysqli_query($conn, $count_cart);
              if($count_cart_rs == true){

                while ($a = mysqli_fetch_array($count_cart_rs)) {
                  $count_cart = $a["count_table"];

                }?>
                <p><?php echo $count_cart ?></p>


            <?php  }  ?>
    	      </li>

            <li class="nav-item active">
              <a class="nav-link" href="dashboard_addproduct.php">Add Product <span class="sr-only"></span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="dashboard_sales.php">Salse Infromation <span class="sr-only"></span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="dashboard_login.php">Log In<span class="sr-only"></span></a>
            </li>
    	    </ul>
      </div>
  	</nav>
      <?php echo "Log In First" ?>
    <?php }else{ ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <img class="logo" src="images/logo.png" alt="">
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	    <span class="navbar-toggler-icon"></span>
  	  </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    	    <ul class="navbar-nav mr-auto">
    	      <li class="nav-item active order_count" >
    	        <a class="nav-link" href="dashboard.php">Orders <span class="sr-only"></span></a>
              <?php
              include("core_file/conn.php");
              $count_cart = "SELECT COUNT(trans_id) AS count_table FROM orders  WHERE Delivery_status != 'Accepted' AND Delivery_status != 'Rejected' ";
              $count_cart_rs = mysqli_query($conn, $count_cart);
              if($count_cart_rs == true){

                while ($a = mysqli_fetch_array($count_cart_rs)) {
                  $count_cart = $a["count_table"];

                }?>
                <p><?php echo $count_cart ?></p>


            <?php  }  ?>
    	      </li>

            <li class="nav-item active">
              <a class="nav-link" href="dashboard_addproduct.php">Add Product <span class="sr-only"></span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="dashboard_sales.php">Salse Infromation <span class="sr-only"></span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="core_file/dashboard_logout_core.php">Log Out <span class="sr-only"></span></a>
            </li>
    	    </ul>
      </div>
  	</nav>
      <div class="container">
        <!--all the body part will be here-->
        <?php if ($count_cart == 0){ ?>
          <p style="color:red; font-weight:bold; font-size:20px;">No Order Available</p>
      <?php } ?>
              <?php
                include("core_file/conn.php");
                $select_trans = "SELECT DISTINCT checkout.c_user_email, orders.trans_id, admin_users.user_name, admin_users.phone, admin_users.address, checkout.c_date_time, orders.Delivery_status FROM orders INNER JOIN checkout ON orders.trans_id = checkout.trans INNER JOIN admin_users ON checkout.c_user_email = admin_users.email WHERE Delivery_status != 'Accepted' AND Delivery_status != 'Rejected'";
                $select_trans_res = mysqli_query($conn, $select_trans);
                if($select_trans_res == true){
                  while ($row = mysqli_fetch_array($select_trans_res)) {
                    $get_user_email = $row["c_user_email"];
                    $get_user_name = $row["user_name"];
                    $get_specific_trans = $row["trans_id"];
                    $get_phone = $row["phone"];
                    $get_address = $row["address"];
                    $get_date = $row["c_date_time"];

                    ?>

                    <div class="$row">
                      <div class="col-lg-12">
                        <div class="box-element" >


                              <h6>Name: <?php echo $get_user_name ?></h6>
                              <h6>Email: <?php echo $get_user_email ?></h6>
                              <h6 style="color:red; font-weight:bold">Transaction Id: <?php echo $get_specific_trans ?></h6>
                              <h6>Phone Number: <?php echo $get_phone ?></h6>
                              <h6>Address: <?php echo $get_address ?></h6>
                              <h6>Order Date: <?php echo $get_date ?></h6>
                              <form class="" action="core_file/delivery_status.php" method="post">
                                <h6>Set Delivery Date:</h6>
                                <input type="date" name="datetime_delivery" value="">
                                <input type="hidden" name="trans" value="<?php echo $get_specific_trans ?>">
                               <input type="submit" style="margin:10px;float:right" class="btn btn-success btnP" value="Accept">
                              </form>
                              <a href="core_file/delivery_reject.php?spec_tran=<?php echo $get_specific_trans?>"><button  class="btn btn-danger btnP " style="margin:10px;margin-top: -20px;float:right" type="button" name="button">Rejcet</button></a>


                          <table class="table">
                            <tr>

                              <th>Product Name</th>
                              <th>Product Image</th>
                              <th>Product Unit Price</th>
                              <th>Product Quanity</th>
                              <th>Product Total Price</th>
                            </tr>

                            <?php
                            $select_product_for_each_trans = "SELECT product.image, product.name, product.price, checkout.c_qty_cart, checkout.c_cart_total FROM checkout INNER JOIN product ON checkout.c_product_id=product.id WHERE trans = '$get_specific_trans'";
                            $select_product_for_each_trans_res = mysqli_query($conn, $select_product_for_each_trans);

                            if($select_product_for_each_trans_res == true){
                              while ($row1 = mysqli_fetch_array($select_product_for_each_trans_res)) {

                                ?>
                                <tr>
                                  <td><?php echo $row1["name"]; ?></td>
                                  <td><img width="60px" height="60px" src="images/<?php echo $row1["image"]?>" alt=""></td>
                                  <td><?php echo $row1["price"]; ?></td>
                                  <td><?php echo $row1["c_qty_cart"]; ?></td>
                                  <td><?php echo $row1["c_cart_total"]; ?></td>

                                </tr>

                            <?php  }

                            $total = "SELECT SUM(c_cart_total) AS payable FROM checkout WHERE trans = '$get_specific_trans' ";
                            $total_result = mysqli_query($conn, $total);
                            if($total_result == true){
                              while ($row2 = mysqli_fetch_array($total_result)) {
                                $get_total = $row2["payable"];
                              }?>

                              <h6 style="color:green; font-weight:bold" >Total Payable:<?php echo $get_total ?></h6>
                          <?php } } ?>


                          </table>


                    </div>
                  </div>
                </div>
              <?php  }  }  ?>

















      </div>
    <?php } ?>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
