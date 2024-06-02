<?php 
session_start();
include("functions/userfunctions.php");
include("includes/header.php");

$catquery = getCatNameById($_GET['cat']);
if(mysqli_num_rows($catquery) >0){

    foreach($catquery as $item){
        $catName = $item['name'];
    }
}
?>

<div class="hero-img">
    <div class="heading">
        <h1><?= $catName ?></h1>
        <p>Check my projects!</p>
    </div>
</div>

<div class="App">

    <div class="tags">
        <a href="category.php?cat=<?= $_GET['cat']; ?>&tags=images" name="images" class="tag <?php if((isset($_GET['tags']) && $_GET['tags'] == 'images') || !isset($_GET['tags'])){echo "active";} ?>">images</a>
        <a href="category.php?cat=<?= $_GET['cat']; ?>&tags=videos" name="videos" class="tag <?php if(isset($_GET['tags']) && $_GET['tags'] == 'videos'){echo "active";} ?>">videos</a>
    </div>

    <div class="container">

    <?php
            $projects = getProjectsByCategory($_GET['cat']);

            if(mysqli_num_rows($projects) >0){

                foreach($projects as $item){

                    if(isset($_GET['tags']) && $_GET['tags']=='videos'){ 
                        if($item['type'] == 0){ 
                    ?>

                    <a href="<?= $item['link'];?>" class="image-card videoLB skeleton">
                        <img class="image" src="uploads/<?= $item['media'];?>" alt="Project Media"/>
                        <div class="video-play"><i class='bx bx-play'></i></div>
                    </a>

                    <?php
                        }   
                    }else{
                        if($item['type'] == 1){ 
                    ?>

                    <a href="uploads/<?= $item['media'];?>" class="image-card imageLB skeleton">
                        <img class="image" src="uploads/<?= $item['media'];?>" alt="Project Media"/>
                    </a>
                                            
                    <?php
                        }
                    }
                }
            }else{
                echo "<span class='response'>No projects yet</span>";
            }

        ?>
        
    </div>		
</div>

<?php include("includes/footer.php") ?>