<?php
        session_start();
        include "config.php";
        header('Content-Type: application/json');
        //* Retrieving all users from the backend 
        $data = [];
        $thisUID = $_SESSION["unique_id"]; 
        $allUsers = mysqli_query($connect, "SELECT * FROM users");
        
        if(mysqli_num_rows($allUsers) <= 1){
               $data = ["users" => 0];
        }else{
            while($row = mysqli_fetch_assoc($allUsers)){
                 if($row['unique_id'] !== $thisUID)
                    array_push($data,$row); 
            }
        }
         echo json_encode($data);

?>