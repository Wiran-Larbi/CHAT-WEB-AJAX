<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" content-type="application/json">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../images/general.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/signup.css">
    <title>ssager</title>
</head>
<body>
    <section class="navbar">
        <nav>
            <div class="nav-logo">
                 <img src="../images/logo/ssager-m.svg" alt="main logo">
            </div>
            <div class="nav-links">
                   <span><a class="link" href="">Product</a></span>
                   <span><a class="link" href="">Ressources</a></span>
                   <span><a class="link" href="">Support</a></span>
                   <span><a class="link" href="">Pricing</a></span>
                   <span><a class="link" href="">Blog</a></span>
            </div>
            <div class="nav-cta">
                 <span><a class="link sign-in" href="#login">Sign in</a></span>
                 <span><a class="link help" href="">Help</a></span>

            </div>
        </nav>
    </section>

    <main >
        <section id="sign-up">
            <div class="sign-up-text">
                <h3>START FOR FREE</h3>
                <h1>Create new account <span>.</span></h1>
           </div>
  
          <div class="sign-up-form">
              <form method="post" action="#">
                  <span class="signup-fname">
                      <img class="icon" src="../images/icons/create-account/contact.svg" alt="">
                      <input class="input" type="text" id="fname" name="fname" required >
                      <span class="floating-label">First Name</span>
                  </span>
                  <span class="signup-lname">
                      <img class="icon" src="../images/icons/create-account/contact.svg" alt="">
                      <input class="input" type="text" id="lname" name="lname" required>
                      <span class="floating-label">Last Name</span>
                  </span>
                  <span class="signup-email">
                      <img class="icon" src="../images/icons/create-account/mail.svg" alt="">
                      <input class="input" type="text" id="email" name="email" required>
                      <span class="floating-label">Email</span>
                  </span>
                  <span class="signup-password">
                      <img class="icon" id="eye" src="../images/icons/create-account/eye.svg" alt="">
                      <!-- <img class="icon" id="eye-closed" src="/images/icons/create-account/closed.svg" alt=""> -->
                      <input class="input" type="password" id="password" name="password" required>
                      <span class="floating-label">Password</span>
                      <span class="error"></span>
                  </span>
                  <p>Already A Member? <a style="color: var(--teal);" href="../structures/index.php#login">Log In</a></p>
                  <button type="button" id="signup-submit">Create account</button>
              </form>
          </div>
          <div class="logo-footer"></div>
          <footer style=" padding:60px 64px 0px;">
            <a class="link" href="#">Privacy Policy</a>
            <a class="link" href="#">Copyright &copy; Wiran Larbi 2022</a>
          </footer>
        </section>
       

       
    </main>

    <script src="../app/signup.js?cost=122" type="text/javascript"></script>
</body>
</html>