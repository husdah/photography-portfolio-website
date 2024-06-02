<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

    <div class="form" id="addProjectForm">      
        <form action="code.php" method="post" enctype="multipart/form-data">
            <h1 class="heading"><span>Add Project</span></h1>

            <label>Project Type</label>
            <div class="radioBox">
                <div>             
                    <input type="radio" value="image" onclick="hideShowDiv(1)" checked name="type" id="imageRadio" class="radioButton">
                    <label for="imageRadio" class="radioLabel">Image</label>
                </div>
                <div>                 
                    <input type="radio" value="video" onclick="hideShowDiv(2)" name="type" id="videoRadio" class="radioButton">
                    <label for="videoRadio" class="radioLabel">Video</label>
                </div>
            </div>

            <label>Category</label>
            <select name="category_id" class="catSelect">
                <option selected>Select Category</option>
                <?php
                    $categories = getAllCategories();
                    if(mysqli_num_rows($categories) >0){
                        foreach($categories as $item){
                            ?>
                            <option value="<?= $item['id']; ?>">
                                <?= $item['name']; ?>
                            </option>                                                           
                            <?php
                        }
                    }else{
                        echo "No Category available";
                    }
                ?>
            </select>            
            
            <label id="imageUploaded">Upload Image</label>
            <input required type="file" name="image">
            
            <div id="div" class="linkBox" style="display: none;">
                <label>Video Link</label>
                <input id="input_link" type="text" name="link" placeholder="Enter video link"></input>
            </div>

            <label>Order In Category</label>
            <input required type="number" name="order" value="1" id="projectOrder">

            <label class="check-container" id="check_display">Display In Home Page
                <input type="checkbox" name="displayInHomePage">
                <span class="checkmark"></span>
            </label>
            
            <button type="submit" name="add_project_btn" class="btn-red">Save</button>
        </form>
    </div>

<?php include('includes/footer.php'); ?>