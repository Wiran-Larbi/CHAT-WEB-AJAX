<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../images/general.css">
    <link rel="stylesheet" href="../styles/finish-account.css?cost=9819">
    <title>ssager</title>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
       integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
       crossorigin="anonymous">
   </script>
</head>
<body>
    <main>
          <section class="card">
             <img class="card-logo" src="../images/logo/ssager.svg" alt="logo">
              <div class="card-welcome">

                <?php 
                include("config.php");
                session_start();
                 if(isset($_SESSION['unique_id'])){
                  $unique_id = $_SESSION['unique_id'];

                  $sql_account = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = $unique_id");
                    if(mysqli_num_rows($sql_account) > 0){
                         $account = mysqli_fetch_assoc($sql_account);
                         $fname = $account['fname'];
                    }else{
                         $fname = "Unknown";
                    }
                         
                 }
                
               
               ?>
                <span>Welcome to <span>ssager</span>, <span><?php  echo $fname; ?> </span><span>.</span></span>
              </div>
               
               <form id="finish-form"  action="#" method="POST">
                <div class="account-upload">
                  <div class="image-edit">
                      <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload"></label>
                  </div>
                  <div class="image-preview">
                      <div id="imagePreview">
                        <img src="../images/icons/finish-account/profile-male.svg" alt="unknown">
                      </div>
                  </div>
                </div>
                  <span class="finish-uid">
                    <input class="input" type="text" name="uid" id="uid" required>
                    <span class="floating-label">UserId</span>
                    <img class="icon uid-icon" src="../images/icons/finish-account/uid.svg" alt="uid icon">
                    <span class="notice-msg">Just Letters & Numbers, -, _</span>
                  </span>
                  <span class="finish-submit">
                    <button class="input" type="button">Start Now</button>
                  </span>
               </form>
               <div class="card-creative-common">
                   <span>ssager</span>
                   <span>&copy; All Right Reserved .</span>
               </div>

            </section>

    </main>
      <script src="../app/finish-account.js?cost=9" type="text/javascript"></script>
</body>
</html>