<?php

   include("config.php");
   session_start();
   $search = mysqli_real_escape_string($connect, $_POST['search']);
   $result = [];
    if(!empty($search)){
        $result = [];
        $sql_search = mysqli_query($connect, "SELECT * FROM users WHERE fname LIKE '%$search%'"); 
        if(mysqli_num_rows($sql_search) >= 0){
            while($account = mysqli_fetch_assoc($sql_search)){
                 if($account['unique_id'] !== $_SESSION['unique_id'])
                  array_push($result, $account);
                else continue;
            }
        }else{
              array_push($result,["result" => 0]);
        }
           
          echo  json_encode($result);
     }
else{
        $result = [];
        $sql_search = mysqli_query($connect, "SELECT * FROM users"); 
        if(mysqli_num_rows($sql_search) >= 0){
            while($account = mysqli_fetch_assoc($sql_search)){
                 if($account['unique_id'] !== $_SESSION['unique_id'])
                  array_push($result, $account);
                else continue;
            }
        }else{
            array_push($result,["result" => 0]);
      }
       echo json_encode($result);
}
?>