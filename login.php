<?php 
session_start(); 

if(isset($_SESSION['auth'])){
    $_SESSION['message']= "You are already logged in";
    header('Location: ' .'index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alaa Daher Portfolio</title>

    <!--custom css-->
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/alert.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
  </head>
  <body>

    <div> 
            <?php 
            if(isset($_SESSION['message'])) 
            {   
                ?>

                <div class="alert show showAlert">
                  <span class="fas fa-exclamation-circle"></span>
                  <span class="msg">Warning: <?= $_SESSION['message']; ?>!</span>
                  <div class="close-btn">
                      <span class="fas fa-times"></span>
                  </div>
                </div>

                <?php
                unset($_SESSION['message']);
            } 
            ?>   
            <form action="functions/authcode.php" method="post" class="inputform">
                <h1 class="heading"><span>Admin Login</span></h1>
                <label for="exampleInputEmail1">Email Address</label>
                <input type="email" name="email" required placeholder="Admin Email" id="exampleInputEmail1" aria-describedby="emailHelp"></input>
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" required id="exampleInputPassword1" placeholder="Admin Password"></input>
                <button name="login_btn" type="submit" class="btn">Login</button>
            </form>
    </div> 
    
    <!--custom js-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <script>
      if( $('.alert').hasClass("showAlert")){
        setTimeout(function(){
          $('.alert').removeClass("show");
          $('.alert').addClass("hide");
        },5000);
      }

      $('.close-btn').click(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
      });
    </script>

  </body>
</html>