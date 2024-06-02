<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Alaa Daher Portfolio </title>

  <!-- custom css -->
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/sideBar.css"/>
  <link rel="stylesheet" href="assets/css/cart.css"/>
  <link rel="stylesheet" href="assets/css/FormStyles.css"/>
  <link rel="stylesheet" href="assets/css/sections.css"/>
  <link rel="stylesheet" href="assets/css/checkbox.css"/>
  <link rel="stylesheet" href="assets/css/alert.css"/>

  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- magnific-popup css -->
  <link rel="stylesheet" href="assets/css/magnific-popup.css">

</head>

<body>
    <?php include('sidebar.php') ?>
    <main>

    <?php 
      if(isset($_SESSION['message'])) 
      {   
          ?>

          <div class="alert show showAlert">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg"><?= $_SESSION['message']; ?>!</span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
          </div>

          <?php
          unset($_SESSION['message']);
      } 
    ?>
          