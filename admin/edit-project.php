<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
    <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $project= getByID("projects",$id);

            if(mysqli_num_rows($project) >0)
            {
                $data= mysqli_fetch_array($project);

                ?>
                    <div class="form">      
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <h1 class="heading-edit">
                                <span>Edit Project</span>
                                <a href="projects.php" class="btn-light">Back</a>
                                <!-- <button onclick="history.back();return false;" class="btn-light">Back</button> -->
                                <!-- <a href="#" class="btn-light" onclick="history.back();return false;">Back</a> -->
                            </h1>

                            <label>Project Type</label>
                            <div class="radioBox">
                                <div>             
                                    <input type="radio" value="image" onclick="hideShowDiv(1)" <?= $data['type'] == '1'? "checked": "" ?> name="type" id="imageRadio" class="radioButton">
                                    <label for="imageRadio" class="radioLabel">Image</label>
                                </div>
                                <div>                 
                                    <input type="radio" value="video" onclick="hideShowDiv(2)" <?= $data['type'] == '0'? "checked": "" ?> name="type" id="videoRadio" class="radioButton">
                                    <label for="videoRadio" class="radioLabel">Video</label>
                                </div>
                            </div>

                            <label>Category</label>
                            <select name="category_id">
                                <option selected>Select Category</option>
                                <?php
                                    $categories = getAllCategories();
                                    if(mysqli_num_rows($categories) >0){
                                        foreach($categories as $item){
                                            ?>
                                            <option value="<?= $item['id']; ?>"  <?= $data['category_id'] == $item['id']? "selected": "" ?>>
                                                <?= $item['name']; ?>
                                            </option>                                                           
                                            <?php
                                        }
                                    }else{
                                        echo "<span class='response'>No Category available</span>";
                                    }
                                ?>
                            </select>

                            <input type="hidden" value="<?= $data['id'];?>" name="project_id">
                            
                            <label id="imageUploaded"><?= $data['type'] == '1'? "Upload Image": "Upload Video Cover Image" ?></label>
                            <input type="file" name="image">
                            <label>Current Image</label>
                            <input type="hidden" name="old_image" value="<?= $data['media']; ?>">
                            <a href="../uploads/<?= $data['media']; ?>" class="imageLB">
                                <img class="image" src="../uploads/<?= $data['media']; ?>" height="50px" width="50px" alt="Project Image" />
                            </a>

                            <div id="div" class="linkBox" style="display: <?= $data['type'] == '1'? "none": "grid" ?>;">
                                <label>Video Link</label>
                                <input type="text" id="input_link" name="link" value="<?= $data['link']; ?>" placeholder="Enter video link"></input>
                            </div>

                            <label>Order In Category</label>
                            <input required type="number" name="order" value="<?= $data['orderInCategory']; ?>">

                            <label class="check-container" id="check_display" style="display: <?= $data['type'] == '0'? "none": "block" ?>;">Display In Home Page
                                <input type="checkbox" name="displayInHomePage" <?= $data['displayInHomePage'] == '1'? "checked": "" ?>>
                                <span class="checkmark"></span>
                            </label>

                            <button type="submit" name="update_project_btn" class="btn-red">Update</button>
                        </form>
                    </div>
                
                <?php
            }else{
                echo "<span class='response'>Project not found for given id</span>";
            }       
        
        }else{
            echo "<span class='response'>Id missing from url</span>";
        }
    ?>   

<?php include('includes/footer.php'); ?>