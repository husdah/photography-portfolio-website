<?php 
session_start();
include("functions/userfunctions.php");
include("includes/header.php");
?>

<div class="hero-img">
    <div class="heading">
        <h1>PROJECTS.</h1>
        <p>Some of my most recent work!</p>
    </div>
</div>

<div class="work-container">
        <h1 class="project-heading">Projects</h1>
        <div class="project-container">

        <?php
            $categories = getAllCategories();

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
</div>

<?php include("includes/footer.php") ?>