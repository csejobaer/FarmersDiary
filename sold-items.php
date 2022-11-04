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
        <title>My Sold Products - Farmer's Diary</title>
        <meta name="author" content="Themezinho">
        <meta name="description" content="Logistic and Transportation Template">
        <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">
        
        <!-- SOCIAL MEDIA META -->
        
        
        <!-- TWITTER BOOTSTRAP and CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/icofont/icofont.min.css">
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
                            <?php include_once('user-topbar.php') ?>
                            <!-- admin topbar   -->
                        </div> 
                    </div> 

                    <!-- Deshboard content  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-title">
                                <h2>My <span class="highlight">Sold</span> Items</h2>
                                <p> <?php 
function Greetings($hours)
{
    if ($hours >= 0 && $hours <= 12) {
        return "Good Morning.";
    } else {
        if ($hours > 12 && $hours <= 17) {
            return "Good Afternoon.";
        } else {
            if ($hours > 17 && $hours <= 20) {
                return "Good Evening";
            } else {
                return "Good Night";
            }
        }
    }
}
$hour = date('H');
print Greetings($hour);

?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="print-btn float-right">
                                <button class="btn btn-default save"><i class="icofont-save" id="save"></i> Save</button>
                                <button class="btn btn-default print"><i class="icofont-printer"></i> Print</button>
                            </div>
                        </div>
                    </div>
                    <!-- Deshboard content  -->
                    <div class="row table-area">
                        
                        <?php 
                            include_once('user-and-company-info.php');
                         ?>
                        <div class="deshboard-header-line">
                            <ul>
                                <li><strong>Account: </strong><?php echo $id; ?></li>
                                <li><strong>Date:</strong> <?php echo date("F j, Y");?></li>
                                <li><strong>Total Token: </strong>367</li>
                                <li><Strong>Invoice: </Strong>0</li>
                            </ul>
                            <p>Investment in agriculture is the best weapon against hunger and poverty, and they have made life better for billions of people.</p>
                        </div>
                        


                    

 <div class="col-md-12">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Buyer</th>
                                            <th>Product Name</th>
                                            <th>Amount/Weight</th>
                                            <th>Vat</th>
                                            <th>Extra charge</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>


                        <?php






                            /*=================================
                            ***************** Product Table Data
                            ===================================*/
                           $productPrice = 0;
                           $prodcutNames = "";
                           $weight = 0;
                           $vat = 0;
                           $extra = 0;
                           $modelId  = 0;

                            $sellerQuery = "SELECT * FROM products WHERE '$id' = seller_id";

                            

                            $queryExecute = $database->query_execute($sellerQuery);
                            if ($queryExecute->num_rows > 0) {
                                while ($row = $queryExecute->fetch_assoc()) {

                                    $product_id = $row['product_id'];
                                    $modelId = $row['product_id'];
                                    
                                    /*=================================
                                    ***************** Product_details Table Data
                                    ===================================*/
                                    $productInfo = "SELECT * FROM prodcut_details WHERE '$product_id' = product_id";
                                    $productInfoExecute = $database->query_execute($productInfo);
                                    if ($productInfoExecute->num_rows > 0) {
                                        while ($productsLine = $productInfoExecute->fetch_assoc()) {
                                            $productPrice +=  $productsLine['unit_price'];
                                            $prodcutNames .= $productsLine['product_name']." ";
                                            $weight += $productsLine['weight'];
                                            $vat += $productsLine['vat'];
                                            $extra+= $productsLine['extra_charge'];
                                        }
                                    }
                                    /*=================================
                                    ***************** End Product_details Table Data
                                    ===================================*/


?>

                       
                                    
                                        <tr>
                                            <td><?php echo $row['product_id'];?></td>
                                            <td>Samsu</td>
                                            <td><?php echo $prodcutNames;?></td>
                                            <td><?php echo $weight;?></td>
                                            <td><?php echo $vat;?></td>
                                            <td><?php echo $extra;?></td>
                                            <td><?php echo $productPrice;?></td>

                                            <td><button class="btn btn-default save" type="button"  data-toggle="modal" data-target="#<?php echo $modelId;?>">Details</button></td>
                                        </tr>
<?php

                           $productPrice = 0;
                           $prodcutNames = "";
                           $weight = 0;
                           $vat = 0;
                           $extra = 0;
                           
                                }
                            }



                        ?>

                        
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>













                 </div>
        </div>
     








<?php
    /*=================================
    ***************** Single model
    ===================================*/
    $sellerQuery = "SELECT * FROM products WHERE '$id' = seller_id";
        $queryExecute = $database->query_execute($sellerQuery);
        if ($queryExecute->num_rows > 0) {
            while ($row = $queryExecute->fetch_assoc()) {
                $product_id = $row['product_id'];
                               
 ?>                                                            
  <!-- Modal -->
  <div class="modal fade" id="<?php echo $row['product_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Product details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tbody>
                <tr>
                    <th>Item</th>
                    <th>Weight</th>
                    <th>Price/Unit</th>
                    <th>Extra Charge</th>
                    <th>Vat</th>
                    <th>Total Price</th>
                </tr>

                <?php
                /*=================================
                ***************** Product_details Table Data
                ===================================*/
                $modelProduct = "SELECT * FROM prodcut_details WHERE '$product_id' = product_id";
                $modellist = $database->query_execute($modelProduct);
                if ($modellist->num_rows > 0) {
                    while ($productRow = $modellist->fetch_assoc()) {
                       ?>


                <tr>

                    <td><?php echo $productRow['product_name'];?></td>
                    <td><?php echo $productRow['weight'];?></td>
                    <td><?php echo $productRow['unit_price']; ?></td>
                    <td><?php echo $productRow['extra_charge']; ?></td>
                    <td><?php echo $productRow['vat'];?></td>
                    <td><?php echo $productRow['unit_price']*$productRow['weight'];?></td>
  
                </tr>

                                       

                                           <?php
                                        }
                                    }

                    ?>

                                                        
                                                        
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>   
                     
         <?php 
         }

        }
         ?>                                                       
                                                        
                                      

                                            








        <!-- /Footer  -->
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>