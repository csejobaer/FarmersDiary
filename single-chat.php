    <?php 
    session_start();
    include('functions.php');

      $database = new DatabaseConnection();
$myId = $_POST['amarId'];
$userId = $_POST['senderId'];

                          if (isset($_POST['update'])) {
                            $chatQuery = "SELECT * FROM chat WHERE '$myId' = sender_id and '$userId' = reciver_id or '$myId' = reciver_id and '$userId' = sender_id";
                                $chatExecute = $database->query_execute($chatQuery);

                            
                                        if ($chatExecute->num_rows>0) {
                                          while ( $row = $chatExecute->fetch_assoc()) {

                                            if($row['reciver_id'] == $userId){
                                              ?>  
                                              <!-- left Chat -->
                                              <div class="single-chat left"><img src="images/user.png"><p><?php echo encrypt_decrypt($row['message'],'decrypt');?></p></div>
                                              <?php

                                            }else{

                                              ?>
                                              <!-- right chat -->
                                              <div class="single-chat right"><img src="images/user.png"><p><?php echo encrypt_decrypt($row['message'],'decrypt');?></p></div>
                                            <?php
                                            }
                                          }
                                        }
                          }
die();
                                 ?>