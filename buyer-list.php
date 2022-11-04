<?php
  session_start();  
  include_once 'class.php'; 
  include_once 'database.php';

  $user = new User;  
  $id = $_SESSION['id'];  
  $type = $_SESSION['type'];

  if (!isset($_SESSION["id"])) {
    header("location:login.php");  
} 

$database = new DatabaseConnection();
$farmerObject = new Farmers();
$farmerObject->getFarmersData($id);




?>
<!DOCTYPE html>
<html lang="en">
    <head>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <title>My Client - Farmer's Diary</title>
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        
        <!-- SOCIAL MEDIA META -->
        
        
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
        <link rel="stylesheet" href="css/manage-audio.css">
    </head>
    <body style="background:#1b253b;">
    
        <div class="dashboard">

                    
                    <!-- Admin Menu  -->
                    <?php include_once('user-sidebar.php'); ?>
                    <!-- Admin Menu  -->



    




                <div class="content-body">
                    
                    <div class="row">
                            <div class="col-xl-12 col-md-12">
                            <!-- admin top   -->
                            <div class="header-top-admin">
                                
                                <div class="breadcrumbs float-left">
                                    <ul>
                                        <li><a href="">Application</a></li>
                                        <span> > </span>
                                        <li><a href="">Sold Items</a></li>
                                    </ul>
                                </div>
                                <div class="profile-area float-right">
                                    <div class="profile-icon">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icofont-notification"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icofont-business-man"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- admin topbar   -->
                        </div> 
                    </div> 



       

<!-- Modal -->
<div class="modal fade" id="recordOpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Record your voice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Record Button -->
        <div class="audio-record">
          <button id="recordButton"><i class="icofont-radio-mic" style="color: green; font-size: 40px;"></i></button>
          <button id="stopButton" class="inactive"><i class="icofont-stop" style="color: red; font-size: 40px;"></i></button>
        </div>
        <!-- Record download -->
    <!--     <div class="download">
          <button class="hidden" id="downloadContainer">
            <a href="" download="" id="downloadButton">Download Audio</a>
          </button>
        </div> -->
        <!-- Record Playback -->
        
        <div class="playback">
          <audio src="" controls id="audio-playback" class="hidden"></audio>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
      </div>
    </div>
  </div>
</div>
                    <!-- Deshboard content  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-title">
                                <h2>Our <span class="highlight">Clients</span></h2>
                                <p>We are here</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">



                    <?php 
                        $startRealod = 0;
                        $chatUser = 0;
                        // Select buyer list form product
                        $buyerList = "SELECT DISTINCT buyer_id FROM products where '$id' = seller_id GROUP BY buyer_id" ;
                        $buyerQuery = $database->query_execute($buyerList);
                        if($buyerQuery->num_rows > 0) {
                            while ($singleBuyer = $buyerQuery->fetch_assoc()) {
                                $identity = $singleBuyer['buyer_id'];
                        // Select buyer profile from profile database
                        $getBuyerProfile = "SELECT id, fname, lname, phone FROM farmersprofile where '$identity'= id";
                        $getBuyerData = $database->query_execute($getBuyerProfile);
                            if($getBuyerData->num_rows > 0){
                                while ( $row = $getBuyerData->fetch_assoc() ) {
                                    $chatUser = $row['id'];
                                    ?>

                                <!-- Single client area -->
                                    <div class="col-md-4">
                                        <div class="single-client">
                                            <div class="client-image">
                                                <img src="images/user.png" alt="" >
                                            </div>
                                            <div class="client-details">    
                                                <div class="client-description">
                                                    <h4><?php echo $row['fname']?> <?php echo $row['lname']?></h4>
                                                    <h5>Client</h5>
                                                    <p title="Call now" tel="">0<?php echo $row['phone']?></p>
                                                </div>
                                                <div class="client-btn"> 
                                                    <button class="btn btn-default" id="profiile_<?php echo md5($row['id']);?>" title="View profile">Profile</button>
                                                    <button class="btn btn-primary chatOpen" id="chat_<?php echo md5($row['id']);?>" title="Chat now">Chat Now</button>
                                                </div>  
                                            </div>  

                                        </div>
                                    </div>
                                    <!-- /Single client area -->
                                    <?php
                                        }
                                    }
                                    
                                }
                            }
                        


                     ?>
                    



                   
                    </div>

                    <div id="chatBox"></div>
                    <?php // require('chat.php');?>
                    

                 </div>
        </div>
     



        <!-- /Footer  -->
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="ajax.js"></script>
        <script type="text/javascript" src="js/manage-audio.js"></script>
        <script src="js/main.js"></script>

        <script>
            

        $(document).ready(function(){
            // User id 
            var userid = <?php echo $chatUser; ?>;
            var myuser = <?php echo $id; ?>;
            $("button.chatOpen").click(function(){
                $.ajax({
                    url: "chat.php",
                    'type': 'post',
                    success: function(result){

                        $("#chatBox").html(result);
                    }, 
                    'data': {
                        'buyerChat': userid,
                        'myid' : myuser
                    }
                });

            });
        
   
 function loadlinkBoughtItem(){
            $('.chat-list').load('chat.php',function () {
                 $(this).unwrap();
            });
        }
        function ajaxReload(){
            loadlinkBoughtItem(); // This will run on page load
            var inverval = setInterval(function(){
                loadlinkBoughtItem(); // this will run after every 5 seconds

            }, 5000);

        }
      // ajaxReload();





        });



        </script>

       
    </body>
</html>