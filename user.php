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

    <div class="container">

      <!--all the body part will be here-->
          <div class="row">
            <div class="col-lg-12">
              <div class="box-element user_box">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">&#x2190 Back To Store <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="core_file/logout_core.php">&#10005 Log Out</a>
                  </li>
                </ul>
              </div>
            </nav>
            <br>
                <?php
                include("core_file/conn.php");
                if(isset($_COOKIE["currentUser"])){

                  $get_cookie = $_COOKIE["currentUser"];

                  $get_user_data ="SELECT * FROM admin_users WHERE email='$get_cookie'";

                  $get_user_data_rs = mysqli_query($conn, $get_user_data);

                  if($get_user_data_rs == true){
                    while ($row = mysqli_fetch_array($get_user_data_rs)) {
                      $get_name = $row["user_name"];
                      $get_email = $row["email"];
                      $get_phone = $row["phone"];
                      $get_address = $row["address"];
                      $get_image_name = $row["user_image"];
                    } ?>

                    <div>
                      <img class="user_details_img"  src="images/<?php echo $get_image_name ?>" alt="">
                      <h6>Name: <?php echo $get_name ?></h6>
                      <h6>Email: <?php echo $get_email ?></h6>
                      <h6>Phone Number: <?php echo $get_phone ?></h6>
                      <h6>Address: <?php echo $get_address ?></h6>

                    </div>

                <?php } ?>









                <?php
                  include("core_file/conn.php");
                  $select_trans = "SELECT DISTINCT checkout.c_user_email, orders.trans_id, admin_users.user_name, admin_users.phone, admin_users.address, checkout.c_date_time, Delivery_status FROM orders INNER JOIN checkout ON orders.trans_id = checkout.trans INNER JOIN admin_users ON checkout.c_user_email = admin_users.email WHERE c_user_email='$get_cookie'";
                  $select_trans_res = mysqli_query($conn, $select_trans);
                  if($select_trans_res == true){
                    while ($row = mysqli_fetch_array($select_trans_res)) {

                      $get_specific_trans = $row["trans_id"];
                      $get_status = $row["Delivery_status"];
                      $get_date = $row["c_date_time"];
                      ?>

                        <div class=" box-element user_box">
                            <table class="table">
                              <tr>

                                <th>Product Name</th>
                                <th>Product Image</th>

                                <th>Product Unit Price</th>
                                <th>Product Quanity</th>
                                <th>Product Total Price</th>
                                <th>Order Date</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                              </tr>

                              <?php
                              $select_product_for_each_trans = "SELECT product.image, product.name, product.price, checkout.c_qty_cart, checkout.c_cart_total, c_user_email, c_delivery_date FROM checkout INNER JOIN product ON checkout.c_product_id=product.id WHERE trans = '$get_specific_trans' AND c_user_email='$get_cookie'";
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
                                    <td><?php echo $get_date; ?></td>

                                      <?php if($get_status == null){ ?>
                                        <td>
                                        <?php
                                        echo "---";
                                        ?>
                                      </td>
                                      <?php }elseif ($get_status == 'Rejected') { ?>
                                        <td>
                                        <?php
                                        echo "---";
                                        ?>
                                      </td>
                                    <?php  }else{ ?>
                                      <td><?php echo $row1["c_delivery_date"] ?> </td>
                                      <?php  } ?>








                                  <?php if($get_status == null){ ?>
                                      <td style="color:Orange; font-weight:bold">Pending</td>
                                  <?php }elseif ($get_status == 'Rejected') { ?>
                                      <td style="color:Red;  font-weight:bold"><?php echo $get_status ?></td>
                                <?php  }else{ ?>
                                      <td style="color:green;  font-weight:bold"><?php echo $get_status ?></td>
                                  <?php  } ?>

                                  </tr>

                              <?php } } ?>


                            </table>

                            <h6 style="color:red">Transaction ID: <?php echo $get_specific_trans ?></h6>
                        </div>




                <?php  }  }  }?>




              </div>







      </div>
  </div>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
