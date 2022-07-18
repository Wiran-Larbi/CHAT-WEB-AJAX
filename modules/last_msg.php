<?php
     include("config.php");
    session_start();
     $outgoing_id = $_POST['ID'];
     $incoming_id = $_SESSION['unique_id'];

     $msg = mysqli_query($connect,"SELECT * FROM messages WHERE (incoming_id = '{$incoming_id}' AND outgoing_id = '{$outgoing_id}') OR (incoming_id = '{$outgoing_id}' AND outgoing_id = '{$incoming_id}') ORDER BY message_id DESC LIMIT 1");

     if(mysqli_num_rows($msg) > 0){
         $last_msg = mysqli_fetch_assoc($msg);
          if($last_msg['incoming_id'] === $outgoing_id)
              echo $last_msg['message'];
          else
               echo "You:".$last_msg['message'];
     }

     