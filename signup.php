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

        <!-- All the product form inserted-->
        <div class="col-md-9">
          <div style="margin-left:250px; margin-top:100px; background-image:url(images/signup.jpg);"class="dashboard-box">
            <h2 style="color:white">Log In</h2>
          <form  action="core_file/signup_core.php" method="post" enctype="multipart/form-data">
            <div class="user-box">
                <label style="color:white">Your Name:</label>
              <input type="text" name="signup_user_name">

            </div>

            <div class="user-box">
                <label style="color:white">Your Email</label>
              <input type="text" name="signup_user_email">

            </div>

            <div class="user-box">
                <label style="color:white">Your Address</label>
              <input type="text" name="signup_user_address">

            </div>

            <div class="user-box">
                <label style="color:white">Your Phone Number:</label>
              <input type="text" name="signup_user_phone">

            </div>
            <div class="user-box">
                <label style="color:white">Your Password:</label>
              <input type="password" name="signup_user_pass">

            </div>
            <div class="user-box">
                <label style="color:white">Your Image</label>
              <input type="file" name="signup_user_pic">

            </div>

            <a href="login.php"><button style="font-size:25px" class="btn btn-primary btnP" type="button" name="button">Already Have An Account</button></a></td>
            <input style="font-size:25px"class="btn btn-success btnP"type="submit" name="" value="Signup">
            </form>
          </div>
        </div>

      </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
