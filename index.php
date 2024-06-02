<?php 
session_start();
include("functions/userfunctions.php");
include("includes/header.php");
?>

<div class="hero">
    <div class="mask">
        <img class="into-img" src="img/HeroImgBack.jpg" alt="IntroImg"/>
    </div>
    <div class="content">
        <p>Photography & Videography</p>
        <h1>Alaa Daher Photography</h1>
        <div>
            <a href="projects.php" class="btn">Projects</a>
            <a href="contact.php" class="btn-light">Contact</a>
        </div>
    </div>
</div>

<div class="work-container">
        <h1 class="project-heading">Projects</h1>
        <div class="project-container2">

        <?php
            $categories = getHomeCategories();

            if(mysqli_num_rows($categories) >0){

                foreach($categories as $item){
                    ?>

                        <div class="project-card">
                            <div class="skeleton">
                                <img src="uploads/<?= $item['image'];?>" alt="category Image"/>
                            </div>
                            <h2 class="project-title"><?= $item['name']?></h2>
                            <div class="pro-details">
                                <p><?= $item['description'];?></p>
                                <div class="pro-btns">
                                    <a href="category.php?cat=<?= $item['id']?>" class="btn">SEE MORE</a>
                                </div>
                            </div>	
                        </div>                       
                        
                    <?php
                }
            }

        ?>

        </div>
        <a class="btn-light" href="projects.php">View More</a>
</div>

<div class="App">
    <div class="container">

    <?php
        $projects = getHomeprojects();

        if(mysqli_num_rows($projects) >0){

            foreach($projects as $item){
                ?>                     
                    <a href="uploads/<?= $item['media'];?>" class="image-card imageLB skeleton">
                        <img class="image" src="uploads/<?= $item['media'];?>" alt="" />
                    </a>
                    
                <?php
            }
        }
    ?>
    </div>		
</div>

<?php include("includes/footer.php") ?>