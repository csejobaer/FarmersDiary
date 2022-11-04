
    <?php

      include_once 'class.php'; 
      include_once 'database.php';
      include_once 'cryptography/encrypt-decrypt.php';


      $database = new DatabaseConnection();
      $farmerObject = new Farmers();



      $userId = $_POST['buyerChat'];
      $myId = $_POST['myid'];
      // Get chat list query
  
      $getSenderInfo = "SELECT fname, lname FROM farmersprofile WHERE '$userId' = id";
      $getSenderInfoExecute = $database->query_execute($getSenderInfo);
      $messagesenderName = "";
      if ($getSenderInfoExecute->num_rows > 0) {
        while ($row = $getSenderInfoExecute->fetch_assoc()) {
          $messagesenderName = $row['fname']." ".$row['lname'];
        }
      }

    ?>


                  <div class="chatbox">
                    <!-- Chat Header -->
                      <div class="chat-header">
                          <div class="chat-top-icon">
                              <span id="videoCall"><i class="icofont-video-cam"></i></span>
                              <span id="audioCall"><i class="icofont-ui-call"></i></span>
                              <span class="senderName"><?php echo $messagesenderName; ?></span>
                              <span class="float-right close_btn"><i class="icofont-close-line"></i></span>
                          </div>
                      </div>
                    <!-- /Chat Header -->
                    <!-- Chat Body -->
                    <div class="chat-body">
                     
                        <div class="single-chat">
                            <!-- Chat list -->
                            <div class="chat-list">
                        <?php 
                          $chatQuery = "SELECT * FROM chat WHERE '$myId' = sender_id and '$userId' = reciver_id or '$myId' = reciver_id and '$userId' = sender_id";
                          $chatExecute = $database->query_execute($chatQuery);

                        ?>
                                <?php 
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

                                 ?>


<!-- 
                                <div class="single-chat left"><img src="images/user.png"><p>I am ok, how about you</p></div>
                                <div class="single-chat right"><img src="images/user.png"><p>Tell me why are you message me</p></div>
                                <div class="single-chat right"><img src="images/user.png"><p>I am so busy. knock me letter, Thank you</p></div>
                                <div class="single-chat left"><img src="images/user.png"><p>Hello</p></div>
                                <div class="single-chat right"><img src="images/user.png"><p>Hi, How are you</p></div>
                                <div class="single-chat left"><img src="images/user.png"><p>I am ok, how about you</p></div>
                                <div class="single-chat right"><img src="images/user.png"><p>Tell me why are you message me</p></div>
                                <div class="single-chat right"><img src="images/user.png"><p>I am so busy. knock me letter, Thank you</p></div> -->
                            </div>
                            <!-- /Chat list -->
                        </div>
                    </div>
                    <!-- /Chat Body -->
                    <div class="chat-footer">
                        <div class="left-icons">
                            <button class="button"><i class="icofont-image"></i></i></button>
                            <button class="button" data-toggle="modal" data-target="#recordOpen"><i class="icofont-microphone"></i></i></button>
                        </div>
                        <div class="send-message">
                            <input type="text" class="form-control" id="message" class="message" name="message">
                            <i class="icofont-location-arrow send-btn" id="sendMessage"></i>
                        </div>
                    </div>

                  </div>
                  <!-- End chat box -->






        <script type="text/javascript">
          // remove chat box
        $(document).ready(function(){
          $('.chat-top-icon').on('click', function () {
              $('.chatbox').hide();
          });


          var sender = <?php echo $userId;?>;
          var reciver = <?php echo $myId; ?>;
          $("#sendMessage").click(function(){
              var message = $('#message').val();
              if(message.length > 0){
                $.ajax({
                  'url': 'ajax/send-message.php', 
                  'success': function(value){
                  //ajaxReload();
                  },
                  'type': 'post',
                  'data': {
                    'sender': sender,
                    'reciver': reciver,
                    'message': message
                  }

                });
                message = $('#message').val("");
              }
          });












          setInterval(function(){
            $.ajax({
              'url': 'single-chat.php',
              'type': 'POST',
              'data': {
                'update': '',
                'amarId' : reciver,
                'senderId': sender
              }, 
              'success': function(result){
                jQuery('.chat-list').html(result);
              }
            });
          }, 400);




       







        });



        </script>