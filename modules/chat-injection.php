<?php 
     include("config.php");
     session_start();
      $incoming_id = $_SESSION['unique_id'];
      $outgoing_id = $_POST['outgoing_id'];
      $message = mysqli_real_escape_string($connect, $_POST['message']);
      //! Let's Insert this message into the database
       $message_inject = mysqli_query($connect, "INSERT INTO messages(incoming_id,outgoing_id,message) VALUES ('{$incoming_id}','{$outgoing_id}','{$message}')");
       if($message_inject) echo "Message: $message ,sent From $incoming_id To $outgoing_id";
       else echo "There is a Problem While Sending...";

?>


