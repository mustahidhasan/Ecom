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
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <img class="logo" src="images/logo.png" alt="">
  	  <a class="navbar-brand" href="dashboard_addproduct.php">Back To Add Product</a>
  	</nav>
    <hr>

      <!--all the body part will be here-->

      <!-- All the product form activity with add product operation-->


            <div class="container">
              <div class="row">

                <!-- All the product form inserted-->


                <div class="col-md-4">
                  <div class="dashboard-box">
                    <?php
      if(isset($_REQUEST["edit_id"])){
        $getData = $_REQUEST["edit_id"];

      include("core_file/conn.php");
      $showData = "SELECT * FROM product WHERE id=$getData";
      $result = mysqli_query($conn, $showData);
      if($result == true){
        while ($row = mysqli_fetch_array($result)) {?>


          <form action="core_file/edit_core.php" method="post">
            <center><h3>Edit Product</h3></center>
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
          <?php  }}}?>
          </div>
        </div>

        <div class="col-md-4">
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



             <input type="hidden" name="editing_id" value="<?php echo $getData; ?>">
            <input class="btn btn-success btnP" type="submit" name="" value="Submit">
          </form>


                  </div>
                </div>



              <!--current status-->
              <div class="col-md-4 ">
                <div class="dashboard-box current">

                  <h3>Current Status</h3>
                  <?php

                    include("core_file/conn.php");
                    $getData = $_REQUEST["edit_id"];
                    $current_status = "SELECT * FROM product WHERE id=$getData";
                    $current_result = mysqli_query($conn, $current_status);

                    if($current_result == true){
                      while ($row = mysqli_fetch_array($current_result)) {?>

                        <h5>Product ID:</h5><h6><?php echo $row["id"] ?></h6>
                        <h5>Product Name:</h5><h6><?php echo $row["name"] ?></h6>
                        <h5>Product Category:</h5><h6><?php echo $row["categories"] ?></h6>
                        <h5>Product Price:</h5><h6><?php echo $row["price"] ?></h6>
                        <h5>Product Quantity:</h5><h6><?php echo $row["qty"] ?></h6>
                        <h5>Product Image:</h5><td><img width="60px" height="60px"src="images/<?php echo $row["image"] ?> ?>" alt="">
                        <h5>Product Description:</h5><h6><?php echo $row["short_dsc"] ?></h6>


                    <?php   }
                    }
                  ?>
                  <button class="btn btn-success btnP" type="button" name="button"><a href="dashboard.php">Back To Dashboard</a></button>
                </form>


            </div>
        </div><!--current status-->

   </div>
<!-- All the product form inserted-->

        </div>


      <!-- All the product form activity with add product operation-->






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
