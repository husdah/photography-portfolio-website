<?php 
session_start();
include("functions/userfunctions.php");
include("includes/header.php");
?>

<div class="hero-img">
    <div class="heading">
        <h1>About.</h1>
        <p>Im a full-time photographer!</p>
    </div>
</div>

<div class="about">
  <div class="left">
    <h1>Who Am I?</h1>
    <h3>HI THERE! MY NAME IS ALAA ,</h3>
    <p>A Lebanon Based acclaimed photographer, known for storytelling photography and videography, 
      "My style comes from a visual arts background as worked in multinational agencies, nailing Class A 
      Clients and meeting their standards Until I blended my designs with photography and managed to find its 
      art, a beautiful one.</p>
    <a href="contact.php"><button class="btn">Contact</button></a>
  </div>

  <div class="right">
    <div class="img-container skeleton">
      <div class="img-stack top">
        <img src="img/alaaLogo.jpg" class="img" alt="true"/>
      </div>
      <div class="img-stack bottom">
        <img src="img/AboutProfile.jpg" class="img" alt="true"/>
      </div>
    </div>
  </div>
    
</div>

<?php include("includes/footer.php") ?>