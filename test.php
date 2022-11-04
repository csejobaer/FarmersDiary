<?php


require_once('database.php');

$ajaxData = new DatabaseConnection();
$selfId = 100000000;
$phone = 1312889131;
$productName = "jksdfsdkflsd";
$weight = 3;
$price = 3;
$vat = 2;
$additionalCharge = 5;
$today = date("j-n-Y");

$sellerId = 0;
$lastUserId = 0;
$userTypeSession = 'farmers';
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
echo  $lastUserId."<br/>";
echo $sellerId."<br/>";




echo $selfId."<br/>";
echo $today."<br/>";

    $productQuery = "INSERT INTO products(product_id, seller_id, buyer_id, datas) values($lastUserId, $sellerId, $selfId, '$today')";

    $dataQuery = "INSERT INTO prodcut_details(product_details_id, product_name,	product_weight,	unit_price,	vat, extra_charge, product_id) values($ids, '$productName', $weight, $price, $vat, $additionalCharge, $lastUserId)";
    
    
    if ($ajaxData->query_execute($dataQuery) == TRUE) {
        echo "Product details Added";   
    }
    if ($ajaxData->query_execute($productQuery) == TRUE) {
        echo "Product Added";   
    }


    
}







?>