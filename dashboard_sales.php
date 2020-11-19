<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
      <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>




  </head>

  <body>
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
    	    </ul>
      </div>
  	</nav>
    <hr>




    <div class="container">

      <div class="col-lg-12">
        <div class="graph">
          <canvas id="myChart" width="100%" height="100%">< /canvas>
        </div>
      </div>



      <!--all the body part will be here-->
      <div class="$row ">
      <div class="sold_total">
        <div class="col-sm-12 ">
          <div class="box-element" >



            <?php
            include("core_file/conn.php");

            $sold_item = "SELECT SUM(c_qty_cart) AS total_qty , SUM(c_cart_total) AS total_sold_value FROM checkout WHERE status = 'Accepted' ";
            $sold_item_res = mysqli_query($conn, $sold_item);

            if($sold_item_res == true){
              while ($row2 = mysqli_fetch_array($sold_item_res)) {
                $save_total_sold_item = $row2["total_qty"];
                $save_total_sold_value = $row2["total_sold_value"];

              } ?>

                <h6 >Total Sold Items: <?php echo $save_total_sold_item ?></h6>
                <h6>Total Earning: <?php echo $save_total_sold_value ?></h6>



        <?php } ?>


          </div>
          <br>
          <div class="col-sm-12 ">
          <div class="box-element">
            <h6>Salse By Date</h6>
            <table class="table">
              <tr>
                <th> Order Date</th>

                <th>Quantity</th>
                <th>Ammount</th>
              </tr>
              <?php
              include("core_file/conn.php");
              $get_data_salse = "SELECT c_cart_total,c_qty_cart, c_date_time FROM checkout WHERE status = 'Accepted' ";
              $get_data_salse_rs = mysqli_query($conn, $get_data_salse);
              while ($row3 = mysqli_fetch_array($get_data_salse_rs)) { ?>
                <tr>
                  <td><?php echo $row3["c_date_time"] ?></td>
                  <td><?php echo $row3["c_qty_cart"] ?></td>
                  <td><?php echo $row3["c_cart_total"] ?></td>
                </tr>

            <?php  } ?>










            </table>





          </div>
        </div>



        </div>
      </div>
    </div>








            <div class="full">



            <?php

              include("core_file/conn.php");
              $select_trans = "SELECT DISTINCT checkout.c_user_email, orders.trans_id, admin_users.user_name, admin_users.phone, admin_users.address, checkout.c_date_time, orders.Delivery_status, c_delivery_date FROM orders INNER JOIN checkout ON orders.trans_id = checkout.trans INNER JOIN admin_users ON checkout.c_user_email = admin_users.email";
              $select_trans_res = mysqli_query($conn, $select_trans);
              if($select_trans_res == true){
                while ($row = mysqli_fetch_array($select_trans_res)) {
                  $get_user_email = $row["c_user_email"];
                  $get_user_name = $row["user_name"];
                  $get_specific_trans = $row["trans_id"];
                  $get_phone = $row["phone"];
                  $get_address = $row["address"];
                  $get_date = $row["c_date_time"];
                  $get_delivery_date = $row["c_delivery_date"];

                  ?>

                  <div class="$row">
                    <div class="col-md-7">
                      <div class="box-element" >


                            <h6>Name: <?php echo $get_user_name ?></h6>
                            <h6>Email: <?php echo $get_user_email ?></h6>
                            <h6 style="color:red; font-weight:bold">Transaction Id: <?php echo $get_specific_trans ?></h6>
                            <h6>Phone Number: <?php echo $get_phone ?></h6>
                            <h6>Address: <?php echo $get_address ?></h6>
                            <h6>Order Date: <?php echo $get_date ?></h6>
                            <h6>Delivery Date: <?php echo $get_delivery_date ?></h6>





                        <table class="table">
                          <tr>

                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Unit Price</th>
                            <th>Product Quanity</th>
                            <th>Product Total Price</th>
                            <th>Status</th>
                          </tr>

                          <?php
                          $select_product_for_each_trans = "SELECT product.image, product.name, product.price, checkout.c_qty_cart, checkout.c_cart_total, checkout.status FROM checkout INNER JOIN product ON checkout.c_product_id=product.id WHERE trans = '$get_specific_trans'";
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
                                <?php $status =  $row1["status"]; ?>

                              <?php if($status == null){ ?>
                                <td style="color:orange; font-weight:bold"><?php echo "Pending" ?></td>
                              <?php }elseif($status == "Rejected"){ ?>
                                <td style="color:red; font-weight:bold"><?php echo $status ?></td>
                              <?php }else{ ?>
                                <td style="color:green; font-weight:bold"><?php echo $status ?></td>
                            <?php } ?>

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
              <br>
            <?php  }  }  ?>


            </div>














    </div>
    <!--graph code-->
    <script>
                  var ctx = document.getElementById("myChart");
                  var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: [<?php include("core_file/conn.php");$show_data = "SELECT * FROM checkout INNER JOIN product ON checkout.c_product_id = product.id WHERE status='Accepted'";$show_data_result = mysqli_query($conn, $show_data);if($show_data_result == true){ while ($b = mysqli_fetch_array($show_data_result)) { echo '"' . $b['name'] . '",';}}?>],
                          datasets: [{
                                  label: 'Quantity',
                                  data: [<?php include("core_file/conn.php");$show_data = "SELECT * FROM checkout";$show_data_result = mysqli_query($conn, $show_data);if($show_data_result == true){ while ($b = mysqli_fetch_array($show_data_result)) { echo '"' . $b['c_qty_cart'] . '",';}}?>],
                                  backgroundColor: [
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.6)',
                                  'rgba(255, 159, 64, 0.5)',
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 0.4)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 0.3)',
                                  'rgba(255, 159, 64, 1)',
                                  'rgba(255, 99, 132, 0.6)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 0.1)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(255, 99, 132, 0.3)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 0.6)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 0.6)',
                                  'rgba(255, 99, 132, 1)'

                                  ],
                                  borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 0.2)'

                                  ],
                                  borderWidth: 1
                              }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                      ticks: {
                                          beginAtZero: true
                                      }
                                  }]
                          }
                      }
                  } );
              </script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
