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

      <div class="$row">
        <div class="col-md-12">
          <div class="box-element"  id="form-wrapper">
            <table class="table">
            <center><h2>Ecom</h2></center><hr>

              <tr style="font-weight:bold;">
                <td>Product Name</td>
                <td>Product Prices</td>
                <td>Product Quantity</td>
                <td>Total Price</td>


              </tr>

            <?php
              include("core_file/conn.php");
              if(isset($_COOKIE["trnasid"])){
                $get_trans = $_COOKIE["trnasid"];

                $show_bill = "SELECT * FROM checkout INNER JOIN admin_users ON checkout.c_user_email=admin_users.email INNER JOIN product ON checkout.c_product_id=product.id WHERE trans = '$get_trans' ";
            }
              $show_bill_result = mysqli_query($conn, $show_bill);
              if($show_bill_result  == true){
             while ($row = mysqli_fetch_array($show_bill_result)){
                  $name = $row["user_name"];
                  $address = $row["address"];
                  $phn = $row["phone"];
                  $email = $row["email"]; ?>

                  <tr>

                    <?php $names = $row["name"] ?>
                    <td><?php echo $names ?></td>
                    <td><?php echo $row["price"] ?></td>
                    <td><?php echo $row["c_qty_cart"] ?></td>

                    <?php $total_price =  $row["price"]*$row["c_qty_cart"] ?>
                    <td><?php echo $total_price ?></td>
                    <td><?php $trans_id =  $row["trans"] ?></td>


                </tr>

              <?php  }  }  ?>











              </table>
              <?php
                include("core_file/conn.php");
                if(isset($_COOKIE["currentUser"])){
                  $get_cookie = $_COOKIE["currentUser"];

                  $total = "SELECT SUM(c_cart_total) AS payable FROM checkout WHERE trans = '$get_trans' ";
              }
              $total_result = mysqli_query($conn, $total);
              if($total_result == true){
                while ($row = mysqli_fetch_array($total_result)) { ?>
                  <?php $payable = $row["payable"]; ?>
              <?php  }  } ?>
              <div class="total">
               <p>Total Payable: <?php echo $payable ?></p>
              </div>


              <div class="bill_to">
                <hr>
                <h4>Bill To:</h4>
                <hr>
                <h6>Name: </h6><p><?php echo $name ?></p>
                <h6>Address: </h6><p> <?php echo $address ?></p>
                <h6>Phone Number: </h6><p> <?php echo $phn ?></p>
                <h6>Email:</h6> <p> <?php echo $email ?></p>
                <h6>Transaction Id:</h6> <p> <?php echo $trans_id ?></p>
              </div>




          </div>
        </div>




      </div>



    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
