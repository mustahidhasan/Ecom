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
  	  <a class="navbar-brand" href="index.php">Ecom</a>
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	    <span class="navbar-toggler-icon"></span>
  	  </button>
  	</nav>

    <hr>

    <div class="container">
      <!--all the body part will be here-->
      <div class="row">

        <div class="col-md-6 ">

          <div class="dashboard-box current">

            <a href="index.php"><button class="btn btn-success btnP" type="button" name="button">Back To Store</button></a><br><br>


            <h3>Product Status</h3>

            <?php

              include("core_file/conn.php");
              $getData = $_REQUEST["id"];
              $current_status = "SELECT * FROM product WHERE id=$getData";
              $current_result = mysqli_query($conn, $current_status);

              if($current_result == true){
                while ($row = mysqli_fetch_array($current_result)) {?>

                  <h5>Product ID:</h5><h6><?php echo $row["id"] ?></h6>
                  <h5>Product Name:</h5><h6><?php echo $row["name"] ?></h6>
                  <h5>Product Category:</h5><h6><?php echo $row["categories"] ?></h6>
                  <h5>Product Price:</h5><h6><?php echo $row["price"] ?></h6>
                  <h5>Product Quantity:</h5><h6><?php echo $row["qty"] ?></h6>
                  <h5>Product Description:</h5><h6><?php echo $row["short_dsc"] ?></h6>
                  <?php
                    if ($row["qty"] <= 0) {?>
                      <p style="color:red"><?php echo "Not Available"; ?></p>
                    <?php }else {?>
                      <p style="color:green"><?php echo "Available"; ?></p>
                  <?php   }
                   ?>
              <?php   }
              }
            ?>


          </form>


      </div>
  </div>

  <div class="col-md-6">
    <div class="dashboard-box current">
      <?php

        include("core_file/conn.php");
        $getData = $_REQUEST["id"];
        $current_status = "SELECT * FROM product WHERE id=$getData";
        $current_result = mysqli_query($conn, $current_status);

        if($current_result == true){
          while ($row = mysqli_fetch_array($current_result)) {?>
        <td><img width="475px" height="475px"src="images/<?php echo $row["image"] ?> ?>" alt="Image">

        <?php   }
        }
      ?>
    </div>
  </div>
      </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
