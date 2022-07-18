<?php
  session_start();
 include "config.php";
  
  $fname = mysqli_real_escape_string($connect, $_POST['fname']);
  $lname = mysqli_real_escape_string($connect, $_POST['lname']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);
  $uid = "uid";
  $image = "profile-male.svg";

  
   if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        
     //? If Email is Valid : Here we do another checking
     if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      
        //! We Well Search in the database to find if that email is taken or not
          $sql_email = mysqli_query($connect, "SELECT email FROM users WHERE email = '{$email}'");
          if(mysqli_num_rows($sql_email) > 0){
                echo "This Email Already Existing !";
          }else{
                $time = time();
                // echo "Nice You've created an Account, redirecting to ssager...";
                $status = "Active now";
                $randomID = rand($time,1000000);
                $Hashed_Password = password_hash($password,PASSWORD_DEFAULT);

                //! Inserting Into The Database.
                 $sql_insert = mysqli_query($connect, "INSERT INTO users (unique_id,fname,lname,email,password,image,status,uid) VALUES ({$randomID}, '{$fname}', '{$lname}', '{$email}','{$Hashed_Password}','{$image}','{$status}','{$uid}')");
                  if($sql_insert){
                     //! If Data Inserted Successfully
                       
                        $sql_session = mysqli_query($connect,"SELECT * FROM users WHERE email = '{$email}'");
                           if(mysqli_num_rows($sql_session) > 0) {
                                $row = mysqli_fetch_assoc($sql_session);
                              //   $_COOKIE['unique_id'] = $row['unique_id'];
                                $_SESSION['unique_id'] = $row['unique_id'];
                                 
                                //? We're IN !
                               echo "success";
                           }else{
                                echo "This Email Does Not Exist, Something Wrong...";
                           }
                  }else{
                        echo "Couldn't Insert Data into Database...";
                  }
          }
     }

   }else{
         echo "All input Fields Are Required !";
   }


  ?>