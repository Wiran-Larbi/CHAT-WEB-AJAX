<?php
  session_unset();
  session_start();
  include "config.php";
  
  
  $UID = mysqli_real_escape_string($connect, $_POST['uid']);
  $password = mysqli_real_escape_string($connect, $_POST['pin']);
  $matchUID = "/^[a-zA-Z0-9_]+$/";
  if(!empty($UID) && !empty($password)) {
      
       if(filter_var($UID,FILTER_VALIDATE_EMAIL) || preg_match($matchUID,$UID)){
             //! Check If The User Exist in the database or not
             $search = mysqli_query($connect,"SELECT * FROM users WHERE email = '{$UID}' OR uid = '{$UID}'");
             if(mysqli_num_rows($search) > 0){
                 $account = mysqli_fetch_assoc($search);
                 //! Verifying The Password Entered
                  if(password_verify($password,$account['password'])){
                        $_SESSION['unique_id'] = $account['unique_id'];
                       
                        echo "success";
                  }else{
                        echo "Invalid Password ...";
                  }

             }else{
                echo "This Account Does Not exist ...";
             }

       }
  }else{
           echo "All Fields are required ...";
  }

//   if(!empty($UID) && !empty($password)){
//        if(filter_var($UID))
//   }
//   echo $UID,$password;
 

?>