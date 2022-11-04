<?php

    include_once __dir__."/class.php";
    $farmer = new Farmers();


        if ($_SERVER["REQUEST_METHOD"] == "POST"){  
            
            //if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $fname = $farmer->dataValidation($_POST['fname']);
            $lname = $farmer->dataValidation($_POST['lname']);
            $gender = $farmer->dataValidation($_POST['gender']);
            $nid = 9788889803;
            $address = $farmer->dataValidation($_POST['address']);
            $country = $farmer->dataValidation($_POST['country']);
            $district = $farmer->dataValidation($_POST['district']);
            $phone = $farmer->dataValidation($_POST['phone']);
            $thana = $farmer->dataValidation($_POST['police']);
            $password = $farmer->dataValidation($_POST['password']);
            $type = $farmer->dataValidation($_POST['type']);
            $trade_license = $farmer->dataValidation($_POST['tread']);
        //}
           $farmer->requiredData($fname, $lname, $gender, $nid, $phone, $password, $address, $thana, $district, $country, $type); 
         
            // if($register){  
            //     echo "Registration Successful!";  
            // else
            // {  
            //     echo "Entered email already exist!";  
            // }  
            // function errorMessage($errorList){
            //     header("Location: signup.php");
            //     for($i = 0; $i<count($errorList); $i++){
            //         echo $errorList[i];
            //     }
            //     return false;
            // }
            // errorMessage($erorrBox);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success fully registered</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/icofont/icofont.min.css">
</head>
<body>


    <div class="main">
        <div class="container">
            <div class="container-wrapper">
                <div class="container-content">
                    <div class="container-align">
                        
                        <div class="row justify-content-center">
                            <!-- single success  -->
                            <div class="col-md-3">
                                <div class="single-success">
                                    <div class="success-icon">
                                        <i class="icofont-home"></i>
                                    </div>
                                    <div class="success-text">
                                        <p>If you wnat to back home page then click on Home the botton</p>
                                    </div>
                                    <div class="success-button">
                                        <a href="index.php" class="btn btn-default">Home</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- single success  -->
                            <!-- single success  -->
                            <div class="col-md-3">
                                <div class="single-success">
                                    <div class="success-icon">
                                    <i class="icofont-login primary"></i>
                                    </div>
                                    <div class="success-text">
                                        <p>Please click on login button to enter the login interface :)</p>
                                    </div>
                                    <div class="success-button">
                                        <a href="login.php" class="btn btn-default primary">Login now</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- single success  -->
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>