<?php
    ob_start();
    session_start();
    include_once('class.php');
    $loginUser = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $loginUser->login($_REQUEST['mobile'], $_REQUEST['password'], $_REQUEST['userType']);
        
    }
    if (isset($_SESSION["id"])) {
        $_SESSION['type'] = $_REQUEST['userType'];
        header("location:deshboard.php");  
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <title>Login - Farmer's Diary</title>
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        
        <!-- SOCIAL MEDIA META -->
        
        
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
    </head>
    <body>
       
        <div class="login">
            <div class="login-area">
                <div class="login-details">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4">
                                <div class="login-content">
                                    <div class="error-list"></div>
                                    <form action="" name="login_form" id="login_form" method="post">
                                        <div class="form-group">
                                            <label for="mobile">Phone*</label>
                                            <input type="number" id="mobile" name="mobile" placeholder="Enter Phone Number" class="form-control"> 
                                        </div>     
                                        <div class="form-group">
                                            <label for="password">Password*</label>
                                            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control"> 
                                        </div>     
                                        <div class="form-group">
                                            <label for="userType">User Type*</label>
                                            <select name="userType" class="form-control" id="userType">
                                                <option value="default">Please Select Type</option>
                                                <option value="farmers">Farmer</option>
                                                <option value="mediator">Mediator</option>
                                                <option value="buyer">Buyer</option>
                                            </select>
                                        </div> 
                                        <div class="form-group login-group position-relative">
                                            <input type="submit" class="login-submit" id="submit" value="Login">
                                            <div class="agree-cls">
                                                <input type="checkbox" id="agree" required> 
                                                <span class="agree">I agree with all the all the <a href="terms.php">terms</a> and <a href="conditions.php">conditions</a></span>
                                            </div>
                                            
                                        </div>
                                        <div class="account">
                                            <p>If you are not registerd, please click here to <a href="signup.php"><span class="highlight">Signup</span></a>. Or back to <a href="index.php"><span class="highlight">Home</span></a> page</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
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