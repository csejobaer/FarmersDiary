<?php
    include_once __dir__."/class.php";
    $farmer = new Farmers();
        $fname = $lname = $gender = $nid = $email = $address = $country = $district = $phone = $thana = $password = $type = $trade_license = "";

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
<?php
    ob_start();
    session_start();
    include_once('class.php');
    $loginUser = new User();
    if (isset($_SESSION["id"])) {
        header("location:deshboard.php");  
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <title>Farmer's Diary - Signup</title>
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        
        <!-- SOCIAL MEDIA META -->
        
        
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
    </head>
    <body> <!-- HEADER TOP -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-12">
                        <!-- LOGO AREA -->
                        <div class="logo-area">
                            <div class="logo">
                                <img src="images/logo.png" alt="CarsPoint">
                            </div>
                        </div>
                        <!-- /LOGO AREA -->
                    </div>
                    <!-- HEADER TO SINGLE CONTENT -->
                    <div class="col-xl-3 col-md-4">
                        <div class="topContent">
                            <div class="single-top">
                                <div class="top-icon align-self-center">
                                    <i class="icon icofont-location-arrow"></i>
                                </div>
                                <div class="top-content align-self-center">
                                    <p>B-46/12 Talbag, Thanaroad  Savar, Dhaka <a href="#"><span class="highlight">Find The Location</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- /HEADER TO SINGLE CONTENT -->
                    <!-- HEADER TO SINGLE CONTENT -->
                    <div class="col-xl-3 col-md-4">
                        <div class="topContent">
                            <div class="single-top">
                                <div class="top-icon">
                                    <i class="icon icofont-phone-circle align-self-center"></i>
                                </div>
                                <div class="top-content align-self-center">
                                    <p><span class="highlight">Phone</span></p>
                                    <p><b>+88 01938073856</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- /HEADER TO SINGLE CONTENT -->
                    <!-- HEADER TO SINGLE CONTENT -->
                    <div class="col-xl-3 col-md-4">
                        <div class="topContent">
                            <div class="single-top">
                                <div class="top-icon">
                                    <i class="icon icofont-headphone-alt align-self-center"></i>
                                </div>
                                <div class="top-content align-self-center">
                                    <p><span class="highlight">Phone Service:</span> 90984984</p>
                                    <p><span class="highlight">Email:</span> example@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- /HEADER TO SINGLE CONTENT -->
                </div>
            </div>
        </div>
        <!-- /HEADER TOP -->
       
        <div class="login">
            <div class="login-area">
                <div class="login-details">
                    
                    <div class="container">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="registrationForm" method="post" id="registrationForm" class="was-validated" >
                        <div class="row justify-content-center">

                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="fname">First Name*</label>
                                    <input type="text" id="fname" value="<?php if(!empty($fname)){ echo $fname;};?>" name="fname" placeholder="Enter your first name" class="form-control" required> 
                                </div>     
                                <div class="form-group">
                                    <label for="lname">Last Name*</label>
                                    <input type="text" id="lname" value="<?php if(!empty($lname)){ echo $lname;};?>" name="lname" placeholder="Enter your last name" class="form-control" required> 
                                </div> 
                            </div>
                            
                            <div class="col-xl-4"> 
                                <div class="form-group">
                                    <label for="gender">Gender*</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="default">Select Gender</option>
                                        <option value="male"  <?php if($gender == 'male'){ echo "selected";};?>>Male</option>
                                        <option value="female"  <?php if($gender == 'female'){ echo "selected";};?>>Female</option>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="phone">Phone*</label>
                                    <input type="number" id="phone" value="<?php if(!empty($phone)){ echo $phone;};?>" name="phone" placeholder="Enter phone" class="form-control" required> 
                                </div> 
                            </div>

                            <div class="col-xl-4"> 

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" value="<?php if(!empty($email)){ echo $email;};?>"  name="email" placeholder="Enter email" class="form-control"> 
                                </div> 

                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="default">Select Country</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                    </select>
                                </div>

                                
                            

                            </div>
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="district">Slect District*</label>
                                    <select name="district" id="district" class="form-control">
                                        <option value="default">Select</option>
                                        <option value="Bagerhat">Bagerhat</option>
                                        <option value="Bandarban">Bandarban</option>
                                        <option value="Barguna">Barguna</option>
                                        <option value="Barisal">Barisal</option>
                                        <option value="Bhola">Bhola</option>
                                        <option value="Bogra">Bogra</option>
                                        <option value="Brahmanbaria">Brahmanbaria</option>
                                        <option value="Chandpur">Chandpur</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Chuadanga">Chuadanga</option>
                                        <option value="Comilla">Comilla</option>
                                        <option value="Cox'sBazar">Cox'sBazar</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Faridpur">Faridpur</option>
                                        <option value="Feni">Feni</option>
                                        <option value="Gaibandha">Gaibandha</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Gopalganj">Gopalganj</option>
                                        <option value="Habiganj">Habiganj</option>
                                        <option value="Jaipurhat">Jaipurhat</option>
                                        <option value="Jamalpur">Jamalpur</option>
                                        <option value="Jessore">Jessore</option>
                                        <option value="Jhalokati">Jhalokati</option>
                                        <option value="Jhenaidah">Jhenaidah</option>
                                        <option value="Khagrachari">Khagrachari</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Kishoreganj">Kishoreganj</option>
                                        <option value="Kurigram">Kurigram</option>
                                        <option value="Kushtia">Kushtia</option>
                                        <option value="Lakshmipur">Lakshmipur</option>
                                        <option value="Lalmonirhat">Lalmonirhat</option>
                                        <option value="Madaripur">Madaripur</option>
                                        <option value="Magura">Magura</option>
                                        <option value="Manikganj">Manikganj</option>
                                        <option value="Maulvibazar">Maulvibazar</option>
                                        <option value="Meherpur">Meherpur</option>
                                        <option value="Munshiganj">Munshiganj</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Naogaon">Naogaon</option>
                                        <option value="Narail">Narail</option>
                                        <option value="Narayanganj">Narayanganj</option>
                                        <option value="Narsingdi">Narsingdi</option>
                                        <option value="Natore">Natore</option>
                                        <option value="Nawabganj">Nawabganj</option>
                                        <option value="Netrokona">Netrokona</option>
                                        <option value="Nilphamari">Nilphamari</option>
                                        <option value="Noakhali">Noakhali</option>
                                        <option value="Pabna">Pabna</option>
                                        <option value="Panchagarh">Panchagarh</option>
                                        <option value="Patuakhali">Patuakhali</option>
                                        <option value="Pirojpur">Pirojpur</option>
                                        <option value="Rajbari">Rajbari</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Rangamati">Rangamati</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Satkhira">Satkhira</option>
                                        <option value="Shariatpur">Shariatpur</option>
                                        <option value="Sherpur">Sherpur</option>
                                        <option value="Sirajganj">Sirajganj</option>
                                        <option value="Sunamganj">Sunamganj</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Tangail">Tangail</option>
                                        <option value="Thakurgaon">Thakurgaon</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-4">

                               
                                <div class="form-group">
                                    <label for="police">Polic Station*</label>
                                    <select name="police" id="plice" class="form-control">
                                        <option value="default">Police Station Select</option>
                                        <option value="Dhaka">Dhaka</option>
                                    </select>
                                </div>
                            </div>

                            
                           <div class="col-xl-4">

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="address">Address*</label>
                                        <input type="text" id="address" value="<?php if(!empty($address)){ echo $address;};?>"  name="address" placeholder="Enter address" class="form-control" required> 
                                    </div> 
                                </div>
                            </div>

                            <div class="col-xl-4">

                                <div class="form-group">
                                    <label for="address">Password*</label>
                                    <input type="password" id="password" value="<?php if(!empty($password)){ echo $password;};?>"  name="password" placeholder="Enter Password" class="form-control" required> 
                                </div> 
                            </div>
                            <div class="col-xl-4">
                                 <div class="form-group">
                                    <label for="type">Profile Type*</label>
                                    <select id="type"  name="type" class="form-control" required> 
                                        <option value="farmer" <?php if($type == 'farmer'){ echo "selected";};?> >Farmer</option>
                                        <option value="mediator" <?php if($type == 'mediator'){ echo "selected";};?>>Mediator</option>
                                        <option value="buyer" <?php if($type == 'buyer'){ echo "selected";};?>>Buyer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 tread">
                                <div class="form-group">
                                    <label for="tread">Tread Lisence*</label>
                                    <input type="text" id="tread"  value="<?php if(!empty($trade_license)){ echo $trade_license;};?>"  name="tread" placeholder="Enter tread Lisence" class="form-control" required> 
                                </div>
                            </div>
                            

                            
                        </div>
                        <div class="row">
                            <div class="form-group login-group col-xl-2">
                                <input type="submit" id="regSubmit" class="login-submit singup-submit submit" value="Register now">
                            </div>
                            <div class="col-xl-6 terms-btn">
                                <input type="checkbox" class="form-check-input is-invalid" id="invalidCheck3" required> 
                                <label class="form-check-label"  for="invalidCheck3">I agree with all the all the <a href="terms.html">terms</a> and <a href="conditions.html">conditions</a></label>
                                <p>If you are registerd, please click here to <a href="login.html"><span class="highlight">Login</span></a>. Or back to <a href="index.html"><span class="highlight">Home</span></a> page</p>
                            </div>
                        </div>
                        
                    </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- /Footer  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>