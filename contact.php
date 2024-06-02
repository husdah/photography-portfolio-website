<?php 
session_start();
include("functions/userfunctions.php");
include("includes/header.php");
?>

<div class="hero-img">
    <div class="heading">
        <h1>Contact.</h1>
        <p>Lets have a chat!</p>
    </div>
</div>

<div class="form">
    <form action="https://formsubmit.co/daheralaa29@gmail.com" method="POST">
        <label>Your Name</label>
        <input type="text" name="name" required></input>
        <label>Your Email</label>
        <input type="email" name="email" required></input>
        <label>Subject</label>
        <input type="text" name="subject" required></input>
        <label>Message</label>
        <textarea name="message" required rows="6" placeholder="Type your message here"></textarea>
        <input type="hidden" name="_template" value="table"></input>
        <button class="btn">Submit</button>
    </form>
</div>

<?php include("includes/footer.php") ?>