<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
    <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $category= getByID("categories",$id);

            if(mysqli_num_rows($category) >0)
            {
                $data= mysqli_fetch_array($category);

                ?>
                    <div class="form">      
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <h1 class="heading-edit">
                                <span>Edit Category</span>
                                <a href="category.php" class="btn-light">Back</a>
                            </h1>

                            <input type="hidden" value="<?= $data['id'];?>" name="category_id">

                            <label>Category Name</label>
                            <input required type="text" name="name" placeholder="Enter Category Name" value="<?= $data['name']; ?>"></input>
                            
                            <label>Description (optional)</label>
                            <textarea rows="4" name="description" placeholder="Enter description"><?= $data['description']; ?></textarea>
                            
                            <label>Upload Image</label>
                            <input type="file" name="image">
                            <label>Current Image</label>
                            <input type="hidden" name="old_image" value="<?= $data['image']; ?>">      
                            <a href="../uploads/<?= $data['image']; ?>" class="imageLB">
                                <img src="../uploads/<?= $data['image']; ?>" height="50px" width="50px" alt="category Image">
                            </a>

                            <label class="check-container">Display In Home Page
                                <input type="checkbox" name="displayInHomePage" <?= $data['displayInHomePage'] == '1'? "checked": "" ?>>
                                <span class="checkmark"></span>
                            </label>
                                                
                            <button type="submit" name="update_category_btn" class="btn-red">Update</button>
                        </form>
                    </div>
                
                <?php
            }else{
                echo "<span class='response'>Category not found for given id</span>";
            }       
        
        }else{
            echo "<span class='response'>Id missing from url</span>";
        }
    ?>   

<?php include('includes/footer.php'); ?>