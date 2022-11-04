<?php
  session_start();  
  include_once 'class.php'; 
  include_once 'database.php';

  $user = new User;  
  $id = $_SESSION['id'];  

  if (!isset($_SESSION["id"])) {
    header("location:login.php");  
} 

$databse = new DatabaseConnection();
$farmerObject = new Farmers();
$farmerObject->getFarmersData($id);



// Get the sold product info
$numberOfSoldProduct = 0;
$getSellProduct = "SELECT * FROM products where seller_id = $id";
$querydata = $databse->query_execute($getSellProduct);
if($rowProduct = $querydata->num_rows> 0){
    $numberOfSoldProduct = mysqli_num_rows($querydata);
}
// The number of buyer
$numbserOfBuyer = 0;
$buyerNumberQuery = "SELECT DISTINCT buyer_id FROM products where seller_id = $id";
$buyerNumberExecute = $databse->query_execute($buyerNumberQuery);
if($rowsBuyerNumber = $buyerNumberExecute->num_rows> 0){
    $numbserOfBuyer = mysqli_num_rows($buyerNumberExecute);
}
// The number of bought product
$numberOfBoughtProdut = 0;
$countBought = "SELECT * FROM products where buyer_id = $id";
$numberOfBought = $databse->query_execute($countBought);
if($rowsBuyerNumber = $numberOfBought->num_rows> 0){
    $numberOfBoughtProdut = mysqli_num_rows($numberOfBought);
}
// The number of bought product
$countSeller = 0;
$countNumberOfSeller = "SELECT DISTINCT seller_id FROM products where buyer_id = $id";
$seller= $databse->query_execute($countNumberOfSeller);
if($sellerN = $seller->num_rows> 0){
    $countSeller = mysqli_num_rows($seller);
}
//$getBuyerList = "SELECT * product_details WHERE userID = 'product_id'"



// Percentage of buyer, seller, sold and bought
$totalClient = $numbserOfBuyer+ $countSeller;
$sellerPercentage = 0;
// Percentage of seller
try{
    if($countSeller != 0)
        $sellerPercentage = ($countSeller/$totalClient)*100;
}catch(Exception $e){
    $sellerPercentage = 0;
}

$buyerPercentage = 0;
try{
    if($numbserOfBuyer != 0)
    $buyerPercentage = ($numbserOfBuyer/$totalClient)*100;
}catch(Exception $e){
    $buyerPercentage = 0;
}


$totalNumberOfBuySell = $numberOfSoldProduct+$numberOfBoughtProdut;

$buyPercentage = 0;
$soldPercentage = 0;
try{
    if($numberOfBoughtProdut != 0)
    $buyPercentage = ($numberOfBoughtProdut/$totalNumberOfBuySell)*100;
}catch(Exception $e){
    $buyPercentage = 0;
}
try{
    if($numberOfSoldProduct != 0)
    $soldPercentage = ($numberOfSoldProduct/$totalNumberOfBuySell)*100;
}catch(Exception $e){
    $soldPercentage = 0;
}



// $_SESSION['numberOfBuy'] = $numberOfBoughtProdut;

// $_SESSION['numberOfSold'] = $numberOfSoldProduct;
?>

<!DOCTYPE html>
<html lang="en">
    <head>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        
        <!-- SOCIAL MEDIA META -->
        <title>My Deshboard</title>
        
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
    </head>
    <body style="background:#1b253b;">
        <?php
            require_once("add-item.php");
        
        ?>
        <div class="dashboard">

                    <!-- Admin Menu  -->
                    <?php include_once('user-sidebar.php'); ?>
                    <!-- Admin Menu  -->

                <div class="content-body">
                    
                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <!-- admin top   -->
                            <?php include_once('user-topbar.php'); ?>
                            <!-- admin topbar   -->
                        </div>
                    </div> 
    
                <div class="row" >
                    <div class="col-xl-3" >
                        <div class="single-dashboard-data">
                            <i class="icofont-cart-alt db-item-top-left"></i>
                            <span class="float-right db-item-top-right"><?php echo number_format($buyPercentage, 1); ?>%</span>
                            <h2><?php echo $numberOfBoughtProdut;?></h2>
                            <h4>Bought item</h4>

                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="single-dashboard-data">
                            <i class="icofont-opencart db-item-top-left"></i>
                            <span class="float-right db-item-top-right"><?php echo number_format($soldPercentage, 1); ?>%</span>
                            <h2><?php echo $numberOfSoldProduct;?></h2>
                            <h4>Sold items</h4>

                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="single-dashboard-data"> 
                            <i class="icofont-business-man  db-item-top-left"></i>
                            <span class="float-right db-item-top-right"><?php echo number_format($buyerPercentage, 1); ?>%</span>
                            <h2><?php echo $numbserOfBuyer; ?></h2>
                            <h4>Buyers</h4>

                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="single-dashboard-data ">
                            <i class="icofont-farmer-alt db-item-top-left"></i>
                            <span class="float-right db-item-top-right"><?php echo number_format($sellerPercentage, 1); ?>%</span>
                            <h2><?php echo $countSeller ?></h2>
                            <h4>Seller</h4>

                        </div>
                    </div>
                </div>
                
             <!--   <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                       <div class="line-chart-area">
                                <canvas id="myChart"></canvas>
                        
                       </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                       <div class="line-chart-area">
                                <canvas id="cirlces"></canvas>
                       </div>
                    </div>
                </div>

-->

                 </div>
        </div>
     

        <!-- /Footer  -->
        
        <script src="js/jquery.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="ajax.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>`