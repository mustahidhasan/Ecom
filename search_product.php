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

            <li class="nav-item active">
    	        <a class="nav-link" href="search_product.php">Search Product <span class="sr-only"></span></a>
    	      </li>
    	    </ul>
          <div class="form-inline my-2 my-lg-0">


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



  	    </div>
  	  </div>
  	</nav>
    <hr>
    <div class="container">
      <!--all the body part will be here-->

                <div class="row">
                  <div class="col-lg-12">
                    <div class="box-element">

                      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Product names..">
                      <table id="myTable">

                        <tr class="header">
                          <th > Product Name</th>
                          <th >Image</th>
                          <th>Quantity</th>
                          <th >Price</th>
                          <th >Available</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>

                          <?php
                          include("core_file/conn.php");
                            $show_product = "SELECT * FROM product";
                            $show_product_res = mysqli_query($conn, $show_product);
                            if($show_product_res == true){
                              while ($row = mysqli_fetch_array($show_product_res)) { ?>
                                <tr>
                                    <td><?php echo $row["name"] ?></strong></h6></td>
                                    <td><img width="60px" height="60px"src="images/<?php echo $row["image"] ?> ?>" alt=""></td>

                                    <form class="" action="core_file/cart_core.php" method="post">

                                      <td>  <input class="qty_Store" type="number" name="qty" value="1"><td>
                                      <input type="hidden" name="PQID" value="<?php echo $row["id"] ?>">

                                      <?php
                                        if ($row["qty"] <= 0) {?>
                                          <td style="color:red"><?php echo "No"; ?></td>
                                        <?php }else {?>
                                          <td style="color:green"><?php echo "Yes";echo " ". $row["qty"]." Unit"; ?></td>
                                      <?php   } ?>
                                      <td><?php echo $row["price"] ?> TK</td>
                                      <td><input type="submit" class="btn btn-outline-success add-btn" value="Add To Cart"></a></td>
                                    </form>


                                </tr>




                            <?php  }  } ?> <!--search table -->




                          </table>





                     <?php }  ?> <!--count cart-->

                    </div>
                  </div>

        </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
  </body>
</html>
