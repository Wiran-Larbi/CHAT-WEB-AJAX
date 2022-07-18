<?php 
    //    if(!isset($_SESSION['unique_id'])){
    //        header("location: ../structures/index.php");
    //        die();
    //    }
        session_start();
        include("../modules/config.php");
         //*Retreiving data of current user
           $account = [];
           $user_data = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
           if(mysqli_num_rows($user_data) <= 0){
                  //    if(!isset($_SESSION['unique_id'])){
                  //        header("location: ../structures/index.php");
                  //        die();
                  //    }
           }else{
                $account = mysqli_fetch_assoc($user_data);
           }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../images/general.css">
    <link rel="stylesheet" href="../styles/ssager.css?cost=431">
    <title>SSAGER</title>
</head>
<body>
    <main class="ssager-container">
        <section class="ssager-control">
             <div class="logo">
                 <img src="../images/logo/ssager.svg" alt="logo">
             </div>

             <div class="option">
                 <button type="button" class="option-icon" id="messages" >
                      <img src="../images/icons/ssager/messages.svg" alt="messages icon">
                 </button>
                 <button type="button" class="option-icon" id="users">
                      <img src="../images/icons/ssager/users.svg" alt="users icon">
                 </button>
                 <button type="button" class="option-icon" id="hearts">
                       <img src="../images/icons/ssager/hearts.svg" alt="hearts icon">
                 </button>
             </div>

             <div class="setting">
                   
                  <input type="checkbox" id="switch" /><label for="switch"></label>
                  <div class="user-account">
                    <img class="user-image" src=<?php echo "../images/profile_images/".$account['image']; ?> alt="account image">
                  </div>
                  <button type="button" class="setting-icon" id="logout">
                    <img src="../images/icons/ssager/logout.svg" alt="logout icon">
                  </button>
             </div>
          
        </section>
        <section class="ssager-utility">
            <div class="search-box">
                <form action="#" method="post">
                    <input class="searchBox" type="text" name="searchBox" id="searchBox" placeholder="Search">
                    <img class="icon" src="../images/icons/ssager/loop.svg" alt="loop icon">
                </form>
            </div>
            <span class="separator">Contact</span>
            <div class="contact-container">
              
            </div>
        </section>

        <section class="ssager-chat">

              <div class="ssager-empty">
                      <img src="../images/infography empty.svg" alt="infography">
                      <div class="title"><span style="color: var(--teal);font-weight: var(--b-w);">SSAGER</span> Web App to send and receive your messges and stay in touch with your friends and siblings.</div>
                      <div class="description">We Provide a simple reliable and secure solution to your needs.</div>
                      <img src="../images/logo/ssager-m.svg">
              </div>

                  
 
              <div class="receiver-section hide-section">
                    <!-- <div class="receiver-info">
                           <img src="../images/profile_images/1657755490téléchargement.jpg" alt="receiver image">
                           <span>
                            <span class="receiver-name">Larbi</span>
                            <span class="receiver-status">Active now</span>
                           </span>
                           
                     </div>
                     <div class="receiver-setting">
                          <button type="button" id="searchReceiver">
                            <img src="../images/icons/ssager/loop-w.svg" alt="loop search">
                          </button>
                          <button type="button" id="more">
                            <img src="../images/icons/ssager/dots.svg" alt="more">
                          </button>
                     </div>
          -->
              </div>  
              
              <div class="chat-section hide-section">
                   
                    <div class="chat-grid">
                      
                       
                         
                    </div>
                    
                    <div class="chat-input">
                         <form id="chatForm" method="post">
                            <input id="outgoing_input" name="outgoing_id" type="hidden" value="">
                            <input type="text" name="message" id="message" placeholder="Your Message ...">
                            <button type="button" id="submit_input">
                                <img src="../images/icons/ssager/send.svg" alt="send icon">
                            </button>
                         </form>
                     </div>
              </div>  


        </section>
    </main>


    <script src="../app/chat-input.js?cost=312"></script>
    <script src="../app/ssager-handelers.js?cost=231"></script>
    <script src="../app/contact.js?cost=871"></script> 
    <!-- <script src="../app/chat.js?cost=8716"></script> -->
</body>
</html>


 <!-- <div class="outgoing">
                              <span class="message">Hello Guys, Hope you're doing well...</span>
                        </div>
                        <div class="incoming">
                              <span class="message">Hi, I've reacanswer can you go to your home please i really hope youre doing well</span>
                        </div>

                        <div class="outgoing">
                            <span class="message">Hello Guys, Hope you're doing well...</span>
                      </div>
                      <div class="incoming">
                            <span class="message">Hi, I've reacanswer can you go to your home please i really hope youre doing well</span>
                      </div>

                      <div class="outgoing">
                        <span class="message">Hello Guys, Hope you're doing well...</span>
                           </div>
                       <div class="incoming">
                        <span class="message">Hi, I've reacanswer can you go to your home please i really hope youre doing well</span>
                        </div>

                       <div class="outgoing">
                         <span class="message">Hello Guys, Hope you're doing well...</span>
                       </div>
                       <div class="incoming">
                         <span class="message">Hi, I've reacanswer can you go to your home please i really hope youre doing well</span>
                        </div>

                       <div class="outgoing">
                          <span class="message">Hello Guys, Hope you're doing well...</span>
                       </div>
                         <div class="incoming">
                         <span class="message">Hi, I've reacanswer can you go to your home please i really hope youre doing well</span>
                          </div> -->

                            <!-- <div class="chat-input">
                         <form action="#" method="post">
                            <input type="hidden" value="">
                            <input type="text" name="message" id="message" placeholder="Your Message ...">
                            <button type="button">
                                <img src="../images/icons/ssager/send.svg" alt="send icon">
                            </button>
                         </form>
                     </div> -->
                   