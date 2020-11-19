<!--i will work on it later after managing the checkout db-->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ecom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="main.js" async></script>

    </script>
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
    	        <a class="nav-link" href="index.php">Store <span class="sr-only"></span></a>
    	      </li>
    	    </ul>
          <div class="form-inline my-2 my-lg-0">


  	     	<a href="#">
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



  	    </div>
  	  </div>
  	</nav>
    <hr>
    <div class="container">
      <!--all the body part will be here-->

                <div class="row">
                  <div class="col-lg-12">
                    <div class="box-element">

                      <form class="" action="core_file/update_trans.php" method="post">
                        <a class="btn btn-outline-dark" href="index.php">&#x2190 Continue Shopping</a>


                    <?php  if($count_cart > 0){ ?>
                      <input style="float:right;margin:5px;" class="btn btn-success btnP" type="submit" name="" value="Checkout">
                    <?php  }else{ ?>
                      <input style="float:right;margin:5px;" class="btn btn-success btnP" type="submit" name="" value="Checkout" disabled>
                  <?php  }  }  ?>


                      <table class="table">
                        <tr style="font-weight:bold;">
                          <td>Product Image</td>
                          <td>Product Name</td>
                          <td>Product Prices</td>
                          <td>Product Quantity</td>
                          <td>Action</td>


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
                                  <td><?php echo $row["name"] ?></td>
                                  <td><?php echo $row["price"] ?></td>
                                  <td><?php echo $row["qty_cart"] ?></td>

                                  <td><a href="core_file/delete_cart_core.php?id=<?php echo $row["cart_id"] ?>"><button class="btn btn-danger btnP" type="button" name="button">Remove</button></a></td>

                                </tr>

                              </form>

                          <?php }}?>
                      </table>


                    </div>
                  </div>

        </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
