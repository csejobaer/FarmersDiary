<?php
  session_start();  
  include_once 'class.php';  
  sleep(5);
  $user = new User;  
  $id = $_SESSION['id'];  
  if (!$user->session()){  
     header("location:login.php");  
  }else{
    header("Location: deshboard.php");
  }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <!-- TWITTER BOOTSTRAP and CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/icofont/icofont.min.css">
</head>
<body>
    <div class="main">
        <div class="continer">
            <div class="container-wrapper">
                <div class="container-content">
                    <div class="container-align text-center">
                    <i class="icofont-farmer" style="font-size: 100px; color: rgb(10, 112, 0);"></i>
                        <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- /Footer  -->
        <script type="text/javascript">
          
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>`