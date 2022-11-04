<?php


require_once('database.php');
session_start();
$ajaxData = new DatabaseConnection();
$selfId = $_SESSION['id'];
$phone = $_POST['phone'];
$sellerType = $_POST['sellerType'];





  // // User existency validation
    if($sellerType == 'farmer'){
    $sellerTypeAccessCheck = "SELECT * FROM farmersprofile WHERE $phone  = phone"; 
    $getBuyerID = $ajaxData->query_execute($buyerIdQuery);
        if ($getBuyerID->num_rows > 0) {
            // output data of each row
            while($row =$getBuyerID->fetch_assoc()) {
                $sellerId = $row["id"];
            }
        }




        if ($query) {
		    echo "success"; //anything on success
		} else {
		    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
		}
    }
   