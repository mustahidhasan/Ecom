<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">

  </head>
  <body>

    <center>
      <h2 style="color:red">Scan QR For Logging As Admin</h2>
      <video id="preview"></video>
    </center>

    <script src="core_file/instascan.min.js" rel="nofollow"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){

        //console.log(content);
        alert(content);
        document.cookie = "myJavascriptVar ="+content+"; path=/";

        //window.location.href=content;
        <?php include("core_file/conn.php"); if (isset($_COOKIE["myJavascriptVar"])) { $get_user = $_COOKIE["myJavascriptVar"]; include("core_file/conn.php"); $get_user = $_COOKIE["myJavascriptVar"]; $confirm_login = "SELECT * FROM admin_users where user_name='$get_user'"; $result_confirm_login = mysqli_query($conn, $confirm_login); $count1 = mysqli_num_rows($result_confirm_login); if($result_confirm_login == true){ if($count1 === 1){ while ($row = mysqli_fetch_array($result_confirm_login)) { header('location: dashboard.php?loggedin'); } }else { header("location: core_file/dashboard_logout_core.php"); } } } ?>
    window.location.reload();
  });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){

        console.error(e);
        alert(e);

    });
    </script>
    <center>
    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
      <label class="btn btn-primary active">
        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
      </label>
      <label class="btn btn-secondary">
        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
      </label>
    </div>
  </center>
  </body>
</html>
