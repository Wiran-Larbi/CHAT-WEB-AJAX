<?php
    session_start();
    include("config.php");
     

    if(isset($_SESSION['unique_id'])) {
        $uid = mysqli_real_escape_string($connect,$_POST['uid']);
        $image = $_FILES['image'];
        $unique_id = $_SESSION['unique_id'];
        
        
if(!empty($uid) && !empty($image)) {
            $sql_account = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = $unique_id ");

        if(mysqli_num_rows($sql_account) > 0){
                $account = mysqli_fetch_assoc($sql_account);
                   
             //? Uploading The Image File und retreiving the url
             $image_name = $image['name'];
             $temp_name = $image['tmp_name'];

             $imageArray = explode('.',$image_name);
             $imageExt = end($imageArray);

             $extensions = ['png', 'jpeg', 'jpg'];
             if(in_array($imageExt,$extensions) === true) {
                $time = time();
                $Last_name = $time.$image_name;

                if(move_uploaded_file($temp_name,"../images/profile_images/".$Last_name)){

                    $updating = mysqli_query($connect,"UPDATE users SET image = '$Last_name',uid ='$uid' WHERE unique_id = $unique_id");

                     //? We're IN
                     echo "success";
                }else{

                    echo "Cannot Upload Image !";
                }

             }else{
                echo "Invalid Extension";


             }
            
            }else{
                echo "There is a Problem This Account Is Not In Database !";
            }
    
        }
       
    }else{
          echo "Session Empty !";
    }

    


?>