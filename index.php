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

      <?php
      $trans_id = rand();
        setcookie("trnasid", $trans_id, time() + (86400 * 30), "/");
       ?>
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
            <li class="nav-item active">
    	        <a class="nav-link" href="search_product.php">Search Product <span class="sr-only"></span></a>
    	      </li>
    	    </ul>
          <div class="form-inline my-2 my-lg-0">
            <?php



            if(!isset($_COOKIE["currentUser"])) {?>
              <a href="signup.php"class="btn btn-warning">Login</a>

              <a href="cart.php">
      	    		<img  id="cart-icon" src="images/cart.png">
      	    	</a>
              <?php
              include("core_file/conn.php");
              $count_cart = "SELECT COUNT(cart_id) AS count_table FROM cart ";
              $count_cart_rs = mysqli_query($conn, $count_cart);
              if($count_cart_rs == true){

                while ($a = mysqli_fetch_array($count_cart_rs)) {
                  $count_cart = $a["count_table"];

                }?>
                <p id="cart-total"><?php echo $count_cart ?></p>
            <?php  }  ?>

      	    </div>
      	  </div>
        </nav>
        <hr>
        <div class="container">
          <!--all the body part will be here-->
              <div class="row">


                <?php
                  include("core_file/conn.php");
                  $show_product = "SELECT * FROM product";
                  $result_show_product = mysqli_query($conn, $show_product);

                  if($result_show_product == true){
                    while ($row = mysqli_fetch_array($result_show_product)) {?>
                      <div class="col-lg-4">
                        <img class="thumbnail" src="images/<?php echo $row["image"] ?>">
                          <div class="box-element product">
                            <h6><strong><?php echo $row["name"] ?></strong></h6>
                            <?php
                              if ($row["qty"] <= 0) {?>
                                <p style="color:red"><?php echo "Not Available"; ?></p>
                              <?php }else {?>
                                <p style="color:green"><?php echo "Available"; ?></p>
                            <?php   } ?>
                             <p style="color:red">Log In First To Add Product</p>
                            <hr>
                          <h4 style= " display:inline-block; float:right"><strong><?php echo $row["price"] ?> TK</strong></h4>

                          <form class="" action="core_file/cart_core.php" method="post">

                            <input class="qty_Store" type="number" name="qty" value="1">
                            <input type="hidden" name="PQID" value="<?php echo $row["id"] ?>">

                            <input type="submit" class="btn btn-outline-success add-btn" value="Add To Cart" disabled></a>
                            <a href='view_product.php?id=<?php echo $row["id"]?>'><button type="button" name="button" class="btn btn-outline-info add-btn">View</button></a>

                          </form>


                  </div>
                </div>
              <?php }}?>



              </div>


        </div>



            <?php } else {?>
              <a href="user.php"><img class = "user_imagelogo" src="images/user.png" alt=""></a>

              <a href="cart.php">
      	    		<img  id="cart-icon" src="images/cart.png">
      	    	</a>
              <?php
              include("core_file/conn.php");
              $count_cart = "SELECT COUNT(cart_id) AS count_table FROM cart ";
              $count_cart_rs = mysqli_query($conn, $count_cart);
              if($count_cart_rs == true){

                while ($a = mysqli_fetch_array($count_cart_rs)) {
                  $count_cart = $a["count_table"];

                }?>
                <p id="cart-total"><?php echo $count_cart ?></p>
            <?php  }  ?>

      	    </div>
      	  </div>
        </nav>
        <hr>
        <div class="container">
          <!--all the body part will be here-->
              <div class="row">


                <?php
                  include("core_file/conn.php");
                  $show_product = "SELECT * FROM product";
                  $result_show_product = mysqli_query($conn, $show_product);

                  if($result_show_product == true){
                    while ($row = mysqli_fetch_array($result_show_product)) {?>
                      <div class="col-lg-4">
                        <img class="thumbnail" src="images/<?php echo $row["image"] ?>">
                          <div class="box-element product">
                            <h6><strong><?php echo $row["name"] ?></strong></h6>
                            <?php
                              if ($row["qty"] <= 0) {?>
                                <p style="color:red"><?php echo "Not Available"; ?></p>
                              <?php }else {?>
                                <p style="color:green"><?php echo "Available"; ?>
                                  <?php echo $row["qty"] ?> Unit
                                </p>
                            <?php   }
                             ?>
                            <hr>
                          <h4 style= " display:inline-block; float:right"><strong><?php echo $row["price"] ?> TK</strong></h4>

                          <form class="" action="core_file/cart_core.php" method="post">

                            <input type="hidden" name="PQID" value="<?php echo $row["id"] ?>">
                            <?php
                              if ($row["qty"] <= 0) {?>
                                <input class="qty_Store" type="number" name="qty" value="1" disabled>
                                <input type="submit" class="btn btn-outline-success add-btn" value="Add To Cart" disabled></a>
                              <?php }else {?>
                                <input class="qty_Store" type="number" name="qty" value="1">
                                <input type="submit" class="btn btn-outline-success add-btn" value="Add To Cart"></a>
                            <?php   } ?>


                            <a href='view_product.php?id=<?php echo $row["id"]?>'><button type="button" name="button" class="btn btn-outline-info add-btn">View</button></a>

                          </form>


                  </div>
                </div>
              <?php }}?>



              </div>


        </div>

          <?php  }?>







    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
