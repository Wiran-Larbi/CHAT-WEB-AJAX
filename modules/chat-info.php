<?php
    include("config.php");
       session_start();
       $outgoing_account_id = mysqli_real_escape_string($connect, $_POST['ID']);
       $incoming_account_id = $_SESSION['unique_id'];
       
          
            $outgoing_account_sql = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = '{$outgoing_account_id}'");
            $outgoing_account = [];
            if(mysqli_num_rows($outgoing_account_sql) > 0){
                $outgoing_account = mysqli_fetch_assoc($outgoing_account_sql);
            }

            // $AllMessages = mysqli_query($connect,"SELECT * FROM messages WHERE")
            echo json_encode($outgoing_account);
              
       
         

?>                
      