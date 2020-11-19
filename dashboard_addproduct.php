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
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img class="logo" src="images/logo.png" alt="">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active order_count">
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

      <!--all the body part will be here-->

      <!-- All the product form activity with add product operation-->


            <div class="container">
              <div class="row">

                <!-- All the product form inserted-->
                <div class="col-md-5">
                  <div class="dashboard-box">
                    <h2>Add Product</h2>
                  <form enctype="multipart/form-data" action="core_file/dashboard_core_insert.php" method="post">
                    <div class="user-box">
                        <label>Product Name:</label>
                      <input type="text" name="product_name">

                    </div>

                    <div class="user-box">
                        <label>Product Catagory:</label>
                      <input type="text" name="product_catagory">

                    </div>
                    <div class="user-box">
                        <label>Product Price:</label>
                      <input type="text" name="product_price">

                    </div>

                  </div>
                </div>

                <div class="col-md-5">
                  <div class="dashboard-box">

                    <div class="user-box">
                        <label>Product Quantity:</label>
                      <input type="text" name="product_quantity">

                    </div>

                    <div class="user-box">
                        <label>Product image:</label>
                      <input type="file" name="product_image">

                    </div>
                    <div class="user-box">
                        <label>Product Description:</label>
                      <input type="text" name="product_description">

                    </div>
                    <?php
                      if(isset($_REQUEST["not_inserted"])){
                          echo "Insert Data Properly";
                      }
                     ?><br>

                    <input class="btn btn-success btnP"type="submit" name="" value="Submit">
                  </form>
                  </div>
                </div>

              </div>
<!-- All the product form inserted-->

<!-- All the product form is showing form here-->
              <div class="row">
                <div class="col-lg-12">
                  <div class="dashboard-box">
                    <h2>Product List</h2>


                      <div class="user-box">
                        <table>
                          <tr>
                            <th>Product ID</th>
                            <th>PRoduct Name</th>
                            <th>Product Catagory</th>
                            <th>Product Prices</th>
                            <th>Product Quantity</th>
                            <th>Product Image</th>
                            <th>Product Description</th>
                            <th>Adding Time</th>

                            <hr>
                          </tr>

                          <?php
                            include("core_file/conn.php");

                            $show_data = "SELECT * FROM product";
                            $show_data_result = mysqli_query($conn, $show_data);
                            if($show_data_result == true){
                              while($row = mysqli_fetch_array($show_data_result)){?>
                                <tr>

                                  <td><?php echo $row["id"] ?></td>
                                  <td><?php echo $row["categories"] ?></td>
                                  <td><?php echo $row["name"] ?></td>
                                  <td><?php echo $row["price"] ?></td>
                                  <td><?php echo $row["qty"] ?></td>
                                  <td><img width="60px" height="60px"src="images/<?php echo $row["image"] ?> ?>" alt=""></td>
                                  <td><?php echo $row["short_dsc"] ?></td>
                                  <td><?php echo $row["date_time"] ?></td>
                                  <td><a href="edit_data.php?edit_id=<?php echo $row["id"] ?>"><button class="btn btn-info btnP" type="button" name="Edit">Edit</button></a> </td>
                                  <td><a href="core_file/delete_core.php?id=<?php echo $row["id"] ?>"><button class="btn btn-danger btnP" type="button" name="button">Delete</button></a></td>
                                </tr>

                            <?php }}?>




                        </table>

                      </div>
                  </div>
                </div>
              </div>


              <!-- All the product form is showing form here-->
            </div>


      <!-- All the product form activity with add product operation-->






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
