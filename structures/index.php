<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../images/general.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <title>ssager</title>


</head>
<body>
    <!--!                  Navbar                  --> 
     
          <?php require_once("navbar.php"); ?>

    <!------------------------------------------------>      
          <main >

            <section id="hero">
                <div class="hero-text">
                    <div class="hero-title"><span style="color: var(--teal);"> ssager</span> a free online application to chat.</div>
                    <div class="hero-desc">Connect and chat with your friends never been easier ,and secured. we provide an easy to use web application.</div>  
                    <div class="hero-cta">
                        <button>Learn More</button>
                        <a href="#login">Start ssagering</a>
                  </div>
                </div>
                <div class="hero-img">
                    <img class="sparkling" src="../images/sparkling.svg" alt="sparkling svg">
                    <img class="astronaut" src="../images/astronaut.svg" alt="hero-img">
                    <img class="sparkling" src="../images/sparkling.svg" alt="sparkling svg">
                </div>

            </section>
    <!--!                  Login Section                  --> 
            <?php include ("login-account.php"); ?>

           
    <!------------------------------------------------>
    
            
           </main>

          <footer style=" padding: 0 140px 60px;">
               <a class="link" href="#">Privacy Policy</a>
               <a class="link" href="#">Copyright &copy; Wiran Larbi 2022</a>
          </footer>

           
         <script src="../app/login.js?cost=760" type="text/javascript">
         </script>
</body>
</html>