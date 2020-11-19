<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ecom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
      <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <img class="logo" src="images/logo.png" alt="">
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	    <span class="navbar-toggler-icon"></span>
  	  </button>

  	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    	    <ul class="navbar-nav mr-auto">
    	      <li class="nav-item active">
    	        <a class="nav-link" href="index.php">Store <span class="sr-only">(current)</span></a>
    	      </li>
    	    </ul>
          <div class="form-inline my-2 my-lg-0">




  	    </div>
  	  </div>
  	</nav>
    <hr>
    <div class="container">
      <!--all the body part will be here-->
          <div class="row">
            <div class="col-lg-6">
              <div class="box-element" id="form-wrapper">
                <form id="form" action="core_file/checkout_core.php" method="post">

                    <?php

                      include("core_file/conn.php");
                      if(isset($_COOKIE["currentUser"])){

                        $get_cookie = $_COOKIE["currentUser"];

                        $show_loggedIn_user = "SELECT * FROM admin_users WHERE email= '$get_cookie' ";
                        $show_loggedIn_user_result = mysqli_query($conn, $show_loggedIn_user);

                        if($show_loggedIn_user_result == true){
                          while ($row = mysqli_fetch_array($show_loggedIn_user_result)) { ?>

                            <div id="user-info">
                              <div class="form-field">

                                <input required class="form-control" type="text" name="name" placeholder="<?php echo $row["user_name"] ?>" disabled >
                              </div>
                              <div class="form-field">

                                <input required class="form-control" type="email" name="email" placeholder="<?php echo $row["email"] ?>" disabled >
                              </div>
                            </div>

                            <div id="shipping-info">
                              <hr>
                              <p>Shipping Information:</p>
                              <hr>
                              <div class="form-field">
                                <input class="form-control" type="text" name="address" placeholder="<?php echo $row["address"] ?>"  disabled >
                              </div>


                              <div class="form-field">
                                <input class="form-control" type="text" name="Phone_number" placeholder="<?php echo $row["phone"] ?>" disabled >
                              </div>

                            </div>

                        <?php  } } } else {?>
                        <div id="user-info">
                          <div class="form-field">
                            <input required class="form-control" type="text" name="name" placeholder="Name">
                          </div>
                          <div class="form-field">

                            <input required class="form-control" type="email" name="email" placeholder="email">
                          </div>
                        </div>

                        <div id="shipping-info">
                          <hr>
                          <p>Shipping Information:</p>
                          <hr>
                          <div class="form-field">
                            <input class="form-control" type="text" name="address" placeholder="Address..">
                          </div>


                          <div class="form-field">
                            <input class="form-control" type="text" name="Phone_number" placeholder="Phone Number">
                          </div>

                        </div>
                    <?php  } ?>

                    <input id="form-button" class="btn btn-success btn-block btnP" type="submit" value="Continue">




                  <hr>


              </div>

              <br>


            </div>

            <div class="col-md-6">
              <div class="box-element" id="form-wrapper">


                  <hr>
                  <h3>Order Summary</h3>
                  <div class="cart-row">

                    <table class="table">
                      <tr style="font-weight:bold;">
                        <td>Product Image</td>
                        <td>Product Name</td>
                        <td>Product Prices</td>
                        <td>Product Quantity</td>
                        <td>Total Price</td>


                      </tr>

                      <?php
                        include("core_file/conn.php");
                        if(isset($_COOKIE["currentUser"])){
                          $get_cookie = $_COOKIE["currentUser"];


                        $show_cart_product = "SELECT * FROM cart INNER JOIN product ON cart.product_id=product.id INNER JOIN admin_users ON cart.user_email=admin_users.email WHERE user_email='$get_cookie'";

                      }else {
                        header("location: login.php");
                      }
                        $show_product_result = mysqli_query($conn, $show_cart_product);
                        if($show_product_result == true){
                            while ($row = mysqli_fetch_array($show_product_result)) {

                              ?>

                              <tr>

                                <td><img width="60px" height="60px"src="images/<?php echo $row["image"] ?> ?>" alt=""></td>
                                <?php $names = $row["name"] ?>
                                <td><?php echo $names ?></td>
                                <td><?php echo $row["price"] ?></td>
                                <td><?php echo $row["qty_cart"] ?></td>
                                <?php $total_price =  $row["price"]*$row["qty_cart"] ?>
                                <td><?php echo $total_price ?></td>
                                <?php
                                $pid = $row["product_id"];
                               include("core_file/conn.php");
                               $Total = "UPDATE cart SET cart_total='$total_price' WHERE product_id= '$pid' ";
                               $Total_result = mysqli_query($conn, $Total);


                                 ?>
                              </tr>



                        <?php }}else {
                          echo "no data found";
                        }?>
                    </table>
                  </div>

                    <?php
                      include("core_file/conn.php");
                      $get_count = "SELECT COUNT(*) AS NumberOfOrders FROM cart WHERE user_email = '$get_cookie' ";
                      $result = mysqli_query($conn, $get_count);
                      if($result == true){
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <?php  $Total_item = $row["NumberOfOrders"] ?>
                            <h5>Items: <?php echo $Total_item ?></h5>
                      <?php } } ?>

                    <?php
                     include("core_file/conn.php");
                     $total_payeble = "SELECT SUM(cart_total) AS payable FROM cart WHERE user_email = '$get_cookie' ";
                     $total_payeble_result = mysqli_query($conn, $total_payeble);
                     while ($row = mysqli_fetch_array($total_payeble_result)) {?>
                       <?php  $Total_payable = $row["payable"] ?>
                       <h5>Total Payable:  <?php echo $Total_payable ?></h5>
                     <?php } ?>


              </div>
            </div>




  <!--BILLS WILL BE FROM HERE-->
        </form>
        </div>















    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
