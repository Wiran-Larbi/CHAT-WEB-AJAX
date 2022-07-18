<?php
      include("config.php");
      session_start();
      $outgoing_account_id = mysqli_real_escape_string($connect, $_POST['ID']);
      $incomming_account_id = $_SESSION['unique_id'];

    //   echo $outgoing_account_id, "  - ", $incomming_account_id;

      $ALLChatsql = mysqli_query($connect, "SELECT * FROM messages WHERE (incoming_id = '{$incomming_account_id}' AND outgoing_id = '{$outgoing_account_id}') OR (incoming_id = '{$outgoing_account_id}' AND outgoing_id = '{$incomming_account_id}')");
        $chats = [];
      if(mysqli_num_rows($ALLChatsql) > 0){
             while($chat = mysqli_fetch_assoc($ALLChatsql))
                 array_push($chats,$chat);
      }
           echo json_encode($chats);
             

