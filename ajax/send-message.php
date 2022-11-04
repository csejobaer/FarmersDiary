<?php
  session_start();  
  include_once '../class.php'; 
  include_once '../database.php';
  include_once '../cryptography/encrypt-decrypt.php';
$farmer = new Farmers();
$database = new DatabaseConnection();
$sender = $farmer->dataValidation($_POST['sender']);
$reciver = $farmer->dataValidation($_POST['reciver']);
$message = $farmer->dataValidation($_POST['message']);
$date = date('Y-m-d');
$time = date('H:i:s');
$encryptedMessage = encrypt_decrypt($message, 'encrypt');
if (!empty($sender) && !empty($sender) && !empty($sender)) {
	$messageQuery = "INSERT INTO chat(sender_id, reciver_id, message, timenow, datenow) values($sender, $reciver, '$encryptedMessage', '$time', '$date')";
	$executed = $database->query_execute($messageQuery);

}
