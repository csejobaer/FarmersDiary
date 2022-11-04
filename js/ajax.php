<?php

require_once('database.php');
session_start();
$ajaxData = new DatabaseConnection();
$selfId = $_SESSION['id'];
$phone = $_POST['phone'];
$productName = $_POST['sproduct'];
$weight = $_POST['sweight'];
$price = $_POST['sprice'];
$vat = $_POST['svat'];
$additionalCharge = $_POST['additionalCharges'];

$today = date("F j, Y");
$sellerId = 0;
$lastUserId = 0;
$userTypeSession = 'farmers';//$_SESSION['userType'];
// Get buyer id 
if($userTypeSession == 'farmers'){
    $buyerIdQuery = "SELECT * FROM farmersprofile WHERE $phone  = phone"; 
   $getBuyerID = $ajaxData->query_execute($buyerIdQuery);
    if ($getBuyerID->num_rows > 0) {
        // output data of each row
        while($row =$getBuyerID->fetch_assoc()) {
            $sellerId = $row["id"];
        }
    }else {
        $generateId = mt_rand(1000000000000,9999999999999);
        $sellerId = $generateId;
    }




        
    // Product id get and set
    $getproductid = "SELECT * FROM products ORDER BY product_id DESC LIMIT 1";
    $userLastID = $ajaxData->query_execute($getproductid);

    $id = 1;
    if ($userLastID->num_rows > 0) {
        // output data of each row
        while($row = $userLastID->fetch_assoc()) {
            $lastUserId = $row["product_id"]+1;
        }
    }else {
        $lastUserId = $id;
    }

    // Product details id
    $getProdctDetailsLastIdQuery = "SELECT * FROM 	prodcut_details ORDER BY product_details_id DESC LIMIT 1";
    $getProductDetailsExecuteId = $ajaxData->query_execute($getProdctDetailsLastIdQuery);

    $ids = 1;
    if ($getProductDetailsExecuteId->num_rows > 0) {
        // output data of each row
        while($getLastDetailsId = $getProductDetailsExecuteId->fetch_assoc()) {
            $ids = $getLastDetailsId["product_details_id"]+1;
        }
    }

    $productQuery = "INSERT INTO products(product_id, seller_id, buyer_id, datas) values($lastUserId, $sellerId, $selfId, '$today')";

    $dataQuery = "INSERT INTO prodcut_details(product_details_id, product_name,	product_weight,	unit_price,	vat, extra_charge, product_id) values($ids, '$productName', $weight, $price, $vat, $additionalCharge, $lastUserId)";
    
    
    if ($ajaxData->query_execute($dataQuery) == TRUE) {
        echo "Product details Added";   
    }
    if ($ajaxData->query_execute($productQuery) == TRUE) {
        echo "Product Added";   
    }


    
}




    
}





